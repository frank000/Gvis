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
                    echo "Sucesso";
                }
            }
        }
    }

    public function consultarAction()
    {
        $modelCLiente = new Default_Model_ClienteModel();
        $rs =  $modelCLiente->fetchAll()->toArray();
        foreach ($rs as $key => $value)
        {
            $objeto->$key = $value;
        }
       // Zend_Debug::dump($configs);
        $configs = new Zend_Config_Ini(APPLICATION_PATH.'/configs/grids/grid.ini');
      //  Zend_Debug::dump($configs);

        $grid = Bvb_Grid::factory('Table',$config);
        $header = array('ID',
           'Nome','Endereço','Telefone',
            'Pessoa',
            'PessoaJ','cpf','Observação');
        $grid->addOptions(array('caption'=>'Titulo'));
        
//        for($i = 0 ; $i < 3 ; $i++){
//            $right = new Bvb_Grid_Extra_Column();
//            $right->position('right')->name('unique_name')->title('Right')->decorator("<a title=''>{{ID}}</a>"."<a title=''>Link {{ID}}</a>");
//
//
//            $grid->addExtraColumns($right);
// 
//        }

        $action = array( "<a title=''>{{ID}}</a>");
        $grid->setAction($action);
  
        $grid->setSource(new Bvb_Grid_Source_Array($rs,$header));
//        $form = new Bvb_Grid_Form();
//        $form->setAdd(true)->setEdit(true)->setDelete(true);
//        $grid->setForm($form);
 //       $grid->updateColumn('id_cli',array('title'=>'ID'));
        $fa= $grid->getSource();
        $grid->setRecordsPerPage(2);
        $grid->setColumnsHidden(array('ID','Pessoa','PessoaJ'));
     //  Zend_Debug::dump($fa);
        $this->view->grid = $grid->deploy();
        
         $this->view->oDados = $objeto;
    }

    public function detalhesAction()
    {
        // action body
    }


}









