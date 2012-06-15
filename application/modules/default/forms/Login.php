<?php

class Default_Form_Login extends Zend_Form
{

    public function init()
    {
        $usuario = new Zend_Form_Element_Text('usuario',array('label'=>'Usuário: '));
        $senha = new Zend_Form_Element_Password( 'senha',array('label'=>'Senha: ') );
        $submit = new Zend_Form_Element_Submit('Enviar');
        $this->addElements(
            array(
                $usuario,
                $senha,
                $submit
            )
        );
        $this->addDisplayGroup(array('usuario','senha'), 'login',
                array('legend'=>'Acesso ao sistema','width'=>'250px'));
         $this->addDisplayGroup(array('Enviar'), 'send',array('width'=>'250px'));

//        
//        
//        $this->addElement($usuario);
//        $this->addDisplayGroup(array($usuario), 'login');
        
    }


}

