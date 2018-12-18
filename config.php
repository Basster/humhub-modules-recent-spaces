<?php

use humhub\modules\dashboard\widgets\Sidebar;

return [
    'id' => 'recent_spaces',
    'class' => 'humhub\modules\recent_spaces\Module',
    'namespace' => 'humhub\modules\recent_spaces',
    'events' => [
        ['class' => Sidebar::className(), 'event' => Sidebar::EVENT_INIT, 'callback' => ['humhub\modules\recent_spaces\Module', 'onSidebarInit']],
    ],
];

?>
