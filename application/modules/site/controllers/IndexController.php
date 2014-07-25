<?php

class Site_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $produtos = new Produto();
        $rprodutos = $produtos->fetchAll();
        
        $paginator = Zend_paginator::factory($rprodutos);
        $paginator->setDefaultItemCountPerPage(3);
        $paginator->setCurrentPageNumber((int) $this->_getParam("page", 1));
        $this->view->produtos = $paginator;
    }


}

