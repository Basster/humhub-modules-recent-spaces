<?php

class RecentSpacesSidebarWidget extends HWidget
{

    public function run()
    {
        $assetPrefix = Yii::app()->assetManager->publish(__DIR__ . '/../resources', true, 0, defined('YII_DEBUG'));
        Yii::app()->clientScript->registerCssFile($assetPrefix . '/recent-spaces.css');
        
        $noSpaces = HSetting::Get('noSpaces', 'recent_spaces');
        $noSpaces = $noSpaces == '' || $noSpaces === null ? 0 : $noSpaces;
        $spaces = $this->getRecentSpaces($noSpaces);
        if (count($spaces) > 0) {
            $this->render('recentSpacesPanel', array(
                'spaces' => $spaces
            ));
        }
    }

    /**
     * Select $range number of most active users.
     * Select profile information ordered by number of posts,comments and likes
     *
     * @return array of User objects
     */
    private function getRecentSpaces($range = 5)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'visibility <> ' . Space::VISIBILITY_NONE;
        $criteria->order = 'created_at DESC';
        $criteria->limit = $range;

        $spaces = Space::model()->findAll($criteria);

        return $spaces;
    }
}
?>
