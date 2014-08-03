<?php

class Admin_PedidosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $pedido = new Pedido();
        $data = $pedido->fetchAll();
        
        $paginator = Zend_Paginator::factory($data);
        $paginator->setCurrentPageNumber((int) $this->_getParam("page", 1));
        $paginator->setItemCountPerPage(10);

        $this->view->pedidos = $paginator;
    }

    public function viewAction()
    {
        // action body
        $itenspedido = new ItensPedido();
        $ritenspedido = $itenspedido->find((int) $this->_getParam("id"));
        
        foreach ($ritenspedido as $itemPedido) {
            echo $itemPedido->getProduto_id()->getNome()."<br>";
            echo $itemPedido->getQuantidade()."<br>";
            echo $itemPedido->getProduto_id()->getTipo_id()->getId();
        }
    }
    


}



