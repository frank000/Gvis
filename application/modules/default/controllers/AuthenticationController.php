<?php

class Default_AuthenticationController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->layout->setLayout('layout_1');
    }

    public function indexAction()
    {
       
       
       $formLogin = new Default_Form_Login();
      
       
       $this->view->form1 = $formLogin;
       
       
    }


}

