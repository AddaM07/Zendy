<?php

class Form_Login extends Zend_Form
{

    public function init()
    {
    	$this->setMethod('post');
    	$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/authentication/login');
        $this->addElement('text', 'username', array(
        	'label' => 'Username',
        	'required' => true
        ));
        $this->addElement('password', 'password', array(
        	'label' => 'Password',
        	'required' => true
        ));
        $this->addElement('submit', 'Login');
    }

    
}
