<?php

class RecentSpacesModule extends HWebModule
{

    private $assetsUrl;

    public function getAssetsUrl()
    {
        if ($this->assetsUrl === null) {
            $this->assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('recent-spaces.assets'));
        }
        return $this->assetsUrl;
    }

    public function init()
    {
    }

    /**
     * On build of the dashboard sidebar widget, add the recent-spaces widget if module is enabled.
     *
     * @param type $event
     */
    public static function onSidebarInit($event)
    {
        if (Yii::app()->moduleManager->isEnabled('recent-spaces')) {

            $event->sender->addWidget('application.modules.recent-spaces.widgets.RecentSpacesSidebarWidget', array(), array(
                'sortOrder' => 0
            ));
        }
    }

    public function getConfigUrl()
    {
        return Yii::app()->createUrl('//recent-spaces/config/config');
    }

    /**
     * Enables this module
     */
    public function enable()
    {
        if (!$this->isEnabled()) {
            // set default config values
            HSetting::Set('noUsers', 5, 'recent-spaces');
        }
        parent::enable();
    }
}

?>
