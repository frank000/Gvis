<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Montar
 *
 * @author 03424754102
 */
class Zend_View_Helper_Montar extends Zend_View_Helper_Abstract{
    
    public function montar(array $itensMenu = null){
      
        $acl = new Zend_Acl();
        $menu = "<div>Menu<br/>";
         $menu .= "<ul id='cssdropdown'>";
        foreach ($itensMenu as $label => $item) {
           
          
             if($label != 'child'){
                  $menu .= "<li class='headlink'><a href='".$this->view->baseUrl().$item['uri']."'>".$label."</a>";
             }
             if(isset($item['child'])){
                 $menu .= "<ul>";
                 foreach ($item['child'] as $lbel => $value) {
 
                        $menu .= "<li class='children_menu' ><a href='".$this->view->baseUrl().$value['uri']."'>  ".$lbel."</a></li>";
                 }
                  $menu .= "</ul>";
             }
            $menu.= "</li>";//final class headlink
                 
             
         
        }
         $menu .= "</ul ></div>";
        echo  $menu;
    }
}

?>
