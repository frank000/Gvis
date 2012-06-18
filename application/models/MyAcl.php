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
	class  Application_Model_MyAcl extends Zend_Acl {
                 
	    private $_noAuth;
	    private $_noAcl;
	    private $acl;
            
	    public function __construct() {
         
	        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/acl.ini');
                //Zend_Debug::dump($config, 'Config');
                // $config->
                //  $acl = $config->roles->toArray();
                $roles = $config->roles->toArray();
                $resources = $config->resources->toArray();
             //   Zend_Debug::dump($resources, 'roles');
	        $this->_addRoles($roles);
	       $this->_addResources($resources);
	    }
	                 
	    public function _addRoles($roles) {
               // var_dump($roles);
                 $parents = null;
                foreach ($roles as  $name => $parents) {
                    //  var_dump($parents);
                     //   var_dump($name);
	            if (!$this->hasRole($name)) {
	                if (empty($parents)) { //para mudar futuramente
	                    $parents = null;
	                }else{
	                    $parents = explode(',', $parents);
	                }
	                 //echo "Role > " . $name . " inherit >". $parents[0] . '<br/>'; 
	                $this->addRole(new Zend_Acl_Role($name), $parents[0]);
	             }
	         }
	    }
	                 
	    public function _addResources($resources) {
             //   var_dump($resources);
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
            
            public static function getInstance() {
                if($this->acl instanceof Application_Model_MyAcl) {
                    return $this->acl;
                } else {
                    $this->acl =  new Application_Model_MyAcl();
                    return $this->acl ;
                }
                    
            }
	}

?>
