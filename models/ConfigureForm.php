<?php

namespace humhub\modules\recent_spaces\models;

use Yii;
use yii\base\Model;

class ConfigureForm extends Model
{
    public $noSpaces;

    public $showAsList;

    public function rules() {
        return [
            ['noSpaces', 'required'],
            ['noSpaces', 'integer', 'min' => 0, 'max' => 10],
            ['showAsList', 'string', 'max' => 10],
        ];
    }

    public function attributeLabels() {
        return [
            'noSpaces'   => Yii::t('RecentSpacesModule.base', 'The number of recent spaces that will be shown.'),
            'showAsList' => Yii::t('RecentSpacesModule.base', 'Show as detailed list.'),
        ];
    }

    public function loadSettings()
    {
        $this->noSpaces = Yii::$app->getModule('recent_spaces')->settings->get('noSpaces');

        $this->showAsList = Yii::$app->getModule('recent_spaces')->settings->get('showAsList');

        return true;
    }

    public function saveSettings()
    {
        Yii::$app->getModule('recent_spaces')->settings->set('noSpaces', $this->noSpaces);

        Yii::$app->getModule('recent_spaces')->settings->set('showAsList', $this->showAsList);

        return true;
    }
}
