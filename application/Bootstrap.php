<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    

    protected function _initDb(){
       $config =  $this->getOption('resources');

       $db = Zend_Db::factory((string)$config['db']['adapter'],(array)$config['db']['params']);
       Zend_Db_Table::setDefaultAdapter($db);
       Zend_Registry::set('db', $db);

    }    
    protected function _initPlugins(){
       $ctrl = Zend_Controller_Front::getInstance();
       $ctrl->registerPlugin(new Application_Plugin_CheckLogin());
       $ctrl->registerPlugin(new Application_Plugin_CheckBrowser());
    }
    
    protected function _initTranlate(){
        //$trans =  new Zend_Translate();
        //Zend_Registry::set('trans', $translate);
        $locale = new Zend_Locale('pt_BR');
        Zend_Registry::set('Zend_Locale',$locale);
        
        
    }
    protected function _initSalt(){
        $salt = $this->getOption('pass');
        Zend_Registry::set('salt',$salt['salt']);   
    }
    protected function _initConfiguriesf(){
  //   $acl = new Application_Model_MyAcl;
   //$aclHelper = new Application_Model_AclHelper(null,array('acl'=>$acl));
//       // Zend_Debug::dump($aclHelper,"Helper : ");
//       Zend_Controller_Action_HelperBroker::addHelper($aclHelper);
    }
     
         





}

