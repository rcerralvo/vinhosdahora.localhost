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
    
    public function save() {
        $db = $this->getMapper()->getDb();
        $query = $db->select();
        $query->from('tipo')->where("Nome = '{$this->getNome()}'");
        
        $data = $db->fetchRow($query);
        
        if ($data)
            throw new Exception('Esse tipo já existe');
        
        parent::save();
    }
    
    public function delete($id) {
        $db = $this->getMapper()->getDb();
        $query = $db->select();
        $query->from('produto')->where('tipo_id = ' . (int) $id);
        
        $data = $db->fetchRow($query);
        
        if ($data)
            throw new Exception('Esse tipo não pode ser excluido, pois possui dependências');
        
        parent::delete($id);
    }
}

