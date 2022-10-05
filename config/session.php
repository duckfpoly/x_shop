<?php
class Session {
    public static function init(){
        session_start();
    }
    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }
    public static function get($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }
    public static function checkSession(){
        self::init();
        if (self::get("user_login") == false) {
            self::destroy();
            header("Location: ./");
        }
    }
    public static function destroy(){
        session_destroy();
        echo ' <script language="javascript"> location.href = "?"; </script>';
    }
    public static function unset($key){
        session_unset($key);
        echo ' <script language="javascript"> location.href = "?"; </script>';
    }
}
