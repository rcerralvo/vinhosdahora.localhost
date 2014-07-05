<?php

class TipoMapper extends VH_Db_DataMapperAbstract
{
    protected $_dbTable = "DbTable_Tipo";
    protected $_model = "Tipo";
    
    protected function _insert(\VH_Db_DomainObjectAbstract $obj) {
        try {
            $dbTable = $this->getDbTable();
            $data = array(
                "Nome" => $obj->getNome(),
                "Descricao" => $obj->getDescricao()
            );
            $dbTable->insert($data);
            return true;
        } catch (Zend_Exception $e) {
            return false;
        }
    }

    protected function _update(\VH_Db_DomainObjectAbstract $obj) {
        try {
            $dbTable = $this->getDbTable();
            $data = array(
                "Nome" => $obj->getNome(),
                "Descricao" => $obj->getDescricao()
            );
            $dbTable->update($data, array("id = ?" => $obj->getId()));
            return true;
        } catch (Zend_Exception $e) {
            return false;
        }
    }
    
    public function getNomeTipos() {
        $db = $this->getDb();
        $query = $db->select();
        $query->from('tipo', array('id', 'nome'))
                ->order('nome asc');
        
        $data = $db->fetchPairs($query);
        return $data;
    }
}

