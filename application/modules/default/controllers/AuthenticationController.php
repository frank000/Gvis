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
       $formLogin->setAction($this->view->baseUrl() . '/authentication/index');
       
       $formLogin->getElement('Enviar')->setAttrib('class', 'btn');
       if($this->_request->isPost()){//aceita
           $dataForm = $this->_request->getPost();
           if($formLogin->isValid($dataForm)){
               //----params
               $salt = Zend_Registry::get('salt');
               $senha = $this->_request->getParam('senha');
               $senha = md5($senha.$salt);
               $usuario = $this->_request->getParam('usuario');
               //----adpter e o auth
               $db  = Zend_Registry::get('db');
               $auth = Zend_Auth::getInstance();
               $authAdpter = new Zend_Auth_Adapter_DbTable($db);
               $authAdpter->setTableName('tb_usu')
                         ->setIdentityColumn('no_usu')
                         ->setCredentialColumn('se_usu')
                         ->setIdentity($usuario)
                         ->setCredential($senha);
               $result = $auth->authenticate($authAdpter);
               if($result->isValid())
               {
                  // $acl = new Application_Model_MyAcl();
                   $auth->getStorage()->write($authAdpter->getResultRowObject());
                   $this->_redirect('/');

                  // Zend_Debug::dump($acl, 'Acl : ');
                  
               }else{
                  
               }
               
              
               
               
               
               
               
           }else{
             //Zend_Debug::dump($formLogin->getMessages(), 'Erros: ');
           }
       }
       
       $this->view->form1 = $formLogin;
       
       
       
       
    }
    public function logoutAction()
    {  
       $auth = Zend_Auth::getInstance();
       $auth->clearIdentity();
        $this->_redirect('/');
    }
    


}

