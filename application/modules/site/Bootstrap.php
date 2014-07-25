<?php

class Site_Bootstrap extends Zend_Application_Module_Bootstrap {

    protected function _initSessions() {
        
    }

    protected function _initPlugins() {
        $bootstrap = $this->getApplication();
        if ($bootstrap instanceof Zend_Application)
            $bootstrap = $this;

        $bootstrap->bootstrap('FrontController');
        $front = $bootstrap->getResource("FrontController");
        
        $front->registerPlugin(new VH_Plugins_Tipos());
        $front->registerPlugin(new VH_Plugins_Paises());
        $front->registerPlugin(new VH_Plugins_Welcome());
    }

}
