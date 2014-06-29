<?php

class Admin_Bootstrap extends Zend_Application_Module_Bootstrap {
    
    public function _initNavigation() {
        $view = Zend_Registry::get("view");
        
        $navConfig = new Zend_Config_Xml(APPLICATION_PATH . "/configs/adminNavigation.xml", "nav");
        $navContainer = new Zend_Navigation($navConfig);
        $view->navigation($navContainer);
    }
}

