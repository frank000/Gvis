<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    

    protected function _initDb(){
       $config =  $this->getOption('resources');

       $db = Zend_Db::factory((string)$config['db']['adapter'],(array)$config['db']['params']);
       Zend_Db_Table::setDefaultAdapter($db);
       Zend_Registry::set('db', $db);

    }    




}

