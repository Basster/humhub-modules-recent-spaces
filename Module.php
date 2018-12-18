<?php

namespace humhub\modules\recent_spaces;

use Yii;
use yii\helpers\Url;
use humhub\models\Setting;

class Module extends \humhub\components\Module
{
    /**
     * On build of the dashboard sidebar widget, add the recent_spaces widget if module is enabled.
     *
     * @param type $event            
     */
    public static function onSidebarInit($event)
    {
        if (Yii::$app->hasModule('recent_spaces')) {
            $event->sender->addWidget(widgets\Sidebar::class, [], ['sortOrder' => 400]);
        }
    }
    public function getConfigUrl()
    {
        return Url::to(['/recent_spaces/config/config']);
    }
    /**
     * Enables this module
     */
    public function enable()
    {
        parent::enable();
        if (Setting::Set('soSpaces', 'recent_spaces') == '') {
            Setting::Set('soSpaces', 5, 'recent_spaces');
        }
    }
}
?>
