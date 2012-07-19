<?php

class Default_IndexController extends My_Controller_Action
{

    public function init()
    {
        $arMenu = array(
            'Início'=>array('uri'=>'/'),
            'Vistorias'=>array('uri'=>'/vistorias',
                'child'=>array(
                    'Cadastrar'=>array('uri'=>'/vistorias/cadastrar/'),
                    'Consultar'=>array('uri'=>'/vistorias/consultar/'),
                    'Criar campos'=>array('uri'=>'/campos/criar/'),
                    'Consultar campos'=>array('uri'=>'/campos/consultar/'),
                    'Montar checklist'=>array('uri'=>'/checklist/montar')
                )));
        $this->view->menu = $arMenu;
    }

    public function indexAction()
    {
              
       // $this->addMessage(parent::MSG_SUCESS, 'Bem vindo Lulinha!');
    }


}

