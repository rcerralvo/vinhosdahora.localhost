<?php

class Admin_ProdutosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $produtos = new Produto();
        $data = $produtos->fetchAll();
        
        $paginator = Zend_Paginator::factory($data);
        $paginator->setCurrentPageNumber((int) $this->_getParam("page", 1));
        $paginator->setItemCountPerPage(10);

        $this->view->produtos = $paginator;
        $this->view->currency = Zend_Registry::get('currency');
    }
}

