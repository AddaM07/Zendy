<?php

class TestController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $register = new Model_Register();
        $register->updateUser(array(
            'firstname' => 'AdamNowy',
            'lastname' => 'Pteznowe'
        ), 1);

        // $register->createUser(array(
        //     'firstname' => 'Adam',
        //     'lastname' => 'P'
        // ));
    }

    public function chatAction() {
    	$this->view->msg = 'This is a message';
    	// echo 'Im chat method';
    }

    public function otherAction() {
    	echo 22;
    }


}

