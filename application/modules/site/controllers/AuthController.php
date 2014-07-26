<?php

class Site_AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form = new VH_Forms_Login();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost())
        {
            $data = $this->_request->getPost();
            
            if ($form->isValid($data))
            {
                try {
                    $authAdapter = $this->getAuthAdapter();
                    $authAdapter->setIdentity($data["login"])
                            ->setCredential($data["senha"]);
                    $result = $authAdapter->authenticate();
                    if ($result->isValid())
                    {
                        $auth = Zend_Auth::getInstance();
                        $auth->setStorage(new Zend_Auth_Storage_Session("site"));
                        $dataAuth = $authAdapter->getResultRowObject(null, "senha");
                        $auth->getStorage()->write($dataAuth);
                        $carrinho = Carrinho::getInstance();
                        
                        if ($carrinho->isEmpty())
                            $this->_redirect("index");
                        else
                            $this->_redirect ("checkout");
                    }
                    else 
                    {
                        throw new Exception("Login ou Senha inválidos!");
                    }
                }
                catch (Exception $e)
                {
                    $this->view->messages = $e->getMessage();
                }
            }
        }
    }
    
    public function logoutAction() {
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout->disableLayout();
        $auth = Zend_Auth::getInstance();
        $auth->setStorage(new Zend_Auth_Storage_Session("site"));
        $auth->clearIdentity();
        Carrinho::getInstance()->clear();
        $this->_redirect("index");
    }

    private function getAuthAdapter()
    {
        $bootstrap = $this->getInvokeArg("bootstrap");
        $resource = $bootstrap->getPluginResource("db");
        
        $db = $resource->getDbAdapter();
        
        $authAdapter = new Zend_Auth_Adapter_DbTable($db);
        $authAdapter->setTableName("cliente")
                ->setIdentityColumn("login")
                ->setCredentialColumn("senha")
                ->setCredentialTreatment('SHA1(?) and role <> ""');
        return $authAdapter;
    }
}



