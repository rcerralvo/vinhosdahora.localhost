<?php

class VH_Forms_Produtos extends Zend_Form
{
    public function init() {
        
        # Método
        $this->setMethod("POST");
        
        # Enctype
        $this->setAttrib('enctype', 'multipart/form-data');
        
        # Select Option Pais
        $pais = new Zend_Form_Element_Select("pais_id", array("label" => "País:", "class" => "combo", "style" => "width: 155px"));
        $paises = new Pais();
        $dataPaises = $paises->getNomePaises();
        $pais->setMultiOptions($dataPaises);
        $this->addElement($pais);
        
        # Select Options Tipos
        $tipo = new Zend_Form_Element_Select("tipo_id", array("label" => "Tipo:", "class" => "combo", "style" => "width: 155px"));
        $tipos = new Tipo();
        $dataTipos = $tipos->getNomeTipos();
        $tipo->setMultiOptions($dataTipos);
        $this->addElement($tipo);
        
        # Campo Nome
        $nome = $this->createElement("text", "Nome", array("label" => "Nome:", "class" => "input-gg"))->setRequired(true);
        $this->addElement($nome);
        
        # Campo Descrição
        $descricao = $this->createElement("textarea", "Descricao", array("label" => "Descrição:", "class" => "jquery_ckeditor",
            "style" => "width: 500px; height: 200px"));
        $this->addElement($descricao);
        
        # Campo Preço
        $preco = $this->createElement("text", "Preco", array("label" => "Preço:", "class" => "input-p"))->setRequired(true);
        $this->addElement($preco);
        
        # Campo Peso
        $peso = $this->createElement("text", "Peso", array("label" => "Peso:", "class" => "input-p"))->setRequired(true);
        $this->addElement($peso);
        
        # Campo Peso Liquído
        $pesoLiq = $this->createElement("text", "PesoLiquido", array("label" => "Peso Liquído:", "class" => "input-p"))->setRequired(true);
        $this->addElement($pesoLiq);
        
        # Campo Estoque 
        $estoque = $this->createElement("text", "Estoque", array("label" => "Estoque:", "class" => "input-p"))->setRequired(true);
        $this->addElement($estoque);
        
        # Select Option Ativo
        $ativo = new Zend_Form_Element_Select("Ativo", array("label" => "Ativo:", "class" => "combo", "style" => "width: 155px"));
        $options = array("Não", "Sim");
        $ativo->setMultiOptions($options);
        $this->addElement($ativo);
        
        # Campo Imagem
        $image = new Zend_Form_Element_File('image');
        $image->setLabel('Imagem: ');
        $image->setDestination('images/produtos/')->setValueDisabled(true);
        $image->addValidator('Extension', false, 'jpg,png,gif');
        $image->addValidator('Size', false, '500kB');
        $image->addValidator('Count', false, 1);
        $this->addElement($image);
        
        # Botão Salvar
        $submit = $this->createElement('submit', 'submit', array('label' => 'Salvar', 'class' => 'input-p'));
        $this->addElement($submit);
        
    }
}

