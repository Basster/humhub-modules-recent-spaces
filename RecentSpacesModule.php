<?php

class RecentSpacesModule extends HWebModule
{

    private $assetsUrl;

    public function getAssetsUrl()
    {
        if ($this->assetsUrl === null) {
            $this->assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('recent_spaces.assets'));
        }
        return $this->assetsUrl;
    }

    public function init()
    {
    }

    /**
     * On build of the dashboard sidebar widget, add the recent_spaces widget if module is enabled.
     *
     * @param CEvent $event
     */
    public static function onSidebarInit(CEvent $event)
    {
        if (Yii::app()->moduleManager->isEnabled('recent_spaces')) {

            $event->sender->addWidget('application.modules.recent_spaces.widgets.RecentSpacesSidebarWidget', array(), array(
                'sortOrder' => 199
            ));
        }
    }

    public function getConfigUrl()
    {
        return Yii::app()->createUrl('//recent_spaces/config/config');
    }

    /**
     * Enables this module
     */
    public function enable()
    {
        if (!$this->isEnabled()) {
            // set default config values
            HSetting::Set('noUsers', 5, 'recent_spaces');
        }
        parent::enable();
    }
}

?>
