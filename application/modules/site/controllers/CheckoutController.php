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

    public function finishAction()
    {
        // action body
        
        // não renderiza a view finish
        $this->_helper->viewRenderer->setNoRender();
        // desabilita o layout principal
        $this->_helper->layout->disableLayout();
        
        $auth = Zend_Auth::getInstance()
                ->setStorage(new Zend_Auth_Storage_Session("site"));
        
        // true se estiver logado
        if ($auth->hasIdentity()) {
            if ($this->_request->isPost()) {
                $data = $this->_request->getPost();
                
                $carrinho = Carrinho::getInstance();
                $config = new Zend_Config_Ini(APPLICATION_PATH . "/configs/moip.ini", "moip");
                
                $userToken = $config->token;
                $key = $config->key;
                
                $idCliente = (int) $auth->getIdentity()->id;
                
                $cliente = new Cliente();
                $rcliente = $cliente->find($idCliente);
                
                $pedido = new Pedido();
                $pedido_id = $pedido->geraPedido($rcliente, $carrinho);
                
                $moip = new PagamentoMoip();
                $xml = $moip->generateXML($rcliente, $carrinho, $pedido_id, $data['frete']);
            }
        }
        
        
    }


}



