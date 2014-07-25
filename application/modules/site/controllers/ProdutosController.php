<?php

class Site_ProdutosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function viewAction()
    {
        // action body
        $produto = new Produto();
        $rproduto = $produto->find((int) $this->_getParam("id"));
        if ($rproduto)
            $this->view->produto = $rproduto;
    }

    public function listTiposAction()
    {
        // action body
        $produto = new Produto();
        $produtos = $produto->getByTipoId((int) $this->_getParam("tipo_id"));
        
        $tipo = new Tipo();
        $this->view->tipo = $tipo->find((int) $this->_getParam("tipo_id"));
        
        $paginator = Zend_Paginator::factory($produtos);
        $paginator->setDefaultItemCountPerPage(3);
        $paginator->setCurrentPageNumber((int) $this->_getParam("page", 1));
        $this->view->produtos = $paginator;
    }

    public function listPaisesAction()
    {
        // action body
        $produto = new Produto();
        $produtos = $produto->getByPaisId((int) $this->_getParam("pais_id"));
        
        $pais = new Pais();
        $this->view->pais = $pais->find((int) $this->_getParam("pais_id"));
        
        $paginator = Zend_Paginator::factory($produtos);
        $paginator->setDefaultItemCountPerPage(3);
        $paginator->setCurrentPageNumber((int) $this->_getParam("page", 1));
        $this->view->produtos = $paginator;
    }


}







