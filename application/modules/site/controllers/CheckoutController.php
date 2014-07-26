<?php

class Site_CheckoutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $carrinho = Carrinho::getInstance();
        Zend_Session::regenerateId();
        
        if (!$carrinho->isEmpty()) {
            $formLogin = new VH_Forms_Login();
            $formLogin->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . "/auth");
            $this->view->formLogin = $formLogin;
            
            $formCliente = new VH_Forms_ClientesCadastro();
            $formCliente->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . "/clientes/add");
            $this->view->formCliente = $formCliente;
            
            $this->view->carrinho = $carrinho->fetchAll();
            $this->view->total = $carrinho->getTotal();
        }
        else {
            $this->_redirect("carrinho");
        }
    }


}

