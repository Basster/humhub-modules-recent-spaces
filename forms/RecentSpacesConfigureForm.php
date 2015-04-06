<?php

class RecentSpacesConfigureForm extends CFormModel
{

  public $noSpaces;
  public $showAsList;

  public function rules()
  {
    return array(
      array('noSpaces', 'required'),
      array('noSpaces', 'compare', 'compareValue' => '0', 'operator' => '>=', 'message' => Yii::t('RecentSpacesModule.base', 'The number of spaces must not be negative.')),
      array('noSpaces', 'compare', 'compareValue' => '7', 'operator' => '<=', 'message' => Yii::t('RecentSpacesModule.base', 'The number of spaces must not be greater than a 7.')),
      array('showAsList', 'length', 'max' => 255),
    );
  }

  public function attributeLabels()
  {
    return array(
      'noSpaces' => Yii::t('RecentSpacesModule.base', 'The number of recent spaces that will be shown.'),
      'showAsList' => Yii::t('RecentSpacesModule.base', 'Show as detailed list.'),
    );
  }

}
