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
    
    private $_acl;
    private $_auth;
    
    public function montar(array $itensMenu = null){
        $this->_acl = new Zend_Acl();
        $this->_auth = Zend_Auth::getInstance();
    
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
    
    protected function autorizaUriPelaAcl($uri)
    {
        
        $identidade = $this->_auth->getIdentity();
        $arUri = explode('/', $uri);
        if($this->_acl->allow($identidade->role, $arUri[1], $arUri[2]))
        {
            return true;
        }
        return false;
    }
}

?>
