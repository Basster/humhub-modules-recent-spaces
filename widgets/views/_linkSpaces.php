<?php

use humhub\modules\space\models\Space;

?>
<div>
  <ul class="media-list clearfix">

    <?php /** @var Space $space */ ?>
    <?php foreach ($spaces as $space) : ?>
      <li class="space-links pull-left">
        <div class="media">
          <?php echo \humhub\modules\space\widgets\Image::widget(
            [
              'space'       => $space,
              'width'       => 40,
              'htmlOptions' => [
                'class' => 'media-object',
              ],
              'link'        => 'true',
              'linkOptions' => [
                'class' => 'pull-left',
              ],
            ]
          ); ?>

          <?php if ($space->isMember()) { ?>
            <i class="fa fa-user space-member-sign tt" data-toggle="tooltip"
               data-placement="top"
               title=""
               data-original-title="<?php echo Yii::t(
                 'DirectoryModule.views_directory_spaces',
                 'You are a member of this space'
               ); ?>"></i>
          <?php } ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
