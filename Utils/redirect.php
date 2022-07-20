<?php    
    class Redirect {
        public function redirectTo($page) {
            header("Location: http://localhost/admin{$page}");
        }
    }