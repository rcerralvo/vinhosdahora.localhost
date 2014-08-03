<?php

class Site_MeusPedidosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
        # verifica se o user está logado
        $auth = Zend_Auth::getInstance();
        $auth->setStorage(new Zend_Auth_Storage_Session('site'));
        if (!$auth->hasIdentity())
            $this->_redirect ('/auth');
        
        $pedidos = new Pedido();
        $rpedidos = $pedidos->getByClienteId((int) $auth->getIdentity()->id);
        
        $this->view->pedidos = $rpedidos;
    }

    public function viewAction()
    {
        // action body
        $itenspedido = new ItensPedido();
        $ritenspedido = $itenspedido->find((int) $this->_getParam("id"));

        $this->view->itensPedidos = $ritenspedido;
    }


}



