<?php 

    
    class Invoice{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }
        
        function show_all_invoice(){
            $sql = "SELECT a.idhoadon,a.ngaylaphd,a.tinhtrang,a.diachi,a.tongtien, b.tenuser FROM hoadon a JOIN user_ b ON a.iduser= b.iduser";
            $result = $this->db->getAllData($sql);
            $tinhtrang = [1=>"Đang sử lý", 2=>"Đang vận chuyển", 3 =>"Đang trên đường duy chuyển", 4=>"Đã giao thành công"];
            include_once 'view/invoice/list_invoice.php';
        }

        function edit($id, $data){
            if($data && $id){
            
                $sql = "UPDATE hoadon
                SET tinhtrang = $data
                WHERE idhoadon = $id";
                $result = $this->db->updateData($sql);
                if($result){
                    $msg = "Cập Nhật thành công ";
                    setcookie('update_msg', $msg, time() + 2, '/'); 
                }
                $this->chuyentrang("index.php?action=invoice&method=get");
            };
        }

        function showOnemenu($id){
            if($id){
                $sql = "SELECT * FROM menu WHERE idmenu = $id";
                $result = $this->db->getAllData($sql);
                include_once 'view/menu/editmenu.php';
            }
        }

        function delete($id){
            $sql = "DELETE FROM menu WHERE idmenu = '$id'";
            $result = $this->db->deleteData($sql);
            if($result){
                $msg = "Đã xóa dử liệu";
                setcookie('update_msg', $msg, time() + 2, '/'); 
            }
            $this->chuyentrang("index.php?action=menu&method=get");
        }

        function searchMenu($data){
            echo $data;
        }
        function create_slug($a) {
            // Chuyển thành chữ thường
            $a = trim(mb_strtolower($a, 'UTF-8'));
        
            // Bỏ dấu và thay thế khoảng trắng bằng dấu gạch ngang
            $a = preg_replace('/[\s]+/u', '-', $a);
            $a = preg_replace('/[^a-z0-9-]/u', '', $a);
        
            return $a;
        }
        
        
        
        
        function chuyentrang($url){
            header("Location: $url");
            exit();
            return 0;
        }
    }
?>