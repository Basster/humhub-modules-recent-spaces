<?php

namespace humhub\modules\recent_spaces\controllers;

use humhub\components\behaviors\AccessControl;
use humhub\components\Controller;
use yii\data\Pagination;
use humhub\modules\recent_spaces\models\RecentSpace;

/**
 * @package humhub.modules.recent-spaces.controllers
 * @author  Ole Rößner
 */
class ListController extends Controller
{
    public $pageSize = 10;

    /**
     * @inheritdoc
    */
    public function behaviors()
    {
        return [
            'acl' => [
                'class' => AccessControl::class,
                'guestAllowedActions' => ['list'],
            ],
        ];
    }

    /**
     * Shows list of most active users with statistic.
    */
    public function actionList() {
        $query = RecentSpace::find();
        $countQuery = clone $query;
        $pagination = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $this->pageSize]);
        $query->offset($pagination->offset)->limit($pagination->limit);

        return $this->renderAjax('list', ['spaces' => $query->all(), 'pagination' => $pagination]);

    }

}
