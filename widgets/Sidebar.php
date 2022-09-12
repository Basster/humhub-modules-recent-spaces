<?php

namespace humhub\modules\recent_spaces\widgets;

use Yii;
use humhub\modules\recent_spaces\models\RecentSpace;

class Sidebar extends \humhub\components\Widget
{
    public function run()
    {
        $spaces = RecentSpace::find()->limit((int) Yii::$app->getModule('recent_spaces')->settings->get('noSpaces'))->all();
        if (count($spaces) == 0) {
            return NULL;

    }

    return $this->render('sidebar', ['spaces' => $spaces,]);

    }
}
