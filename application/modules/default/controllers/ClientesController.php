<?php

class Default_ClientesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function cadastrarAction()
    {
        $cadastroForm = new Default_Form_CadastroClienteForm();
        $this->view->form = $cadastroForm;
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









