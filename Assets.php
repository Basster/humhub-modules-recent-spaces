<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\recent_spaces;

use yii\web\AssetBundle;

class Assets extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false,
    ];

    public $css = [
        'recent-spaces.css',
    ];

    public function init() {
        $this->sourcePath = dirname(__FILE__) . '/assets';
        parent::init();
    }

}
