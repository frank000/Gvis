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
   /**
    *
    *  Monta o menu princial
    * 
    * @param array $itensMenu Array multi-dimensional com os itens pais e filhos 
    *               do menu
    * 
    * @return String 
    */
    public function montar(array $itensMenu = null){
       $acl = Zend_Registry::get('my_acl'); 
       $this->_acl =  $acl;
       $this->_auth = Zend_Auth::getInstance();
    
        $menu = "<div>Menu<br/>";
         $menu .= "<ul id='cssdropdown'>";
        foreach ($itensMenu as $label => $item) {
           
           //$this->autorizaUriPelaAcl($item['uri']);
            if($this->autorizaUriPelaAclAltoNível($item['uri'])) {
                    if($label != 'child'){
                  $menu .= "<li class='headlink'><a href='".$this->view->baseUrl().$item['uri']."'>".$label."</a>";
             }
             if(isset($item['child'])){
                 $menu .= "<ul>";
                 foreach ($item['child'] as $lbel => $value) {
                       // Zend_Debug::dump($value['uri']);
                    
                    if($this->autorizaUriPelaAcl($value['uri']) == true) {
                         $menu .= "<li class='children_menu' ><a href='".$this->view->baseUrl().$value['uri']."'>  ".$lbel."</a></li>";
                    } 
                       
                 }
                  $menu .= "</ul>";
             } 
            }// fim da verificação de alto nivel
       
            $menu.= "</li>";//final class headlink
                 
             
         
        }
         $menu .= "</ul ></div>";
        echo  $menu;
    }
    
     /**
     *
     * Autoriza o montagem dos itens Pais do menu principal
     * 
     * @param array $uri URI do item-pai no seguinto formato ex.: "/#controller"
     * 
     * @return boolean true caso autorizado, e falso caso contrário
     */
    public function autorizaUriPelaAclAltoNível($uri = null)
    {

         
        $identidade = $this->_auth->getIdentity();
        if($uri == "/") { // referente a o link 'Inicio'
           return true;
        }
        $arUri = explode('#', $uri);
     
        $resource = $arUri[1];
 
        $role = $identidade->role;
        if(empty($role)) {
            $role = 'guest';
        }

    if(!empty($resource)) {

        if($this->_acl->isAllowed($role, $resource) == true)
        {

            return true;
        }

        return false;
    }
            
    
    }
    
    /**
     *
     * Autoriza o montagem dos subitens do menu principal
     * 
     * @param array $uri URI do item ex.: "/controller/action"
     * 
     * @return boolean true caso autorizado, e falso caso contrário
     */
    private function autorizaUriPelaAcl($uri)
    {

        //$acl = Application_Model_MyAcl::getInstance();
        //$acl = Application_Model_MyAcl::getInstance();
        
        $identidade = $this->_auth->getIdentity();
        $arUri = explode('/', $uri);

        $resource = $arUri[1];
        $privilege = $arUri[2];
        $role = $identidade->role;
        if(empty($role)) {
            $role = 'guest';
        }
        

     //  Zend_Debug::dump($this->_acl, "ACL : ") ;
       // echo '('.$role.','. $resource.','. $privilege . "<br/>";
      

       if($this->_acl->isAllowed($role, $resource, $privilege) == true)
       {
           
          return true;
        }
        
        return false;
       
    }
}

?>
