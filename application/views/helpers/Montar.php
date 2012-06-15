<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Montar
 *
 * @author Franklim
 */
class Zend_View_Helper_Montar extends Zend_View_Helper_Abstract {
     
     
//    public function montar(array $itensMenu = null){
//      
//        $acl = new Zend_Acl();
//        $menu = "";
//        $menu .= "<li>";
//        foreach ($itensMenu as $label => $item) {
//             if($label != 'child'){
//                  $menu .= "<ul class='item_menu'>".$label."</ul>";
//             }
//           
//        }
//        $menu .= "</li>";
//        echo  $menu;
//    }
//}
         public function montar(){
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
             return "ok";
         }
}
?>
