<?php

class Site_RetornoMoipController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();

            $pedido = new Pedido();
            $pedido->setId($data['id_transacao']);
            $pedido->setStatus_pagamento($data['status_pagamento']);
            $pedido->setCod_moip($data['cod_moip']);
            $pedido->setTipo_pagamento($data['tipo_pagamento']);
            $pedido->save();
            
            // pagamento autorizado ou concluido
            if ($pedido->getStatus_pagamento() == 1 || $pedido->getStatus_pagamento() == 4) {
                header("HTTP/1.1 200 OK");
            }
        }

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }

}
