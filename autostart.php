<?php

Yii::app()->moduleManager->register(array(
    'id' => 'recent_spaces',
    'class' => 'application.modules.recent_spaces.RecentSpacesModule',
    'import' => array(
        'application.modules.recent_spaces.*',
    ),
    // Events to Catch 
    'events' => array(
        array('class' => 'DashboardSidebarWidget', 'event' => 'onInit', 'callback' => array('RecentSpacesModule', 'onSidebarInit')),
    ),
));
?>
