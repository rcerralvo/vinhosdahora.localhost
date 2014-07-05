<?php

class Pais extends VH_Db_DomainObjectAbstract
{
    protected $_mapper = "PaisMapper";
    private $Nome = null;
    private $Descricao = null;
    
    public function getNome() {
        return $this->Nome;
    }

    public function getDescricao() {
        return $this->Descricao;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }
    
    public function getNomePaises() {
        return $this->getMapper()->getNomePaises();
    }
    
    public function delete($id) {
        @unlink("images/icons/".$id.".jpg");
        return $this->getMapper()->delete($id);
    }
    
    public function hasImage() {
        $path = "images/icons/".$this->getId().".jpg";
        if (file_exists($path))
            return true;
    }
}

