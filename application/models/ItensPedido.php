<?php

class ItensPedido extends VH_Db_DomainObjectAbstract
{
    protected $_mapper = "ItensPedidoMapper";
    private $pedido_id = null;
    private $produto_id = null;
    private $Quantidade = null;
    private $Preco = null;
    
    public function getPedido_id() {
        return $this->pedido_id;
    }

    public function getProduto_id() {
        return $this->produto_id;
    }

    public function getQuantidade() {
        return $this->Quantidade;
    }

    public function getPreco() {
        return $this->Preco;
    }

    public function setPedido_id($pedido_id) {
        $this->pedido_id = $pedido_id;
    }

    public function setProduto_id($produto_id) {
        $this->produto_id = $produto_id;
    }

    public function setQuantidade($Quantidade) {
        $this->Quantidade = $Quantidade;
    }

    public function setPreco($Preco) {
        $this->Preco = $Preco;
    }

    
 }

