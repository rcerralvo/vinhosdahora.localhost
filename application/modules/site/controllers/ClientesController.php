<?php

class Site_ClientesController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        $this->_helper->viewRenderer->setNoRender();
    }

    public function addAction() {
        // action body
        $this->_helper->viewRenderer->setNoRender();
        
        $form = new VH_Forms_ClientesCadastro();
        $form->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . "/clientes/add");
        $form->addElement(new Zend_Form_Element('password', 'senha', array('label' => 'Senha:', 'class' => 'input-g')));

        $this->view->formCliente = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->_request->getPost();
            
            if ($form->isValid($data)) {
                $data['role'] = "usuario";
                $cliente = new Cliente($data);
                $cliente->save();
                $this->_redirect("auth");
            }
        }
    }
}
