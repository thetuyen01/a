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
        function getAllData($tenTable){
            $sql = "SELECT * FROM $tenTable";
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

        //Phương thứ lấy ra bản ghi có điều kiện  where cụ thể là lấy tất cả dử liệu và tham số truyền vào là id
        function getWhereData($tenTable, $truong, $id){
            $sql = "SELECT * FROM $tenTable WHERE $truong = $id ";
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

        


        // Phương thức lấy ra chi tiết sản phẩm
        function getObject($sql){
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
        function close(){
            $this->conn->close();
        }
    }
?>