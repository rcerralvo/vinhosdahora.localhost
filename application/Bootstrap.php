<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initViews() {
        $this->bootstrap('view');
        $view = $this->getResource("view");
        
        $view->doctype("HTML5");
        Zend_Registry::set('view', $view);
        
        $currency = new Zend_Currency("pt_BR");
        $currency->setFormat(array('symbol' => "R$ "));
        Zend_Registry::set("currency", $currency);
        
        $view->headTitle()->setSeparator(" - ")->headTitle("Vinhos Da Hora");
        $view->headMeta()->appendHttpEquiv("Content-type", "text/html;charset=utf-8");
    }
    
    protected function _initAutoLoader() {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->setFallbackAutoloader(true); // pega tudo
    }
    
    protected function _initPlugins() {
        $bootstrap = $this->getApplication();
        if ($bootstrap instanceof Zend_Application)
            $bootstrap = $this;
        
        $bootstrap->bootstrap('FrontController');
        $front = $bootstrap->getResource("FrontController");
        
        $front->registerPlugin(new VH_Plugins_Layout());
    }


}

