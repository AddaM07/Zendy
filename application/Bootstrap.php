<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	private $_acl = null;
	private $_auth = null;

	// nazwy _init... nie mają znaczenia, ważne jest _init
	protected function _initAutoload() {
		$modelLoader = new Zend_Application_Module_Autoloader(array(
			'namespace' => '',
			'basePath' => APPLICATION_PATH
			));

		$this->_acl = new Model_LibraryAcl;
		$this->_auth = Zend_Auth::getInstance();

		$fc = Zend_Controller_Front::getInstance();
		$fc->registerPlugin(new Plugin_AccessCheck($this->_acl, $this->_auth));

		return $modelLoader;
	}

	function _initViewHelpers() {
		$layout = $this->bootstrap('layout')->getResource('layout');
		$view = $layout->getView();
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8')
						->appendName('description', 'Zendy page');

		$view->headTitle()->setSeparator(' - ');
		$view->headTitle('Zendy');

		//pobranie utworzonej ręcznie mapy menu i wysłanie do view helper
		$navContainerConfig = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
		$navContainer = new Zend_Navigation($navContainerConfig);

		$view->navigation($navContainer)->setAcl($this->_acl)->setRole($this->_auth->getStorage()->read()->role);
	}

}

