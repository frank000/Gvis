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
                    
               //      if($this->autorizaUriPelaAcl($value['uri']) == true) {
                         $menu .= "<li class='children_menu' ><a href='".$this->view->baseUrl().$value['uri']."'>  ".$lbel."</a></li>";
                  //   } 
                       
                 }
                  $menu .= "</ul>";
             } 
            }// fim da verificação de alto nivel
       
            $menu.= "</li>";//final class headlink
                 
             
         
        }
         $menu .= "</ul ></div>";
        echo  $menu;
    }
    
    public function autorizaUriPelaAclAltoNível($uri = null)
    {
         //  return true;
     //  $acl =  Application_Model_MyAcl::getInstance();
       //Zend_Debug::dump($acl);
         return true;
        $identidade = $this->_auth->getIdentity();
        $arUri = explode('#', $uri);

        $resource = $arUri[1];
        //$privilege = $arUri[2];
        $role = $identidade->role;
        if(empty($role)) {
            $role = 'guest';
        }
        //echo $role.','. $resource . '<br/>';
//        if($acl->isAllowed($role, $resource) == true)
//        {
//           
//           return true;
//        }
//         
//        return false;
    }
//    private function autorizaUriPelaAcl($uri)
//    {
//
//        $acl = Application_Model_MyAcl::getInstance();
// 
//        
//        $identidade = $this->_auth->getIdentity();
//        $arUri = explode('/', $uri);
//
//        $resource = $arUri[1];
//        $privilege = $arUri[2];
//        $role = $identidade->role;
//        if(empty($role)) {
//            $role = 'guest';
//        }
//        
//
//// 
////        if($acl->isAllowed($role, $resource, $privilege) == true)
////        {
////           
//            return true;
////        }
//         
//     //   return false;
//       
//    }
}

?>
