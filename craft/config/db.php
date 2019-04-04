<?php

/**
 * Database Configuration
 *
 * All of your system's database configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/db.php
 */

return array(

        '*' => array(
                'tablePrefix' => 'craft',
        ),
        'localhost' => array(
                'server' => 'localhost',
                'user' => 'root',
                'password' => 'root',
                'database' => 'craft_vidiots',
                'initSQLs' => array("SET SESSION sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';"),
         ),
        '178.128.187.150' => array(
                'server' => 'localhost',
                'user' => 'root',
                'password' => 'fwex6ijie7agJoh@',
                'database' => 'craft_vidiots',
                'initSQLs' => array("SET SESSION sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';"),
        ),
        'vidiotsfoundation.org' => array(
                'server' => 'localhost',
                'user' => 'root',
                'password' => 'fwex6ijie7agJoh@',
                'database' => 'craft_vidiots',
                'initSQLs' => array("SET SESSION sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';"),
        )
);