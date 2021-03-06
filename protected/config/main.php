<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Luna HRMIS',
	'defaultController'=>'site/login',

	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	//'theme'=>'bootstrap',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.hr.models.*',
		'application.modules.user.models.*',
		'application.modules.accounting.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'hr',
		'accounting',
		'user',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'secret',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
				'bootstrap.gii'
			)
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'authManager'=> array(
			'class'=> 'CPhpAuthManager',
		),


		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap',
			'responsiveCss' => true, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
            'plugins' => array(
                // Optionally you can configure the "global" plugins (button, popover, tooltip and transition)
                // To prevent a plugin from being loaded set it to false as demonstrated below
                'transition' => true, // disable CSS transitions
                'tooltip' => array(
                    'selector' => 'a.tooltip', // bind the plugin tooltip to anchor tags with the 'tooltip' class
                    'options' => array(
                        'placement' => 'bottom', // place the tooltips below instead
                    ),
                ),
            ),
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=db_lorma_lgu',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'johnverz77@gmail.com',
	),
);