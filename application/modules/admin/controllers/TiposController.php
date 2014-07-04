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
        $this->view->tipos = $data;
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


}





