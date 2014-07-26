<?php

class ClienteMapper extends VH_Db_DataMapperAbstract {

    protected $_dbTable = "DbTable_Cliente";
    protected $_model = "Cliente";

    protected function _insert(\VH_Db_DomainObjectAbstract $obj) {
        try {
            $dbTable = $this->getDbTable();
            $data = array(
                'Nome' => $obj->getNome(),
                'Cpf' => $obj->getCpf(),
                'Rg' => $obj->getRg(),
                'Email' => $obj->getEmail(),
                'Telefone' => $obj->getTelefone(),
                'Celular' => $obj->getCelular(),
                'Endereco' => $obj->getEndereco(),
                'Numero' => $obj->getNumero(),
                'Complemento' => $obj->getComplemento(),
                'Bairro' => $obj->getBairro(),
                'Cidade' => $obj->getCidade(),
                'Estado' => $obj->getEstado(),
                'Cep' => $obj->getCep(),
                'Login' => $obj->getLogin(),
                'Senha' => $obj->getSenha(),
                'role' => $obj->getRole()
            );
            $dbTable->insert($data);
            return true;
        } catch (Zend_Exception $e) {
            throw new Exception($e->getMessage());
            return false;
        }
    }

    protected function _update(\VH_Db_DomainObjectAbstract $obj) {
        
    }

}
