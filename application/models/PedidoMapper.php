<?php

class PedidoMapper extends VH_Db_DataMapperAbstract {

    protected $_dbTable = "DbTable_Pedido";
    protected $_model = "Pedido";

    protected function _insert(\VH_Db_DomainObjectAbstract $obj) {
        try {
            $dbTable = $this->getDbTable();
            $data = array(
                'cliente_id' => $obj->getCliente_id(),
                'Valor' => $obj->getValor(),
                'DataHora' => date("Y-m-d H:i:s")
            );
            $dbTable->insert($data);
            return true;
        } catch (Zend_Exception $e) {
            return false;
        }
    }

    protected function _update(\VH_Db_DomainObjectAbstract $obj) {
        
    }

    public function geraPedido(Cliente $cliente, Carrinho $carrinho) {
        $db = $this->getDb();
        $db->beginTransaction();
        try {
            $valor = $carrinho->getTotal();
            $cliente_id = $cliente->getId();

            $dataPedido = array('Valor' => $valor, 'cliente_id' => $cliente_id);
            $pedido = new Pedido($dataPedido);
            $pedido->save();

            $pedido_id = $pedido->getLastInsertId();

            $produtos_carrinho = $carrinho->fetchAll();
            foreach ($produtos_carrinho as $produto) {
                $produto_id = $produto['produto']->getId();
                $produto_preco = $produto['produto']->getPreco();
                $produto_quantidade = $produto['qtd'];
                $dataItensPedido = array(
                    'pedido_id' => $pedido_id,
                    'produto_id' => $produto_id,
                    'Quantidade' => $produto_quantidade,
                    'Preco' => $produto_preco
                );
                $itensPedido = new ItensPedido($dataItensPedido);
                $itensPedido->save();
            }

            $db->commit();
            return $pedido_id;
        } catch (Zend_Exception $e) {
            $db->rollBack();
        }
    }

    public function fetchAll() {
        $db = $this->getDb();
        $query = $db->select();
        $query->from('pedido');
        $pedidos = $db->fetchAll($query);

        $objArray = array();
        $cliente = new Cliente();
        foreach ($pedidos as $pedido) {
            $pedido['cliente_id'] = $cliente->find($pedido['cliente_id']);
            $objArray[] = $this->_populate($pedido);
        }

        return $objArray;
    }

    public function find($id) {
        $db = $this->getDb();
        $query = $db->select();
        $query->from('pedido')
                ->where('id = ' . (int) $id);

        $data = $db->fetchRow($query);

        if ($data) {
            $clienteMapper = new ClienteMapper();
            $cliente = $clienteMapper->find($data['cliente_id']);
            $data['cliente_id'] = $cliente;

            return $this->_populate($data);
        }
    }

}
