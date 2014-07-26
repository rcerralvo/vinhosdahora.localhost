<?php

class ItensPedidoMapper extends VH_Db_DataMapperAbstract {

    protected $_dbTable = "DbTable_ItensPedido";
    protected $_model = "ItensPedido";

    protected function _insert(\VH_Db_DomainObjectAbstract $obj) {
        try {
            $dbTable = $this->getDbTable();
            $data = array(
                'pedido_id' => $obj->getPedido_id(),
                'produto_id' => $obj->getProduto_id(),
                'Quantidade' => $obj->getQuantidade(),
                'Preco' => $obj->getPreco()
            );
            $dbTable->insert($data);
            return true;
        } catch (Zend_Exception $e) {
            return false;
        }
    }

    protected function _update(\VH_Db_DomainObjectAbstract $obj) {
        
    }

}
