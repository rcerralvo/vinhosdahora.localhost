<?php

class Cliente extends VH_Db_DomainObjectAbstract
{
    protected $_mapper = "ClienteMapper";
    private $Nome = null;
    private $Cpf = null;
    private $Rg = null;
    private $Email = null;
    private $Telefone = null;
    private $Celular = null;
    private $Endereco = null;
    private $Numero = null;
    private $Complemento = null;
    private $Bairro = null;
    private $Cidade = null;
    private $Estado = null;
    private $Cep = null;
    private $Login = null;
    private $Senha = null;
    private $role = null;
    
    public function getNome() {
        return $this->Nome;
    }

    public function getCpf() {
        return $this->Cpf;
    }

    public function getRg() {
        return $this->Rg;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getTelefone() {
        return $this->Telefone;
    }

    public function getCelular() {
        return $this->Celular;
    }

    public function getEndereco() {
        return $this->Endereco;
    }

    public function getNumero() {
        return $this->Numero;
    }

    public function getComplemento() {
        return $this->Complemento;
    }

    public function getBairro() {
        return $this->Bairro;
    }

    public function getCidade() {
        return $this->Cidade;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function getCep() {
        return $this->Cep;
    }

    public function getLogin() {
        return $this->Login;
    }

    public function getSenha() {
        return $this->Senha;
    }

    public function getRole() {
        return $this->role;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function setCpf($Cpf) {
        $this->Cpf = $Cpf;
    }

    public function setRg($Rg) {
        $this->Rg = $Rg;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }

    public function setCelular($Celular) {
        $this->Celular = $Celular;
    }

    public function setEndereco($Endereco) {
        $this->Endereco = $Endereco;
    }

    public function setNumero($Numero) {
        $this->Numero = $Numero;
    }

    public function setComplemento($Complemento) {
        $this->Complemento = $Complemento;
    }

    public function setBairro($Bairro) {
        $this->Bairro = $Bairro;
    }

    public function setCidade($Cidade) {
        $this->Cidade = $Cidade;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    public function setCep($Cep) {
        $this->Cep = $Cep;
    }

    public function setLogin($Login) {
        $this->Login = $Login;
    }

    public function setSenha($Senha) {
        $this->Senha = sha1($Senha);
    }

    public function setRole($role) {
        $this->role = $role;
    }

    
}

