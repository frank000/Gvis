<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of checkLogin
 *
 * @author 03424754102
 */
class Application_Plugin_CheckLogin extends Zend_Controller_Plugin_Abstract{
   
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        
        $auth = Zend_Auth::getInstance();
        if(! $auth->hasIdentity()){
            $request->setControllerName('authentication');
            $this->setRequest($request);
        }

        
       parent::preDispatch($request);
    }
}

?>
