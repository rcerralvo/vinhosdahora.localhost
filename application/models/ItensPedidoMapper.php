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
    
    public function find($id) {
        $db = $this->getDb();
        $query = $db->select();
        $query->from('itenspedido')
                ->where('pedido_id = '. (int) $id);
        
        $itensPedidos = $db->fetchAll($query);
        
        $objArray = array();
        $pedidoMapper = new PedidoMapper();
        $produtoMapper = new ProdutoMapper();
        
        foreach ($itensPedidos as $itemPedido) {
            $pedido = $pedidoMapper->find($itemPedido['pedido_id']);
            $itemPedido['pedido_id'] = $pedido;
            
            $produto = $produtoMapper->find($itemPedido['produto_id']);
            $itemPedido['produto_id'] = $produto;
            
            $objArray[] = $this->_populate($itemPedido);
        }
        return $objArray;
    }
}
