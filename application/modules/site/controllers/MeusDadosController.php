<?php

class Site_MeusDadosController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        // verifica se o usuário está logado
        $auth = Zend_Auth::getInstance();
        $auth->setStorage(new Zend_Auth_Storage_Session('site'));

        if (!$auth->hasIdentity())
            $this->_redirect('/auth');

        $cliente = new Cliente();
        $rcliente = $cliente->getAsArray((int) $auth->getIdentity()->id);
        unset($rcliente['Senha']);

        $form = new VH_Forms_ClientesCadastro();
        $form->addElement(new Zend_Form_Element_Hidden("id", $rcliente['id']));

        // remove captcha
        $form->removeElement("captcha");
        // remove Login
        $form->removeElement("Login");
        // remove senha
        $form->removeElement("senha");
        $form->populate($rcliente);
        $this->view->form = $form;

        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            if ($form->isValid($data)) {
                $cliente = new Cliente($data);
                $cliente->save();
            }
        }
    }

}
