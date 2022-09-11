<?php

namespace humhub\modules\recent_spaces\controllers;

use humhub\modules\admin\components\Controller;
use humhub\modules\recent_spaces\models\ConfigureForm;
use Yii;

/**
 * Defines the configure actions.
 *
 * @package humhub.modules.mostactiveusers.controllers
 * @author  Marjana Pesic
 */
class ConfigController extends Controller {

  /**
   * Configuration Action for Super Admins
   */
    public function actionConfig()
    {
        $model = new ConfigureForm();
        $model->loadSettings();

        if ($model->load(Yii::$app->request->post()) && $model->saveSettings()) {
            $this->view->saved();
        }

        return $this->render('config', ['model' => $model]);
    }
}

?>
