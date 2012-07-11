<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteModel
 *
 * @author 03424754102
 */
class Default_Model_ClienteModel extends Default_Model_DbTable_ClienteTable{
    
    public function cadastrar($cliente) {
        
        
        try {
           $data['no_cli'] = $cliente['nome']; 
           $data['en_cli'] = $cliente['endereco']; 
           $data['te_cli'] = $cliente['telefone']; 
           $data['pe_cli'] = $cliente['pessoa'];
           if($data['pe_cli'] == 'j') { // jurídica
              $data['cnpj_cli'] = $cliente['cnpj'];  
           } else {                     //física
              $data['cpf_cli'] = $cliente['cnpj'];
           }
           $data['obs_cli'] = $cliente['obs']; 
          //  Zend_Debug::dump($tb,'model');
          $rs = $this->insert($data);
           return $rs;
        }  catch (Zend_Db_Exception $e) {
            $e->getTrace();
            $e->getMessage('Problema na classe ' . $this);
            return false;
        }
    }
    
    
    
    
    
}

?>
