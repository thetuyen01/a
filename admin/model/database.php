<?php 
    class Database {
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "thecoffeehouses";

        public $conn=null;
        public $result=null;

        function connect(){
            $this-> conn = new mysqli($this ->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if (!$this->conn) {
                echo "Kết nối thất bại !";
                exit();
            }else{
                mysqli_set_charset($this->conn, 'utf8');
            }
            // connection result
            return $this->conn;
        }

        //thực thi câu lệnh truy vấn
        function execute($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        // Phương thức lấy dử liệu
        function getData(){
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }else{
                $data = 0;
            }
            return $data;
        }   

        // Phương thức lấy toàn bộ dử liệu
        function getAllData($sql){
            $this->execute($sql);
            if($this->num_row()==0){
                $data = 0;
            }else{
                    while($datas=$this->getData()){
                        $data[] = $datas;
                    }
            }
            return $data;
        }

        //phương thức đêm bản ghi
        function num_row(){
            if ($this->result){
                $num = mysqli_num_rows($this->result);
            }else{
                $num = 0;
            }
            return $num;
        }

        // function insertData($sql){
        //     return $this->execute($sql);
        // }
        function insertData($sql){
            $this->execute($sql);
            // Lấy ID của bản ghi vừa được thêm vào
            $newlyInsertedId = mysqli_insert_id($this->conn);
            return $newlyInsertedId;
        }
        // Phương thức sửa dử liệu

        function updateData($sql){
            return $this->execute($sql);
        }

        // Phương thức xóa
        function deleteData($sql){
            return $this->execute($sql);
        }


    }
?>