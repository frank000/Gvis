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
     
         





}

