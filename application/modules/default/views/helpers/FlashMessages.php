<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlashMessages
 *
 * @author 03424754102
 */
class Zend_View_Helper_FlashMessages extends Zend_View_Helper_Abstract
{
    public function flashMessages()
    {
        $messages = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger')->getCurrentMessages();

        $output = '';    
        if (!empty($messages) && is_array($messages)) {
            $output .= "<ul id='messages'>    <div id='flashSucess' class='ui-state-highlight ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>
        
                <p>
                <span  style='float: left; margin-right: .3em;'></span> ";
            foreach ($messages as $message) {
                $output .= '<li class="' . key($message) . '">' . current($message) . '</li>';
            }
            $output .= '               </p>
        
            </div></ul>';
        }
       
        return $output;
    }
}

?>
