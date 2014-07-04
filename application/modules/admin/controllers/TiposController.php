<?php

class Admin_TiposController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $tipos = new Tipo();
        $data = $tipos->fetchAll();
        $this->view->tipos = $data;
    }

    public function addAction()
    {
        // action body
    }


}



