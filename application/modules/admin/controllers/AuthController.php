<?php

class Admin_AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->_flashMessenger->getMessages();
        
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
                        $auth->setStorage(new Zend_Auth_Storage_Session("admin"));
                        $dataAuth = $authAdapter->getResultRowObject(null, "senha");
                        $auth->getStorage()->write($dataAuth);
                        $this->_redirect("admin/");
                    }
                    else 
                    {
                        throw new Exception("Login ou Senha inválidos!");
                    }
                }
                catch (Exception $e)
                {
                    $this->_helper->FlashMessenger($e->getMessage());
                }
            }
            else
            {
                $form->populate($data);
            }
        }
    }
    
    private function getAuthAdapter()
    {
        $bootstrap = $this->getInvokeArg("bootstrap");
        $resource = $bootstrap->getPluginResource("db");
        
        $db = $resource->getDbAdapter();
        
        $authAdapter = new Zend_Auth_Adapter_DbTable($db);
        $authAdapter->setTableName("funcionario")
                ->setIdentityColumn("login")
                ->setCredentialColumn("senha")
                ->setCredentialTreatment('role <> "" and role = "Administrador"');
        return $authAdapter;
    }
}

