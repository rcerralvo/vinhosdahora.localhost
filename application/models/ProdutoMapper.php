<?php

class ProdutoMapper extends VH_Db_DataMapperAbstract {

    protected $_dbTable = "DbTable_Produto";
    protected $_model = "Produto";

    protected function _insert(\VH_Db_DomainObjectAbstract $obj) {
        try {
            $dbTable = $this->getDbTable();
            $data = array(
                'pais_id' => $obj->getPais_id(),
                'tipo_id' => $obj->getTipo_id(),
                'Nome' => $obj->getNome(),
                'Descricao' => $obj->getDescricao(),
                'Preco' => $obj->getPreco(),
                'Peso' => $obj->getPeso(),
                'PesoLiquido' => $obj->getPesoLiquido(),
                'Estoque' => $obj->getEstoque(),
                'Ativo' => $obj->getAtivo()
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
                'pais_id' => $obj->getPais_id(),
                'tipo_id' => $obj->getTipo_id(),
                'Nome' => $obj->getNome(),
                'Descricao' => $obj->getDescricao(),
                'Preco' => $obj->getPreco(),
                'Peso' => $obj->getPeso(),
                'PesoLiquido' => $obj->getPesoLiquido(),
                'Estoque' => $obj->getEstoque(),
                'Ativo' => $obj->getAtivo()
            );

            $dbTable->update($data, array('id = ?' => $obj->getId()));
            return true;
        } catch (Zend_Exception $e) {
            return false;
        }
    }

    public function find($id) {
        $db = $this->getDb();
        $query = $db->select();
        $query->from('produto')
                ->where('id = ' . (int) $id);

        $data = $db->fetchRow($query);

        if ($data) {
            $paisMapper = new PaisMapper();
            $pais = $paisMapper->find($data['pais_id']);
            $data['pais_id'] = $pais;

            $tipoMapper = new TipoMapper();
            $tipo = $tipoMapper->find($data['tipo_id']);
            $data['tipo_id'] = $tipo;

            return $this->_populate($data);
        }
    }

    public function fetchAll() {
        $db = $this->getDb();
        $query = $db->select();
        $query->from('produto')
                ->order('nome asc');

        $produtos = $db->fetchAll($query);

        $objArray = array();
        $paisMapper = new PaisMapper();
        $tipoMapper = new TipoMapper();

        foreach ($produtos as $produto) {
            $pais = $paisMapper->find($produto['pais_id']);
            $produto['pais_id'] = $pais;

            $tipo = $tipoMapper->find($produto['tipo_id']);
            $produto['tipo_id'] = $tipo;

            $objArray[] = $this->_populate($produto);
        }

        return $objArray;
    }

    public function getByPaisId($id) {
        $db = $this->getDb();
        $query = $db->select();
        $query->from('produto')
                ->where('pais_id = ' . (int) $id);

        $produtos = $db->fetchAll($query);

        $objArray = array();
        $paisMapper = new PaisMapper();

        foreach ($produtos as $produto) {
            $pais = $paisMapper->find($produto['pais_id']);
            $produto['pais_id'] = $pais;
            $objArray[] = $this->_populate($produto);
        }

        return $objArray;
    }

    public function getByTipoId($id) {
        $db = $this->getDb();
        $query = $db->select();
        $query->from('produto')
                ->where('tipo_id = ' . (int) $id);

        $produtos = $db->fetchAll($query);

        $objArray = array();
        $TipoMapper = new TipoMapper();

        foreach ($produtos as $produto) {
            $tipo = $TipoMapper->find($produto['tipo_id']);
            $produto['tipo_id'] = $tipo;
            $objArray[] = $this->_populate($produto);
        }

        return $objArray;
    }

}
