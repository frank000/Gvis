<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CamposModel
 *
 * @author 03424754102
 */
class My_Model_CamposModel extends My_Model_DbTable_CamposTable{
    const CAMPO_TEXT = "text";
    const CAMPO_CHECKBOX = "checkbox";
    
    public function cadastrar($campo) {
        
        
        try {
           $data['label_cam'] = $campo['nome'];
           $data['type_cam'] = $campo['tipo'];

        //   $data['obs_cli'] = $cliente['obs']; 
          //  Zend_Debug::dump($tb,'model');
          $rs = $this->insert($data);
           return $rs;
        }  catch (Zend_Db_Exception $e) {
            $e->getTrace();
            $e->getMessage();
            return false;
        }
    }
    
}

?>
