<?php    
    class Sesssion {
        public function setSession($key, $data) {
            session_start();
            $_SESSION[$key] = $data;
        }

        public function getSession($key) {
            session_start();
            return $_SESSION[$key];
        }

        public function destroy($key) {
            session_start();
            unset($_SESSION[$key]);
        }
    }