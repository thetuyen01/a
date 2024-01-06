<?php 

    
    class Menus{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }
        function createMenu($data){
            $slug = $this->create_slug($data);
            $sql = "INSERT INTO menu (tenmenu, slug_menu)
            VALUES ('$data', '$slug') ";
            $result = $this->db->insertData($sql);
            if($result){
                $msg = "Đã tạo dử liệu";
                setcookie('update_msg', $msg, time() + 2, '/'); 
            }
            $this->chuyentrang("index.php?action=menu&method=get");
        }


        function showMenu(){
            $sql = "SELECT * FROM menu ";
            $result = $this->db->getAllData($sql);
            include_once 'view/menu/listmenu.php';
        }

        function edit($id, $data){
            if($data && $id){
                echo $data;
                $slug = $this->create_slug($data);
                echo $slug;
                $sql = "UPDATE menu
                SET tenmenu = '$data', slug_menu = '$slug'
                WHERE idmenu = $id";
                $result = $this->db->updateData($sql);
                if($result){
                    $msg = "Cập Nhật thành công ";
                    setcookie('update_msg', $msg, time() + 2, '/'); 
                }
                $this->chuyentrang("index.php?action=dmmenu&method=get");
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