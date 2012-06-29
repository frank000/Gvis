<?php

class Default_ClientesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_helper->FlashMessenger()
                ->setNamespace('success')
                ->addMessage('Bem vindo!');
 $this->_helper->FlashMessenger()
                ->setNamespace('error')
                ->addMessage('Bem vindo!');
        /* error message */
       // $this->_helper->FlashMessenger()->setNamespace('error')->addMessage('You have no permissions');

    }

    public function cadastrarAction()
    {
//        $this->_helper->FlashMessenger()
//                ->setNamespace('success')
//                ->addMessage('Bem vindo!');
         $this->_helper->FlashMessenger()
                ->setNamespace('error')
                ->addMessage('Bem vindo!');
        
         
        $cadastroForm = new Default_Form_CadastroClienteForm();
        $cadastroForm->getElement('Cancelar')->setAttrib('class', 'btn');
        $cadastroForm->getElement('Cadastrar')->setAttrib('class', 'btn');
        $this->view->form = $cadastroForm;
        if($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if($cadastroForm->isValid($formData)) {
                $clienteModel = new Default_Model_ClienteModel();
              
                $rs = $clienteModel->cadastrar($formData);
                if($rs != false) {
                    //retorna sucesso
                }
            }
        }
    }

    public function consultarAction()
    {
        // action body
    }

    public function detalhesAction()
    {
        // action body
    }


}









