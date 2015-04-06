<div class="panel panel-default" id="recent-spaces-panel">
  <?php /** <@var Space[] $spaces */ ?>
  <?php $showAsList = !!HSetting::Get('showAsList', 'recent_spaces') ?>
  <!-- Display panel menu widget -->
  <?php $this->widget('application.widgets.PanelMenuWidget', array('id' => 'recent-spaces-panel')); ?>
  <div class="panel-heading">
    <?php echo Yii::t('RecentSpacesModule.base', '<strong>Recent</strong> spaces'); ?>
  </div>
  <?php if ($showAsList): ?>
    <?php $this->render('_listSpaces', array('spaces' => $spaces)); ?>
  <?php else: ?>
    <?php $this->render('_linkSpaces', array('spaces' => $spaces)); ?>
  <?php endif; ?>
  <div class="panel-footer">
    <?php
    // Button Get a list of most recent spaces
    echo CHtml::link(Yii::t('RecentSpacesModule.base', 'Get a list'), $this->createUrl('//recent_spaces/recentSpaces/list'), array(
      'class' => 'btn btn-info',
      'data-toggle' => 'modal',
      'data-target' => '#globalModal'
    ));
    ?>
  </div>
</div>

