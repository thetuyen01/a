<?php 
    class DB_ForgetPW {        
        public $db;
        function __construct()
        {
            include_once "model/database.php";
            $this -> db = new Database();
            $this -> db ->connect();
        }

        
        // Phương thức checklogin
        function getEmail($email){
            $sql = "SELECT iduser
            FROM user_
            WHERE email = '$email';
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

        function resetpw($id, $password){
            $sql = "UPDATE  user_ SET password_ = '$password' WHERE iduser = '$id'";
            return $this->db->execute($sql);
        }

    }
?>