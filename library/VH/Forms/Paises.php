<?php

class VH_Forms_Paises extends Zend_Form
{
    public function init() {
        
        # Método POST
        $this->setMethod("POST");
        $this->setAttrib('enctype', 'multipart/form-data');

        
        # Campo Nome
        $nome = $this->createElement("text", "Nome", array("label" => "Nome:", "class" => "input-m"))
                ->setRequired(true);
        $this->addElement($nome);
        
        # Campo Descrição
        $descricao = $this->createElement("text", "Descricao", array("label" => "Descrição:", "class" => "input-g"));
        $this->addElement($descricao);

        # Imagem
        $icon = new Zend_Form_Element_File('image');
        $icon->setLabel("Imagem :");
        $icon->setDestination("images/icons/")->setValueDisabled(true);
        $icon->addValidator("Extension", false, "jpg, png, gif");
        $icon->addValidator("Size", false, "100kb");
        $icon->addValidator("Count", false, 1);
        $this->addElement($icon);
        
        # Botão Salvar
        $submit = $this->createElement("submit", "submit", array("label" => "Salvar", "class" => "input-p"));
        $this->addElement($submit);
    }
}

