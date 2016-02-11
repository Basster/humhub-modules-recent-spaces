<?php

namespace humhub\modules\recent_spaces\widgets;

use humhub\models\Setting;
use humhub\modules\recent_spaces\models\RecentSpace;

class Sidebar extends \humhub\components\Widget {

  public function run() {
    $spaces = RecentSpace::find()
                         ->limit(
                           (int) Setting::Get('noSpaces', 'recent_spaces')
                         )
                         ->all();

    if (count($spaces) == 0) {
      return NULL;
    }

    return $this->render(
      'sidebar',
      [
        'spaces' => $spaces,
      ]
    );
  }
}

?>

