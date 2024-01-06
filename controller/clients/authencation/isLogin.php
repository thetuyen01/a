<?php 
    class isLogin{
        public $db;

        function __construct()
        {
            // include_once(__DIR__ . '../../../../model/database.php');
            // $this -> db = new Database();
            // $this -> db ->connect();
            include_once(__DIR__ . '../../../../model/login.php');
            $this -> db = new Login_DB();
        }
        function showIsLogin(){
            $flag = false;
            
            $token = isset($_COOKIE['auth_token']) ? $_COOKIE['auth_token'] : null;
            // Giải mã và xác thực token
            if($token !== null){
                include_once 'jwt_encode/jwt_encode.php';
                
                $decodedPayload = verifyJwtToken($token, 'tuyendeptrai');
                if ($decodedPayload) {
                    $reslut = $this ->db->getDataLogin($decodedPayload[0]['email'], $decodedPayload[0]['password_']);
                    if (is_array($reslut) && isset($reslut)){
                        $flag = true;
                    }else{
                        $flag = false;
                    }
                } else {
                    $flag = false;
                }
            }else{
                $flag = false;
            }
            return $flag;
        }
    }
?>