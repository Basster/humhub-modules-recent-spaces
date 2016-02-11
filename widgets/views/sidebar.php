<?php

use humhub\models\Setting;
use yii\helpers\Html;

humhub\modules\recent_spaces\Assets::register($this);
$showAsList = !!Setting::Get('showAsList', 'recent_spaces');
?>
<div class="panel panel-default<?php if ($showAsList) echo ' spaces-list' ?>"
     id="recent_spaces-panel">

  <!-- Display panel menu widget -->
  <?php humhub\widgets\PanelMenu::widget(['id' => 'recent_spaces-panel']); ?>

  <div class="panel-heading">
    <?php echo Yii::t(
      'RecentSpacesModule.base',
      '<strong>Recent</strong> spaces'
    ); ?>
  </div>
  <div class="panel-body">
    <?php if (count($spaces) === 0): ?>
      <div class="placeholder"> <?php echo Yii::t(
          'RecentSpacesModule.base',
          'No spaces.'
        ) ?></div>
    <?php else: ?>
      <?php if ($showAsList): ?>
        <?php echo $this->render('_listSpaces', ['spaces' => $spaces]); ?>
      <?php else: ?>
        <?php echo $this->render('_linkSpaces', ['spaces' => $spaces]); ?>
      <?php endif; ?>
    <?php endif; ?>
    <div class="footer">
      <hr/>
      <?php
      // Button Get a list of most active users
      echo Html::a(
        Yii::t('RecentSpacesModule.base', 'Get a list'),
        ['/recent_spaces/list/list'],
        [
          'class'       => 'btn btn-info',
          'data-target' => '#globalModal',
        ]
      );
      ?>
    </div>
  </div>
</div>
