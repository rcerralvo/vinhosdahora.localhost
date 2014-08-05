<?php

class Pedido extends VH_Db_DomainObjectAbstract
{
    protected $_mapper = "PedidoMapper";
    private $cliente_id = null;
    private $Valor = null;
    private $DataHora = null;
    private $status_pagamento = null;
    private $cod_moip = null;
    private $tipo_pagamento = null;
    
    public function getStatus_pagamento() {
        return $this->status_pagamento;
    }

    public function getCod_moip() {
        return $this->cod_moip;
    }

    public function getTipo_pagamento() {
        return $this->tipo_pagamento;
    }

    public function setStatus_pagamento($status_pagamento) {
        $this->status_pagamento = $status_pagamento;
    }

    public function setCod_moip($cod_moip) {
        $this->cod_moip = $cod_moip;
    }

    public function setTipo_pagamento($tipo_pagamento) {
        $this->tipo_pagamento = $tipo_pagamento;
    }

        
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
    
    public function getByClienteId($id) {
        return $this->getMapper()->getByClienteId($id);
    }
}

