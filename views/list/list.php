<?php

use humhub\libs\Helpers;
use yii\helpers\Html;

?>
<div class="modal-dialog modal-dialog-normal animated fadeIn">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"
              aria-hidden="true">&times;</button>
      <h4 class="modal-title">
        <?php
        echo Yii::t(
          'RecentSpacesModule.views_recentSpaces_list',
          '<strong>Recent</strong> spaces'
        );
        ?>
      </h4>
    </div>
    <br>

    <ul class="media-list">
      <?php
      $i = 0;
      /** @var \humhub\modules\recent_spaces\models\RecentSpace $space */
      foreach ($spaces as $space) {
        ?>
        <li>
          <a href="<?php echo $space->getUrl(); ?>">
            <div class="media">
                            <span class="pull-left circle"><?php
                              echo $pagination->page * $pagination->pageSize + (++$i);
                              ?>
                            </span>

              <img
                src="<?php echo $space->getProfileImage()->getUrl(); ?>"
                class="img-rounded tt img_margin pull-left" height="50"
                width="50"
                alt="50x50" style="width: 50px; height: 50px;"
                data-src="holder.js/50x50">


              <div class="media-body">
                <h4 class="media-heading">
                  <strong><?php echo Html::encode(
                      $space->displayName
                    ); ?></strong>
                </h4>
                <div class="recent-spaces">
                  <div class="entry">
                    <?php echo Html::encode(
                      Helpers::truncateText($space->description, 150)
                    ); ?>
                  </div>
                  <div class="entry pull-left">
                    <span
                      class="count colorInfo"><?php echo $space['num_members']; ?></span>
                    <br>
                    <span class="title"><?php echo Yii::t(
                        'RecentSpacesModule.views_recentSpaces_list',
                        'Members'
                      ); ?></span>
                  </div>
                  <div class="entry pull-left">
                    <span
                      class="count colorInfo"><?php echo $space['wall_entries']; ?></span>
                    <br>
                    <span class="title"><?php echo Yii::t(
                        'RecentSpacesModule.views_recentSpaces_list',
                        'Wall Entries'
                      ); ?></span>
                  </div>

                </div>
              </div>
            </div>
          </a>
        </li>
        <?php
      }
      ?>
    </ul>
    <div class="modal-footer" style="padding: 5px">
      <div class="pagination-container">
        <?= \humhub\widgets\AjaxLinkPager::widget(
          ['pagination' => $pagination]
        ); ?>
      </div>
    </div>

  </div>
</div>
