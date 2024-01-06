<?php 
    class Login_DB {        
        public $db;
        function __construct()
        {
            include_once "model/database.php";
            $this -> db = new Database();
            $this -> db ->connect();
        }

        // Phương thức thêm dử liệu user
        function insertDataUser($email, $sodt, $tenuser, $password, $dc){
            $sql = "INSERT INTO user_ (email, sodt, tenuser, password_ , dc) VALUES ('$email', '$sodt', '$tenuser', '$password', '$dc')";
            return $this->db->execute($sql);
        }
        // Phương thức checklogin
        function getDataLogin($email, $password){
            $sql = "SELECT *
            FROM user_
            WHERE email = '$email' AND password_ = '$password';
            ";
            $this->db->execute($sql);
            if($this->db->num_row()==0){
                $data = 0;
            }else{
                while($datas=$this->db->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }
        // Phương thức sửa dử liệu

        function updateData($id, $hoten, $namsinh, $quequam){
            $sql = "UPDATE  sinhvien SET hoten = '$hoten', namsinh = '$namsinh', quequan = '$quequam' WHERE id = '$id'";
            return $this->db->execute($sql);
        }

    }
?>