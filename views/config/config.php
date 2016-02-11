<?php

use humhub\compat\CActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t(
          'RecentSpacesModule.base',
          'Most Active Users Module Configuration'
        ); ?></div>
    <div class="panel-body">


        <p><?php echo Yii::t(
              'RecentSpacesModule.base',
              'You may configure the number of spaces to be shown.'
            ); ?></p>
        <br/>

        <?php $form = CActiveForm::begin(); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'noSpaces'); ?>
            <?php echo $form->textField(
              $model,
              'noSpaces',
              ['class' => 'form-control']
            ); ?>
            <?php echo $form->error($model, 'noSpaces'); ?>
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?php echo $form->checkBox(
                      $model,
                      'showAsList',
                      []
                    ); ?><?php echo $model->getAttributeLabel('showAsList'); ?>
                </label>
            </div>
        </div>

        <hr>
        <?php echo Html::submitButton(
          Yii::t('RecentSpacesModule.base', 'Save'),
          ['class' => 'btn btn-primary']
        ); ?>
        <a class="btn btn-default"
           href="<?php echo Url::to(['/admin/module']); ?>"><?php echo Yii::t(
              'RecentSpacesModule.base',
              'Back to modules'
            ); ?></a>

        <?php CActiveForm::end(); ?>
    </div>
</div>
