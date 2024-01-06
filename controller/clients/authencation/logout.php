<?php 
    class Logout{
        function logout(){
            unset($_SESSION['auth_token']);
            setcookie("auth_token", "", time() - 3600, "/");
            $this->chuyentrang();
        }
        function chuyentrang(){
            return header("Location: index.php");
        }
    }
?>