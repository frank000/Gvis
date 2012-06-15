<?php

class Default_Form_Login extends Zend_Form
{

    public function init()
    {
        $validators = array(new Zend_Validate_NotEmpty(),new Zend_Validate_Alnum);
        $usuario = new Zend_Form_Element_Text('usuario',array('label'=>'Usuário: '));
        $usuario->isRequired();
        $usuario->addValidators($validators);
        $senha = new Zend_Form_Element_Password( 'senha',array('label'=>'Senha: ') );
        $senha->isRequired();
        $senha->addValidators($validators);
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

