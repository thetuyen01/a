<?php 
    class detailCategory_DB {        
        public $db;
        function __construct()
        {
            include_once "model/database.php";
            $this -> db = new Database();
            $this -> db ->connect();
        }
        // Phương thức lấy toàn bộ dử liệu
        function getAllData($tenTable){
            $sql = "SELECT * FROM $tenTable";
            $this-> db->execute($sql);
            if($this-> db->num_row()==0){
                $data = 0;
            }else{
                    while($datas=$this-> db->getData()){
                        $data[] = $datas;
                    }
            }
            return $data;
        }

        //Phương thứ lấy ra bản ghi có điều kiện  where cụ thể là lấy tất cả dử liệu và tham số truyền vào là id
        function getWhereData($tenTable, $truong, $id){
            $sql = "SELECT * FROM $tenTable WHERE $truong = $id ";
            $this-> db->execute($sql);
            if($this-> db->num_row()==0){
                $data = 0;
            }else{
                while($datas=$this-> db->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }

         // Phương thức lấy ra chi tiết sản phẩm
         function getObject($sql){
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
        function close(){
            $this->db->conn->close();
        }

    }
?>