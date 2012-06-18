<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyAcl
 *
 * @author 03424754102
 */
class Application_Model_MyAcl extends Zend_Acl {

    private $_noAuth;
    private $_noAcl;
    private $acl;

    public function __construct() {

        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/acl.ini'); //recupero o arquivo de configuração do acl
        $roles = $config->roles->toArray();
        $resources = $config->resources->toArray();

        $this->_addRoles($roles);
        $this->_addResources($resources);
    }
    
    /**
     *
     * Adiciona os roles ao zend ACl
     * 
     * @param array $roles 
     */
    public function _addRoles($roles) {

        $parents = null;
        foreach ($roles as $name => $parents) {

            if (!$this->hasRole($name)) {
                if (empty($parents)) { //para mudar futuramente
                    $parents = null;
                } else {
                    $parents = explode(',', $parents);
                }

                $this->addRole(new Zend_Acl_Role($name), $parents[0]);
            }
        }
    }
    /**
     *
     * Adiciona ao Zend Acl os resources listado no .ini.
     * 
     * @param array $resources 
     */
    public function _addResources($resources) {

        foreach ($resources as $permissions => $controllers) {
            foreach ($controllers as $controller => $actions) {
                if ($controller == 'all') {
                    $controller = null;
                } else {
                    if (!$this->has($controller)) {
                        $this->add(new Zend_Acl_Resource($controller));
                    }
                }

                foreach ($actions as $action => $role) {
                    if ($action == 'all') {
                        $action = null;
                    }
                    if ($permissions == 'allow') {
                        $this->allow($role, $controller, $action);
                    }
                    if ($permissions == 'deny') {
                        $this->deny($role, $controller, $action);
                    }
                }
            }
        }
    }
    
    /**
     *
     *  Implementação do padrão Singleton, retorna a instancia corrente 
     *  da classe.
     * 
     * @return Application Model MyACl 
     */
    public static function getInstance() {
        if ($this->acl instanceof Application_Model_MyAcl) {
            if (is_object($this->acl)) {
                return $this->acl;
            }
        } else {
            $this->acl = new Application_Model_MyAcl();
            return $this->acl;
        }
    }

}

?>
