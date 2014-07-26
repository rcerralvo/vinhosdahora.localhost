<?php

class VH_Forms_Login extends Zend_Form {
    
    public function init() {
        
        # Método POST
        $this->setMethod("post");
        
        # Campo Login
        $login = $this->createElement("text", "login", array("label" => "Login:", "class" => "input-g"))
                ->setRequired(true)
                ->addValidator('NotEmpty')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addErrorMessage('Informe o seu Login');
        $this->addElement($login);
        
        # Campo Senha
        $senha = $this->createElement("password", "senha", array("label" => "Senha:", "class" => "input-g"))
                ->setRequired(true)
                ->addValidator('NotEmpty')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addErrorMessage('Informe a sua Senha');
        $this->addElement($senha);
        
        # Botão Acessar
        $submit = $this->createElement("submit", "submit", array("label" => "Acessar", "class" => "input-p"));
        $this->addElement($submit);
        
        # Segurança
        $this->addElement("hash", "csrf");
    }
}

