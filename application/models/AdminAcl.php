<?php

class AdminAcl extends Zend_Acl
{
    public function __construct() {
        // Papés = Role = Grupos*
        $this->addRole(new Zend_Acl_Role("visitante"));
        $this->addRole(new Zend_Acl_Role("usuario"), "visitante");
        $this->addRole(new Zend_Acl_Role("auxiliar"), "usuario");
        $this->addRole(new Zend_Acl_Role("administrador"));
        
       // Recursos
       $this->addResource(new Zend_Acl_Resource("admin:auth"));
       $this->addResource(new Zend_Acl_Resource("admin:tipos"));
       $this->addResource(new Zend_Acl_Resource("admin:paises"));
       $this->addResource(new Zend_Acl_Resource("admin:produtos"));
       $this->addResource(new Zend_Acl_Resource("admin:index"));
        
       // Previlégios
       
       # Visitante
       $this->allow("visitante", "admin:auth", "index");
       
       # Usuario
       $this->allow("usuario", "admin:auth", "logout");
       $this->deny("usuario", "admin:auth", "index");
       $this->allow("auxiliar", "admin:index");
       
       # Auxiliar
       $this->allow("auxiliar", "admin:tipos", array("index", "add", "edit", "delete"));
       $this->allow("auxiliar", "admin:paises", array("index", "add", "edit", "delete"));
       $this->allow("auxiliar", "admin:produtos", array("index", "add", "edit", "delete"));
       
       # Administrador
       $this->allow("administrador");
       $this->deny("administrador", "admin:auth", "index");
    }
}

