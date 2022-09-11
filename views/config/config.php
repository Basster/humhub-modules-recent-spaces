<?php

/* @var $this View */

/* @var $model ConfigureForm */

use humhub\libs\Html;
use humhub\modules\recent_spaces\models\ConfigureForm;
use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\modules\ui\view\components\View;
use yii\helpers\Url;

?>
<div class="panel panel-default">
    <div class="panel-heading"><?= Yii::t('RecentSpacesModule.base', 'Most Active Users Module Configuration'); ?></div>
    <div class="panel-body">


        <p><?= Yii::t('RecentSpacesModule.base', 'You may configure the number of spaces to be shown.'); ?></p>
        <br/>

        <?php $form = ActiveForm::begin(['id' => 'configure-form']) ?>


        <div class="form-group">
            <?= $form->field($model, 'noSpaces')->textInput(['type' => 'number']); ?>
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?= $form->field($model, 'showAsList', [])->checkbox() ?>
                </label>
            </div>
        </div>

        <hr>
        <div class="form-group">
        <?= Html::submitButton(Yii::t('RecentSpacesModule.base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']); ?>
        <a class="btn btn-default" href="<?= Url::to(['/admin/module']); ?>"><?= Yii::t('RecentSpacesModule.base', 'Back to modules'); ?></a>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
