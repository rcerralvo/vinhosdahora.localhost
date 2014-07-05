<?php

class Admin_PaisesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $paises = new Pais();
        $data = $paises->fetchAll();
        
        $paginator = Zend_Paginator::factory($data);
        $paginator->setCurrentPageNumber((int) $this->_getParam("page", 1));
        $paginator->setItemCountPerPage(10);
        
        $this->view->paises = $paginator;
    }

    public function addAction()
    {
        // action body
        $form = new VH_Forms_Paises();
        $this->view->form = $form;
        
        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            if ($form->isValid($data)) {
                $pais = new Pais($data);
                $pais->save();
                
                $file = $pais->getLastInsertId().".jpg";
                $icone = $form->getElement('image');

                $icone->addFilter('Rename', array('target' => 'images/icons/' . $file));
                $icone->receive();
  
                $this->_redirect("admin/paises");
            }
        }
    }

    public function editAction()
    {
        // action body
        $pais = new Pais();
        $rpais = $pais->getAsArray((int) $this->_getParam("id"));
        
        $form = new VH_Forms_Paises();
        $form->addElement(new Zend_Form_Element_Hidden("id", $rpais["id"]));
        $form->populate($rpais);
        $this->view->form = $form;
        
        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            if ($form->isValid($data)) {
                $pais = new Pais($data);
                $pais->save();
               
                $file = $pais->getId().".jpg";
                $image = $form->getElement('image');
               
                $image->addFilter('Rename', array("target" => "images/icons/" . $file));
                $image->receive();
                
                $this->_redirect("admin/paises/");
            }
        }
    }
    
    public function deleteAction()
    {
        $pais = new Pais();
        if ((int) $this->_getParam("id") > 0)
            $pais->delete((int) $this->_getParam ("id"));
        
        $this->_helper->viewRenderer->setNoRender();
        $this->_redirect("admin/paises");
    }
}





