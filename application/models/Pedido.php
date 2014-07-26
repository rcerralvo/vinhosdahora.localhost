<?php

class Pedido extends VH_Db_DomainObjectAbstract
{
    protected $_mapper = "PedidoMapper";
    private $cliente_id = null;
    private $Valor = null;
    private $DataHora = null;
    
    public function getCliente_id() {
        return $this->cliente_id;
    }

    public function getValor() {
        return $this->Valor;
    }

    public function getDataHora() {
        return $this->DataHora;
    }

    public function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function setValor($Valor) {
        $this->Valor = $Valor;
    }

    public function setDataHora($DataHora) {
        $this->DataHora = $DataHora;
    }
    
    public function geraPedido(Cliente $cliente, Carrinho $carrinho) {
        return $this->getMapper()->geraPedido($cliente, $carrinho);
    }
}

