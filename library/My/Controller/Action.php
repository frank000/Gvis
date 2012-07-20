<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Action
 *
 * @author 03424754102
 */
class My_Controller_Action extends Zend_Controller_Action{
   
    const MSG_ERRO = "diverror";
    const MSG_SUCESS = 'success';
 //   const MSG_ERRO = "diverror";
   
    
    
    public function __construct(Zend_Controller_Request_Abstract $request, Zend_Controller_Response_Abstract $response, array $invokeArgs = array())
    {
        parent::__construct($request,$response,$invokeArgs);
     }
            

    public function valMsg()
    {
       $flash =  $this->_helper->_flashMessenger;
      return $flash;
    }
    public function addMessage($namespace,$message,$redirect = null)
    {
        
         $this->_helper->flashMessenger->addMessage(
                    array($namespace=>$message));
                   
         if($redirect){
             // $this->_forward($redirect['action'], $redirect['controller']);
              $this->_request->setActionName($redirect);
         }
    }
    
}

?>
