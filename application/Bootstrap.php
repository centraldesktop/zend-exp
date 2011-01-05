<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

	protected function _initCDHacks() {
		/*
		set_include_path(implode(PATH_SEPARATOR, array(
            APPLICATION_PATH.'/../library/CD-includes',
            get_include_path(),
        )));
        */
	}
	
	protected function _initLibPaths() {
		Zend_Loader_Autoloader::getInstance()->registerNamespace(array('CD', 'CD', 'MF'));
		
		$smartyPath = realpath(APPLICATION_PATH.'/../library/Smarty');
		define('SMARTY_SYSPLUGINS_DIR', "$smartyPath/sysplugins/");
		Zend_Loader::loadFile('Smarty.class.php', $smartyPath, true);
    }

    protected function _initRouter() {

		$this->bootstrap('frontController');
		$front = Zend_Controller_Front::getInstance();
		$router = $front->getRouter();
        
        //root folder URLs
        $router->addRoute('root-folder', new MF_Controller_Router_Route_Regex(
			'folder(?:/([a-z-]+))?',
			array(
				'id'         => 0,
				'controller' => 'folder', 
				'action'     => 'view'
			),
			array(
				1 => 'action'
			),
			'folder/%s'
		));
		
		//generic folder URL
        $router->addRoute('folder', new MF_Controller_Router_Route_Regex(
			'folder/([\d-]+)(?:/([a-z-]+))?',
			array(
				'controller' => 'folder', 
				'action'     => 'view'
			),
			array(
				1 => 'id',
				2 => 'action'
			),
			'folder/%s/%s'
		));
        
		//generic item URL
        $router->addRoute('item', new MF_Controller_Router_Route_Regex(
			'item/(\d+)(?:/([a-z-]+))?',
			array(
				'controller' => 'item', 
				'action'     => 'view'
			),
			array(
				1 => 'id',
				2 => 'action'
			),
			'item/%s/%s'
		));
        
		//login page URL
        $router->addRoute('login', new Zend_Controller_Router_Route_Static(
			'login',
			array(
				'controller' => 'auth', 
				'action'     => 'login'
			)
		));
        
     }

}

