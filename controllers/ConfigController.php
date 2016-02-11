<?php

namespace humhub\modules\recent_spaces\controllers;

use humhub\models\Setting;
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
  public function actionConfig() {
    $form             = new ConfigureForm();
    $form->noSpaces   = Setting::Get('noSpaces', 'recent_spaces');
    $form->showAsList = Setting::Get('showAsList', 'recent_spaces');

    if ($form->load(Yii::$app->request->post()) && $form->validate()) {
      $form->noSpaces   = Setting::Set(
        'noSpaces',
        $form->noSpaces,
        'recent_spaces'
      );
      $form->showAsList = Setting::Set(
        'showAsList',
        $form->showAsList,
        'recent_spaces'
      );

      return $this->redirect(['/recent_spaces/config/config']);
    }

    return $this->render(
      'config',
      [
        'model' => $form,
      ]
    );
  }
}

?>
