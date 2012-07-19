<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CadastroClienteForm
 *
 * @author 03424754102
 */
class Default_Form_CadastroCampoForm extends Zend_Form
{

    public function init()
    {
//        $validatorsName = array(new Zend_Validate_NotEmpty(),new Zend_Validate_Alpha());
//        $validators = array(new Zend_Validate_NotEmpty(),new Zend_Validate_Alnum());
//        $filters = array(new zend_filter);
        $multiOptions = array(
                 'text' => "Campo de Texto",
                 'checkbox' => "Campos CheckBox ( Estilo Checklist )"
        );
        
        $nome = new Zend_Form_Element_Text('nome',array('label'=>'Nome: '));
        $nome->isRequired();
        $nome->addValidator(new Zend_Validate_NotEmpty())->addValidator(new Zend_Validate_StringLength(array('min' => 3) ))
                ->addFilter(new Zend_Filter_StripTags());
//        
        $tipo = new Zend_Form_Element_Radio('tipo',array('label'=>'Tipo: '));
        $tipo->setMultiOptions($multiOptions);
                
//        
        $obs = new Zend_Form_Element_Textarea('obs',array('label'=>'Observações: '));
        $obs->addFilter(new Zend_Filter_StripTags());
        $obs->setOptions(array('rows' => 5, 'cows' => 20));
       
        $submit = new Zend_Form_Element_Submit('Cadastrar');
        $submit->class = "btn";
        $cancelar = new Zend_Form_Element_Button('Cancelar');
        $cancelar->class = "btn";
        $this->addElements(
            array(
                $nome,
                $tipo,
                $obs,
                $submit,
                $cancelar
            )
        );
        $this->addDisplayGroup(array('nome','tipo','obs'), 'cadastro',
                array('legend'=>'Cadastro de campos'));
         $this->addDisplayGroup(array('Cadastrar','Cancelar'), 'btn',array('width'=>'250px'));
        // $this->getDisplayGroup('btn')->
       
//        
//        
//        $this->addElement($usuario);
//        $this->addDisplayGroup(array($usuario), 'login');
        
    }


}

