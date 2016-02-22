<?php

class Model_LibraryAcl extends Zend_Acl {
	public function __construct() {
		//trzeba wszystkie bo potem wywala błąd że nie jest zasób zdefiniowany
		$this->add(new Zend_Acl_Resource('index'));

		$this->add(new Zend_Acl_Resource('book'));
		//edit inherit also permissions from book
		$this->add(new Zend_Acl_Resource('edit'), 'book');
		$this->add(new Zend_Acl_Resource('add'), 'book');

		$this->add(new Zend_Acl_Resource('books'));

		$this->add(new Zend_Acl_Resource('authentication'));
		$this->add(new Zend_Acl_Resource('logout'));
		$this->add(new Zend_Acl_Resource('login'));


		//first role must be the role with lowest permissions
		$this->addRole(new Zend_Acl_Role('user'));
		//admin inherits from user
		$this->addRole(new Zend_Acl_Role('admin'), 'user');

		$this->allow(null, 'login');

		$this->deny('user', 'login');
		$this->allow('user', array('index', 'authentication', 'logout', 'books'));
		
		$this->allow('admin', 'book');
	}
}