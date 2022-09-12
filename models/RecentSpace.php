<?php

namespace humhub\modules\recent_spaces\models;

use humhub\modules\space\models\Space;

class RecentSpace extends \humhub\modules\space\models\Space {

  public $num_members = 0;

  public static function find() {

    /**
     * $criteria->condition = 'visibility <> ' . Space::VISIBILITY_NONE;
     * $criteria->order = 'created_at DESC';
     * $criteria->limit = $range;
     */

    $query = parent::find();
    $query->addSelect(
      [
        '*',
        '(SELECT count(`space_membership`.user_id) FROM `space_membership` WHERE `space_membership`.space_id=`space`.id) as num_members',
      ]
    );
    $query->where('visibility <> ' . Space::VISIBILITY_NONE);
    $query->orderBy('created_at DESC');

    return $query;
  }
}
