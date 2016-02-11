<?php

namespace humhub\modules\recent_spaces;

use humhub\models\Setting;
use Yii;
use yii\helpers\Url;

class Module extends \humhub\components\Module {

  const NAME = 'recent_spaces';

  /**
   * On build of the dashboard sidebar widget, add the recent_spaces widget if module is enabled.
   *
   * @param type $event
   */
  public static function onSidebarInit($event) {
    if (Yii::$app->hasModule(self::NAME)) {

      $event->sender->addWidget(
        widgets\Sidebar::className(),
        [],
        [
          'sortOrder' => 199,
        ]
      );
    }
  }

  public function getConfigUrl() {
    return Url::to(['/recent_spaces/config/config']);
  }

  /**
   * Enables this module
   */
  public function enable() {
    if (!Yii::$app->hasModule(self::NAME)) {
      // set default config values
      Setting::Set('soSpaces', 5, 'recent_spaces');
    }
    parent::enable();
  }
}

?>
