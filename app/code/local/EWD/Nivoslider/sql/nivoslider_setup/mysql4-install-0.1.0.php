<?php
$installer = $this;
$installer->startSetup();
$installer->run("
    -- DROP TABLE IF EXISTS {$installer->getTable('nivoslider')};
    CREATE TABLE {$installer->getTable('nivoslider')} (
        `slider_id` int(10) unsigned NOT NULL auto_increment,
        `slider_name` varchar(50),
        `effect` varchar(50),
        `slices` int(30),
        `box_cols` int(50) unsigned,
        `box_rows` int(50) unsigned,
        `animation_speed` int(50) unsigned,
        `pause_time` int(50) unsigned,
        `start_slide` int(5) unsigned,
        `direction_nav` bool,
        `direction_nav_hide` bool,
        `control_nav` bool,
        `control_nav_thumbs` bool,
        `pause_on_hover` bool,
        `manual_advance` bool,
        `prev_text` varchar(50),
        `next_text` varchar(50),
        `random_start` bool,
        `slider_data` text,
        `created_at` datetime NOT NULL default '0000-00-00 00:00:00',
        `updated_at` datetime NOT NULL default '0000-00-00 00:00:00',
        PRIMARY KEY  (`slider_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Nivoslider sliders';
");
$installer->endSetup();