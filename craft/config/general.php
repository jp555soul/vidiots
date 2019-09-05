<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

return array(
	'*' => array(
		'cpTrigger' => 'admin',
		'omitScriptNameInUrls' => true,
	    'slugWordSeparator' => '_',
	    'generateTransformsBeforePageLoad' => true,
	    'overridePHPSessionLocation' => true,
	    'requireMatchingUserAgentForSession' => false,
	    'backupDbOnUpdate' => false,
	    'enableCsrfProtection' => true,
	    'extraAllowedFileExtensions' => 'json'
	),
	'localhost' => array(
	    'devMode' => true,
		'omitScriptNameInUrls' => true,
		'siteUrl' => null,
	),'https://vidiotsfoundation.org' => array(
		'siteUrl' => 'https://vidiotsfoundation.org/',
		'omitScriptNameInUrls' => true,
		'environmentVariables' => array(
            'basePath' => '/var/www/html/',
            'baseUrl'  => 'http://siobhanclaire.com/',
        )
	)
);