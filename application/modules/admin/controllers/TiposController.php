<?php

class Admin_TiposController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $tipos = new Tipo();
        $data = $tipos->fetchAll();
        
        $paginator = Zend_Paginator::factory($data);
        $paginator->setCurrentPageNumber((int) $this->_getParam("page", 1));
        $paginator->setItemCountPerPage(10);
        
        $this->view->tipos = $paginator;
    }

    public function addAction()
    {
        // action body
        $form = new VH_Forms_Tipos();
        $this->view->form = $form;
        
        if ($this->_request->isPost()) 
        {
            $data = $this->_request->getPost();
            if ($form->isValid($data))
            {
                $tipo = new Tipo($data);
                $tipo->save();
                $this->_redirect("admin/tipos");
            }
        }
    }

    public function editAction()
    {
        // action body
        $tipo = new Tipo();
        $rtipo = $tipo->getAsArray((int) $this->_getParam("id"));
       
        $form = new VH_Forms_Tipos();
        $form->addElement(new Zend_Form_Element_Hidden("id", $rtipo["id"]));
        $form->populate($rtipo);
        $this->view->form = $form;
        
        if ($this->_request->isPost())
        {
            $data = $this->_request->getPost();
            if ($form->isValid($data))
            {
                $tipo = new Tipo($data);
                $tipo->save();
                $this->_redirect("admin/tipos");
            }
        }
    }
    
    public function deleteAction()
    {
        $tipo = new Tipo();
        if ((int) $this->_getParam("id") > 0)
            $tipo->delete ($this->_getParam ("id"));
        
        $this->_helper->viewRenderer->setNoRender();
        $this->_redirect("admin/tipos");
    }
}





