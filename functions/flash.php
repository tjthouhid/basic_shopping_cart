<?php 
//session_start();
class FlashMessage {

    public static function render($var) {
        if (!isset($_SESSION[$var])) {
            return null;
        }
        $messages = $_SESSION[$var];
        unset($_SESSION[$var]);
        return $messages;
    }

    public static function add($var,$val) {
         $_SESSION[$var]= $val;
    }

}
?>