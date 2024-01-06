<?php 
    class DB_History {        
        public $db;
        function __construct()
        {
            include_once "model/database.php";
            $this -> db = new Database();
            $this -> db ->connect();
        }

        
        function getAllHoaDon(){
            $sql = "SELECT *
            FROM hoadon ";
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

        function getCTHoaDon($sql){
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

    }
?>