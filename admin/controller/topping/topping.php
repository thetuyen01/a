<?php 
    class Topping{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }
        function createTopping($tentp, $giatp){
            $sql = "INSERT INTO topping (tentp, giatp)
            VALUES ('$tentp', '$giatp') ";
            $result = $this->db->insertData($sql);
            if($result){
                $msg = "Cập Nhật thành công ";
                setcookie('update_msg', $msg, time() + 2, '/');
            }
            $this->chuyentrang("index.php?action=topping&method=get");
        }


        function showTopping(){
            $sql = "SELECT * FROM topping";
            $result = $this->db->getAllData($sql);
            include_once 'view/topping/liststopping.php';
        }

        function edit($id, $tentp, $giatp) {
            if ($tentp && $id && $giatp) {
                $sql = "UPDATE topping
                        SET tentp = '$tentp', giatp = '$giatp'
                        WHERE idtopping = $id";
                $result = $this->db->updateData($sql);
                if($result){
                    $msg = "Cập Nhật thành công ";
                    setcookie('update_msg', $msg, time() + 2, '/');
                }
                $this->chuyentrang("index.php?action=topping&method=get");
            }
        }
        

        function showOneTopping($id){
            if($id){
                $sql = "SELECT * FROM topping WHERE idtopping = $id";
                $result = $this->db->getAllData($sql);
                include_once 'view/topping/edittopping.php';
            }
        }

        function delete($id){
            $sql = "DELETE FROM topping WHERE idtopping = $id";
            $result = $this->db->deleteData($sql);
            if($result){
                $msg = "Đã xóa dử liệu";
                setcookie('update_msg', $msg, time() + 2, '/'); 
                $this->chuyentrang("index.php?action=topping&method=get");
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