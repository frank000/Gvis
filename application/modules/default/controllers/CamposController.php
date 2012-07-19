<?php

class Default_CamposController extends My_Controller_Action
{

    public function init()
    {
        //$this->_helper->layout->setLayout('layout_1');
    }

    public function indexAction()
    {      
       $this->_forward('list');
       
    }
    public function listAction()
    {  
   
    }
    public function criarAction()
    {  
                    
        $form = new Default_Form_CadastroCampoForm();
        if($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if($form->isValid($formData)) {
          $camposModel = new My_Model_CamposModel();
   
           //     $data['obs_cam'] = $formData['obs'];
                $result = $camposModel->cadastrar($formData);
                if($result > 0) {
                    $this->addMessage(parent::MSG_SUCESS, 'Campo cadastrado com sucesso',
                            array('action'=>'list'));
                }
            }
        }
        
        
        
        $this->view->form = $form;
    }


}

