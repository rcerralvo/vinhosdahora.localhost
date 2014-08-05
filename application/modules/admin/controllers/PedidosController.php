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
        
        $total = 0;
        $totalPendentes = 0;
        $totalConfirmados = 0;
        
        foreach ($data as $pedido) {
            $total += $pedido->getValor();
            
            if ($pedido->getStatus_pagamento() != "Autorizado" && $pedido->getStatus_pagamento() != "Concluido" ) 
                $totalPendentes += $pedido->getValor();
            
            elseif ($pedido->getStatus_pagamento() == "Autorizado" || $pedido->getStatus_pagamento() == "Concluido" ) 
                $totalConfirmados += $pedido->getValor();
        }

        $this->view->pedidos = $paginator;
        $this->view->total = $total;
        $this->view->totalPendentes = $totalPendentes;
        $this->view->totalConfirmados = $totalConfirmados;
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



