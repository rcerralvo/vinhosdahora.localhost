<?php

class Tipo extends VH_Db_DomainObjectAbstract
{
    protected $_mapper = "TipoMapper";
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
    
    public function getNomeTipos() {
        return $this->getMapper()->getNomeTipos();
    }
}

