<?php

Yii::app()->moduleManager->register(array(
    'id' => 'recent-spaces',
    'class' => 'application.modules.recent-spaces.RecentSpacesModule',
    'import' => array(
        'application.modules.recent-spaces.*',
    ),
    // Events to Catch 
    'events' => array(
        array('class' => 'DashboardSidebarWidget', 'event' => 'onInit', 'callback' => array('RecentSpacesModule', 'onSidebarInit')),
    ),
));
?>
