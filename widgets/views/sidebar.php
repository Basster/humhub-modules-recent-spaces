<?php

use humhub\libs\Html;
use humhub\widgets\PanelMenu;
use humhub\modules\recent_spaces\Assets;

Assets::register($this);
$showMoreButton = !!Yii::$app->getModule('recent_spaces')->settings->get('showMoreButton', 'recent_spaces');
?>
<div class="panel panel-default<?php if ($showMoreButton) echo ' spaces-list' ?>" id="panel-recent_spaces">
    <!-- Display panel menu widget -->
    <?= PanelMenu::widget(['id' => 'panel-recent_spaces']); ?>

    <div class="panel-heading">
        <?= Yii::t('RecentSpacesModule.base', '<strong>Recent</strong> spaces'); ?>
    </div>

    <div class="panel-body">
        <?php if (count($spaces) === 0): ?>
        <div class="placeholder"> <?= Yii::t('RecentSpacesModule.base', 'No spaces.') ?></div>
    <?php else: ?>
    <?php if ($showMoreButton): ?>
        <?= $this->render('_listSpaces', ['spaces' => $spaces]); ?>
    <?php else: ?>
        <?= $this->render('_linkSpaces', ['spaces' => $spaces]); ?>
    <?php endif; ?>
    <?php endif; ?>

    <div class="footer">
        <hr/>
        <?= Html::a(Yii::t('RecentSpacesModule.base', 'Get a list'), ['/recent_spaces/list/list'], ['class' => 'btn btn-xl btn-primary', 'data-target' => '#globalModal',]); ?>
    </div>
  </div>
</div>
