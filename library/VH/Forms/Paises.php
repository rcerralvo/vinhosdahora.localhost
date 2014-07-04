<?php

class VH_Forms_Paises extends Zend_Form
{
    public function init() {
        
        # Método POST
        $this->setMethod("POST");
        
        # Campo Nome
        $nome = $this->createElement("text", "Nome", array("label" => "Nome:", "class" => "input-m"))
                ->setRequired(true);
        $this->addElement($nome);
        
        # Campo Descrição
        $descricao = $this->createElement("text", "Descricao", array("label" => "Descrição:", "class" => "input-g"));
        $this->addElement($descricao);
        
        # Botão Salvar
        $submit = $this->createElement("submit", "submit", array("label" => "Salvar", "class" => "input-p"));
        $this->addElement($submit);
    }
}

