<?php 
    class Payment_DB {        
        public $db;
        function __construct()
        {
            include_once "model/database.php";
            $this -> db = new Database();
            $this -> db ->connect();
        }

        // Phương thức thêm dử liệu user
        function insertHoaDon($iduser, $tongtien, $diachi) {
            $sql = "INSERT INTO hoadon (iduser, tongtien, diachi, ngaylaphd) VALUES ('$iduser', '$tongtien', '$diachi', NOW())";
            
            // Thực hiện câu lệnh INSERT
            $this->db->execute($sql);
        
            // Lấy ID của bản ghi vừa chèn
            $sqlSelect = "SELECT LAST_INSERT_ID() AS last_id";
            $result = $this->db->execute($sqlSelect);
            
            // Xử lý kết quả
            if ($result) {
                $row = $result->fetch_assoc();
                return $row['last_id'];
            } else {
                return null; // Hoặc xử lý lỗi theo ý muốn của bạn
            }
        }
        // Phương thức thêm dử liệu user
        function insertCTHoaDon($idhd, $idsp, $sl, $thanhtien, $images, $topping_size){
            $sql = "INSERT INTO cthd (idhd ,idsp, soluong, thanhtien, images, topping_size) VALUES ($idhd, $idsp, $sl, $thanhtien, '$images', '$topping_size')";
            return $this->db->execute($sql);
        }

        function getIdNowCreate(){
            $sql = "SELECT LAST_INSERT_ID()";
            return $this->db->execute($sql);
        }

    }
?>