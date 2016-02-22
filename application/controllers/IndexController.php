<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Form_Register();
        $this->view->form = $form;

        $this->view->headTitle('index page', 'APPEND');
    }

    public function saveAction() {

    }

}

