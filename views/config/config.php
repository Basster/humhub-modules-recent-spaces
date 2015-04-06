<div class="panel panel-default">
  <div
    class="panel-heading"><?php echo Yii::t('RecentSpacesModule.base', 'Recent Spaces Module Configuration'); ?></div>
  <div class="panel-body">


    <p><?php echo Yii::t('RecentSpacesModule.base', 'You may configure the number of spaces to be shown.'); ?></p>
    <br/>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
      'id' => 'recent-spaces-configure-form',
      'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
      <?php echo $form->labelEx($model, 'noSpaces'); ?>
      <?php echo $form->numberField($model, 'noSpaces', array('class' => 'form-control')); ?>
      <?php echo $form->error($model, 'noSpaces'); ?>
    </div>

    <div class="form-group">
      <div class="checkbox">
        <label>
          <?php echo $form->checkBox($model, 'showAsList', array()); ?> <?php echo $model->getAttributeLabel('showAsList'); ?>
        </label>
      </div>
    </div>

    <hr>
    <?php echo CHtml::submitButton(Yii::t('RecentSpacesModule.base', 'Save'), array('class' => 'btn btn-primary')); ?>
    <a class="btn btn-default"
       href="<?php echo $this->createUrl('//admin/module'); ?>"><?php echo Yii::t('RecentSpacesModule.base', 'Back to modules'); ?></a>

    <?php $this->endWidget(); ?>
  </div>
</div>
