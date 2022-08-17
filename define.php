<?php
	
	// ====================== PATH ===========================
	define ('DS'					, '/');
	define ('ROOT_PATH'				, dirname(__FILE__));					
	define ('LIBRARY_PATH'			, ROOT_PATH . DS . 'libs' . DS);			
	define ('PUBLIC_PATH'			, ROOT_PATH . DS . 'public' . DS);									
	define ('APPLICATION_PATH'		, ROOT_PATH . DS . 'application' . DS);								
	define ('TEMPLATE_PATH'			, PUBLIC_PATH . 'template' . DS);													
				
	// ====================== URL ===========================
	define	('ROOT_URL'				, DS . 'PHP-Intern-Test'. DS); 
	define	('APPLICATION_URL'		, ROOT_URL . 'application' . DS);
	define	('PUBLIC_URL'			, ROOT_URL . 'public' . DS);
	define	('TEMPLATE_URL'			, PUBLIC_URL . 'template' . DS);
	define	('CSS_URL'				, TEMPLATE_URL . 'backend' . DS . 'css' . DS);
	define	('JS_URL'				, TEMPLATE_URL . 'backend' . DS . 'js' . DS);
	
	define	('DEFAULT_MODULE'		, 'backend');
	define	('DEFAULT_CONTROLLER'	, 'home');
	define	('DEFAULT_ACTION'		, 'index');

	define	('USER_CONTROLLER'		, 'user');
	define	('USER_LOGIN_ACTION'	, 'login');
	define	('USER_REG_ACTION'		, 'register');
	define	('USER_LOGOUT_ACTION'	, 'logout');

	// ====================== DATABASE ===========================
	define ('DB_HOST'				, $_SERVER['SERVER_NAME']);
	define ('DB_USER'				, 'root');						
	define ('DB_PASS'				, '');						
	define ('DB_NAME'				, 'manage_user');	
						
	define ('DB_TBL_ROLE'			, 'role');						
	define ('DB_TBL_USER'			, 'user');						

	
	// ====================== TIME ===========================
	define ('SESSION_TIMEOUT'		, 7200);	
