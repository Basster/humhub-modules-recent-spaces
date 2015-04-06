<?php

/**
 * Defines the configure actions.
 *
 * @package humhub.modules.recent_spaces.controllers
 * @author Ole Rößner
 */
class ConfigController extends Controller
{

  public $subLayout = "application.modules_core.admin.views._layout";

  /**
   *
   * @return array action filters
   */
  public function filters()
  {
    return array(
      'accessControl'
    ); // perform access control for CRUD operations

  }

  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   *
   * @return array access control rules
   */
  public function accessRules()
  {
    return array(
      array(
        'allow',
        'expression' => 'Yii::app()->user->isAdmin()'
      ),
      array(
        'deny', // deny all users
        'users' => array(
          '*'
        )
      )
    );
  }

  /**
   * Configuration Action for Super Admins
   */
  public function actionConfig()
  {
    Yii::import('recent_spaces.forms.*');

    $form = new RecentSpacesConfigureForm();

    if (isset($_POST['RecentSpacesConfigureForm'])) {
      $_POST['RecentSpacesConfigureForm'] = Yii::app()->input->stripClean($_POST['RecentSpacesConfigureForm']);
      $form->attributes = $_POST['RecentSpacesConfigureForm'];

      if ($form->validate()) {
        $form->noSpaces = HSetting::Set('noSpaces', $form->noSpaces, 'recent_spaces');
        $form->showAsList = HSetting::Set('showAsList', $form->showAsList, 'recent_spaces');

        $this->redirect(Yii::app()->createUrl('recent_spaces/config/config'));
      }
    } else {
      $form->noSpaces = HSetting::Get('noSpaces', 'recent_spaces') ?: 5;
      $form->showAsList = HSetting::Get('showAsList', 'recent_spaces') ?: 0;
    }

    $this->render('config', array(
      'model' => $form
    ));
  }
}

?>
