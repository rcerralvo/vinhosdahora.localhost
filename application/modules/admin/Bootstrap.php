<?php

class Admin_Bootstrap extends Zend_Application_Module_Bootstrap {
    
    private $_acl = null;
    
    public function _initAdminAcl() {
        
        if (Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session("admin"))->hasIdentity())
        {
            Zend_Registry::set("role", Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session("admin"))->getStorage()->read()->role);
        }
        else
        {
            Zend_Registry::set("role", "visitante");
        }
        $this->_acl = new AdminAcl();
        
        Zend_Registry::set("AdminAcl", $this->_acl);
        
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new VH_Plugins_CheckAcl($this->_acl));
    }

    public function _initNavigation() {
        $view = Zend_Registry::get("view");
        
        $navConfig = new Zend_Config_Xml(APPLICATION_PATH . "/configs/adminNavigation.xml", "nav");
        $navContainer = new Zend_Navigation($navConfig);
        $view->navigation($navContainer)->setAcl($this->_acl)->setRole(Zend_Registry::get("role"));
    }
}

