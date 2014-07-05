<?php

class Produto extends VH_Db_DomainObjectAbstract
{
    protected $_mapper = "ProdutoMapper";
    private $pais_id = null;
    private $tipo_id = null;
    private $Nome = null;
    private $Descricao = null;
    private $Preco = null;
    private $Peso = null;
    private $PesoLiquido = null;
    private $Estoque = null;
    private $Ativo = null;
    
    public function get_mapper() {
        return $this->_mapper;
    }

    public function getPais_id() {
        return $this->pais_id;
    }

    public function getTipo_id() {
        return $this->tipo_id;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function getDescricao() {
        return $this->Descricao;
    }

    public function getPreco() {
        return $this->Preco;
    }

    public function getPeso() {
        return $this->Peso;
    }

    public function getPesoLiquido() {
        return $this->PesoLiquido;
    }

    public function getEstoque() {
        return $this->Estoque;
    }

    public function getAtivo() {
        return $this->Ativo;
    }

    public function set_mapper($_mapper) {
        $this->_mapper = $_mapper;
    }

    public function setPais_id($pais_id) {
        $this->pais_id = $pais_id;
    }

    public function setTipo_id($tipo_id) {
        $this->tipo_id = $tipo_id;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }

    public function setPreco($Preco) {
        $this->Preco = $Preco;
    }

    public function setPeso($Peso) {
        $this->Peso = $Peso;
    }

    public function setPesoLiquido($PesoLiquido) {
        $this->PesoLiquido = $PesoLiquido;
    }

    public function setEstoque($Estoque) {
        $this->Estoque = $Estoque;
    }

    public function setAtivo($Ativo) {
        $this->Ativo = $Ativo;
    }
    
    public function getByPaisId($id) {
        return $this->getMapper()->getByPaisId();
    }
    
    public function getByTipoId($id) {
        return $this->getMapper()->getByTipoId();
    }
    
    public function delete($id) {
        @unlink("images/produtos".$id.".jpg");
        return $this->getMapper()->delete($id);
    }
    
    public function hasImage() {
        $path = "images/produtos/".$this->getId().".jpg";
        if (file_exists($path))
            return true;
    }
}

