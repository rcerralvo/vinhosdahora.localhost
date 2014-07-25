<?php

class VH_Plugins_Tipos extends Zend_Controller_Plugin_Abstract 
{
    public function dispatchLoopStartup(\Zend_Controller_Request_Abstract $request) {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getExistingHelper('viewRenderer');
        $viewRenderer->initView();
        $view = $viewRenderer->view;
        
        $tipo = new Tipo();
        $tipos = $tipo->fetchAll();
        
        $content = "<ul>";
        foreach ($tipos as $t)
            $content .= "<li><a href='" . $view->url(array('controller' => 'produtos', 'action' => 'list-tipos', 'module' => 'site', 'tipo_id' => $t->getId(), 'tipo' => $t->getNome()), false, 1) . "'><span>". $view->escape($t->getNome()). "</span></a></li>";
        
        $content .= "</ul>";
        
        $view->placeholder('tipos')->append($content);
    }
}

