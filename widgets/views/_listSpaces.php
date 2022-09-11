<?php

use humhub\modules\space\models\Space;
use yii\helpers\Html;

?>
<div>
  <ul class="media-list">
    <?php /** <@var Space[] $spaces */ ?>
    <?php foreach ($spaces as $space) : ?>
      <li>
        <div class="media">

          <!-- Follow Handling -->
          <div class="pull-right">
            <?php
            if (!Yii::$app->user->isGuest && !$space->isMember()) {
              $followed = $space->isFollowedByUser();
              echo Html::a(
                Yii::t('RecentSpacesModule.base', 'Follow'),
                'javascript:setFollow("' . $space->createUrl(
                  '/space/space/follow'
                ) . '", "' . $space->id . '")',
                [
                  'class' => 'btn btn-info btn-sm ' . (($followed) ? 'hide' : ''),
                  'id'    => 'button_follow_' . $space->id,
                ]
              );
              echo Html::a(
                Yii::t('RecentSpacesModule.base', 'Unfollow'),
                'javascript:setUnfollow("' . $space->createUrl(
                  '/space/space/unfollow'
                ) . '", "' . $space->id . '")',
                [
                  'class' => 'btn btn-primary btn-sm ' . (($followed) ? '' : 'hide'),
                  'id'    => 'button_unfollow_' . $space->id,
                ]
              );
            }
            ?>
          </div>

          <?= \humhub\modules\space\widgets\Image::widget(
            [
              'space' => $space,
              'width' => 50,
              'htmlOptions' => [
                'class' => 'media-object',
              ],
              'link' => 'true',
              'linkOptions' => [
                'class' => 'pull-left',
              ],
            ]
          ); ?>

          <?php if ($space->isMember()) { ?>
            <i class="fa fa-user space-member-sign tt" data-toggle="tooltip"
               data-placement="top"
               title=""
               data-original-title="<?= Yii::t(
                 'RecentSpacesModule.base',
                 'You are a member of this space'
               ); ?>"></i>
          <?php } ?>

          <div class="media-body">
            <h4 class="media-heading"><a
                href="<?= $space->getUrl(); ?>"><?= Html::encode($space->name); ?></a>
            </h4>
            <h5><?= Html::encode(humhub\libs\Helpers::truncateText($space->description, 100)); ?></h5>

            <?php $tag_count = 0; ?>
            <?php if ($space->tags) : ?>
              <?php foreach ($space->getTags() as $tag): ?>
                <?php if ($tag_count <= 5) { ?>
                  <?= Html::a($tag, ['/space/spaces', 'keyword' => $tag, ], ['class' => 'label label-default']); ?>
                  <?php $tag_count++;
                }
                ?>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
