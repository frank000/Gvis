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
class Default_Form_CadastroClienteForm extends Zend_Form
{

    public function init()
    {
        $validatorsName = array(new Zend_Validate_NotEmpty(),new Zend_Validate_Alpha());
        $validators = array(new Zend_Validate_NotEmpty(),new Zend_Validate_Alnum());
        $filters = array(new zend_filter);
        $multiOptions = array(
                "f" => "Pessoa Física",
                "j" => "Pessoa Jurídica"
        );
        
        $nome = new Zend_Form_Element_Text('nome',array('label'=>'Nome: '));
        $nome->isRequired();
        $nome->addValidator(new Zend_Validate_NotEmpty())->addValidator(new Zend_Validate_StringLength(array('min' => 5) ))
                ->addFilter(new Zend_Filter_StripTags());
        
        $endereco = new Zend_Form_Element_Text('endereco',array('label'=>'Endereço: '));
        $endereco->isRequired();
        $endereco->addValidator(new Zend_Validate_NotEmpty())->addValidator(new Zend_Validate_StringLength(array('min' => 5) ))
                ->addFilter(new Zend_Filter_StripTags());
        
        $telefone = new Zend_Form_Element_Text('telefone',array('label'=>'Telefone: '));
        $telefone->isRequired();
        $telefone->addValidators($validators)->addValidator(new Zend_Validate_StringLength(array('max' => 13) ))
                ->addFilter(new Zend_Filter_StripTags())
                ->addFilter(new Zend_Filter_Alnum(array('allowwhitespace' => true)));
        
        $pessoa = new Zend_Form_Element_Radio('pessoa');
        $pessoa->setMultiOptions($multiOptions);
        
        $cnpj = new Zend_Form_Element_Text('cnpj',array('label'=>'CPF / CNPJ: '));
        $cnpj->isRequired();
        $cnpj->addValidators($validators)
                ->addFilter(new Zend_Filter_StripTags())
                ->addFilter(new Zend_Filter_Alnum(array('allowwhitespace' => true)));
        
        $obs = new Zend_Form_Element_Textarea('obs',array('label'=>'Observações: '));
        $obs->addFilter(new Zend_Filter_StripTags());
        $obs->setOptions(array('rows' => 5, 'cows' => 20));
       
        $submit = new Zend_Form_Element_Submit('Cadastrar');
        $cancelar = new Zend_Form_Element_Button('Cancelar');
        $this->addElements(
            array(
                $nome,
                $endereco,
                $telefone,
                $pessoa,
                $cnpj,
                $obs,
                $submit,
                $cancelar
            )
        );
        $this->addDisplayGroup(array('nome','endereco','telefone',
                                     'pessoa','cnpj','obs'), 'cadastro',
                array('legend'=>'Cadastro de cliente'));
         $this->addDisplayGroup(array('Cadastrar','Cancelar'), 'btn',array('width'=>'250px'));
        // $this->getDisplayGroup('btn')->
       
//        
//        
//        $this->addElement($usuario);
//        $this->addDisplayGroup(array($usuario), 'login');
        
    }


}

