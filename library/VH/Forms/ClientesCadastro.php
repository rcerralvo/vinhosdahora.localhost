<?php

class VH_Forms_ClientesCadastro extends Zend_Form {

    public function init() {
        $this->setMethod('POST');
        
        // campo Nome
        $nome = $this->createElement('text', 'Nome', array('label' => 'Nome:', 'class' => 'input-g'))->setRequired(true);
        $this->addElement($nome);
        
        // campo cpf
        $cpf = $this->createElement('text', 'Cpf', array('label' => 'CPF:', 'class' => 'input-m'))->setRequired(true);
        $this->addElement($cpf);
        
        // campo rg
        $rg = $this->createElement('text', 'Rg', array('label' => 'RG:', 'class' => 'input-m'))->setRequired(true);
        $this->addElement($rg);
        
        // campo email
        $email = $this->createElement('text', 'Email', array('label' => 'Email:', 'class' => 'input-g'))->setRequired(true);
        $this->addElement($email);

        // campo telefone
        $telefone = $this->createElement('text', 'Telefone', array('label' => 'Telefone:', 'class' => 'input-m'))->setRequired(true);
        $this->addElement($telefone);
        
        // campo celular
        $celular = $this->createElement('text', 'Celular', array('label' => 'Celular:', 'class' => 'input-m'))->setRequired(true);
        $this->addElement($celular);
        
        // campo endereco
        $endereco = $this->createElement('text', 'Endereco', array('label' => 'Endereço:', 'class' => 'input-g'))->setRequired(true);
        $this->addElement($endereco);
        
        // campo numero
        $numero = $this->createElement('text', 'Numero', array('label' => 'Número:', 'class' => 'input-p'))->setRequired(true);
        $this->addElement($numero);
        
        // campo complemento
        $complemento = $this->createElement('text', 'Complemento', array('label' => 'Complemento:', 'class' => 'input-g'));
        $this->addElement($complemento);
        
        // campo bairro
        $bairro = $this->createElement('text', 'Bairro', array('label' => 'Bairro:', 'class' => 'input-m'))->setRequired(true);
        $this->addElement($bairro);
        
        // campo cidade
        $cidade = $this->createElement('text', 'Cidade', array('label' => 'Cidade:', 'class' => 'input-g'))->setRequired(true);
        $this->addElement($cidade);
        
        
        //Estados
        $estado = $this->createElement('select', 'Estado', array('label' => 'Estado', 'class' => 'combo', 'style' => 'width: 150px;height: 25px;margin-top: 5px;'))->setRequired(true);
        $arEstados = array('AC' => 'Acre', 'AL' => 'Alagoas', 'AP' => 'Amapá', 'AM' => 'Amazônas', 'BA' => 'Bahia', 'CE' => 'Ceará', 'DF' => 'Distrito Federal', 'ES' => 'Espírito Santo', 'GO' => 'Goiás', 'MA' => 'Maranhão', 'MT' => 'Mato Grosso', 'MS' => 'Mato Grosso do Sul', 'MG' => 'Minas Gerais', 'PA' => 'Pará', 'PB' => 'Paraíba', 'PR' => 'Paraná', 'PE' => 'Pernambuco', 'PI' => 'Piauí', 'RJ' => 'Rio de Janeiro', 'RN' => 'Rio Grande do Norte', 'RS' => 'Rio Grande do Sul', 'RO' => 'Rondônia', 'RR' => 'Roraima', 'SC' => 'Santa Catarina', 'SP' => 'São Paulo', 'SE' => 'Sergipe', 'TO' => 'Tocantins');
        $estado->addMultiOptions($arEstados);
        $this->addElement($estado);
        
        // campo cep
        $cep = $this->createElement('text', 'Cep', array('label' => 'CEP:', 'class' => 'input-m'))->setRequired(true);
        $this->addElement($cep);
        
        // campo login
        $login = $this->createElement('text', 'Login', array('label' => 'Login:', 'class' => 'input-g'))->setRequired(true);
        $this->addElement($login);
        
        // campo senha
        $senha = $this->createElement('password', 'senha', array('label' => 'Senha:', 'class' => 'input-g'))->setRequired(true);
        $this->addElement($senha);

        // campo caracteres
        $fc = Zend_Controller_Front::getInstance();
        $captcha = new Zend_Form_Element_Captcha(
                        'captcha', 
                        array('label' => 'Caracteres',
                            'captcha' => array(
                                'captcha' => 'Image',
                                'wordLen' => 4,
                                'timeout' => 300,
                                'width' => 153,
                                'font' => 'images/captcha/font/verdana.ttf',
                                'imgDir' => 'images/captcha/',
                                'imgUrl' => $fc->getBaseUrl() . '/images/captcha/'
                        )));
        $this->addElement($captcha);

        // botão salvar
        $submit = $this->createElement('submit', 'submit', array('label' => 'Salvar', 'class' => 'input-p'));
        $this->addElement($submit);
    }
}