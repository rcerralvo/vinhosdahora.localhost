<?php

class VH_Plugins_Paises extends Zend_Controller_Plugin_Abstract {

    public function dispatchLoopStartup(\Zend_Controller_Request_Abstract $request) {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getExistingHelper('viewRenderer');
        $viewRenderer->initView();
        $view = $viewRenderer->view;

        $pais = new Pais();
        $paises = $pais->fetchAll();

        $content = "<ul>";
        foreach ($paises as $p)
            $content .= "<li><a href='" . $view->url(array('controller' => 'produtos', 'action' => 'list-paises', 'module' => 'site', 'pais_id' => $p->getId(), 'pais' => $p->getNome()), false, 1) . "'><span>" . $view->escape($p->getNome()) . "</span></a></li>";

        $content .= "</ul>";

        $view->placeholder('paises')->append($content);
    }
}
