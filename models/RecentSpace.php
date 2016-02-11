<?php

namespace humhub\modules\recent_spaces\models;

use humhub\modules\space\models\Space;

class RecentSpace extends \humhub\modules\space\models\Space {

  public $num_members = 0;

  public $wall_entries = 0;

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
        '(SELECT COUNT(`wall_entry`.id) FROM `wall_entry` WHERE wall_entry.wall_id = `space`.wall_id) as wall_entries',
        //                       '(SELECT count(*) FROM `content` WHERE content.user_id=user.id  AND content.object_model=\'humhub\\\modules\\\post\\\models\\\Post\') as count_posts',
      ]
    );
    $query->where('visibility <> ' . Space::VISIBILITY_NONE);

    return $query;
  }
}
