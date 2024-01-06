<?php 
    class Size{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }

        function getListSize(){
            $sql = "SELECT * FROM size_ ";
            $result = $this->db->getAllData($sql);
            include_once "view/size/listSize.php";
        }

        function createSize($tensize, $giasize){
            $sql = "INSERT INTO size_ (tensize, giasize)
            VALUES ('$tensize', $giasize) ";
            $result = $this->db->insertData($sql);
            if($result){
                $msg = "Tạo thành công !";
                setcookie('update_msg', $msg, time() + 2, '/');
            }
            $this->chuyentrang("index.php?action=size&method=get");
        }

        function showOneSize($id){
            if($id){
                $sql = "SELECT * FROM size_ WHERE idsize = $id";
                $result = $this->db->getAllData($sql);
                include_once 'view/size/editSize.php';
            }
        }

        function edit($id, $tensize, $giasize) {
            if ($tensize && $id && $giasize) {
                $sql = "UPDATE size_
                        SET tensize = '$tensize', giasize = $giasize
                        WHERE idsize = $id";
                $result = $this->db->updateData($sql);
                if($result){
                    $msg = "Cập Nhật thành công ";
                    setcookie('update_msg', $msg, time() + 2, '/');
                }
                $this->chuyentrang("index.php?action=size&method=get");
            }
        }
        function delete($id){
            $sql = "DELETE FROM size_ WHERE idsize = $id";
            $result = $this->db->deleteData($sql);
            if($result){
                $msg = "Đã xóa dử liệu";
                setcookie('update_msg', $msg, time() + 2, '/'); 
                $this->chuyentrang("index.php?action=size&method=get");
            }else{
                echo "tuyen";
            }
        }
        
        function chuyentrang($url){
            header("Location: $url");
            exit();
            return 0;
        }
    }
?>