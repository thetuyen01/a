<?php 

    
    class Dmmenu{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }
        function createDmmenu($tendmmenu, $idmenu, $file_image){
            $slug = $this->create_slug($tendmmenu);
            $sql = "INSERT INTO dmmenu (ten_dmmenu, slug_dmmenu,idmenu, images)
            VALUES ('$tendmmenu', '$slug', $idmenu, '$file_image') ";
            $result = $this->db->insertData($sql);
            if($result){
                $msg = "Đã tạo dử liệu";
                setcookie('update_msg', $msg, time() + 2, '/'); 
            }
            $this->chuyentrang("index.php?action=dmmenu&method=get");
        }

        function show_add_dmmenu(){
            $sql = "SELECT * FROM  menu ";
            $result = $this->db->getAllData($sql);
            include_once 'view/dmmenu/add_dmmenu.php';
        }

        function showDmmenu(){
            $sql = "SELECT a.id,a.ten_dmmenu,a.slug_dmmenu,b.tenmenu, a.images FROM dmmenu a JOIN menu b ON  a.idmenu = b.idmenu ";
            $result = $this->db->getAllData($sql);
            include_once 'view/dmmenu/listdmmenu.php';
        }

        function edit($id, $data, $id_menu, $file_image){
            if($data && $id){
                $slug = $this->create_slug($data);
                $images = $this->db->getAllData("SELECT a.images FROM dmmenu a where id = $id");
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/project/public/media/upload_img/";
                $file_to_delete = $target_dir . basename($images[0]['images']);
                if (file_exists($file_to_delete)) {
                    // Xóa file
                    if (unlink($file_to_delete)) {
                        if ($_FILES["image"]["error"] == 0) {
                            // Di chuyển file từ thư mục tạm sang thư mục lưu trữ
                            $target_file = $target_dir . basename($file_image['name']);
                            if (move_uploaded_file($file_image["tmp_name"], $target_file)) {
                                // Gọi hàm để tạo dữ liệu
                                $image = $file_image['name'];
                                echo $image;
                                $sql = "UPDATE dmmenu
                                SET ten_dmmenu = '$data', slug_dmmenu = '$slug', idmenu = $id_menu, images='$image'
                                WHERE id = $id";
                                $result = $this->db->updateData($sql);
                                if($result){
                                    $msg = "Cập Nhật thành công ";
                                    setcookie('update_msg', $msg, time() + 2, '/'); 
                                }
                                $this->chuyentrang("index.php?action=dmmenu&method=get");
                            } else {
                                echo "Không thể di chuyển file.";
                            }
                        } else {
                            echo "Lỗi khi upload file.";
                        }
                    } else {
                        echo "Không thể xóa file.";
                    }
                } else {
                    echo "File không tồn tại.";
                }
                
            };
        }

        function showOne_dmmenu($id){
            if($id){
                $sql = "SELECT * FROM dmmenu WHERE id = $id";
                $result_dmmenu = $this->db->getAllData($sql);
                //lay ra danh sách menu để update
                $sql_menu = "SELECT * FROM  menu ";
                $result_menu = $this->db->getAllData($sql_menu);
                include_once 'view/dmmenu/editdmmenu.php';
            }
        }

        function delete($id){
            $images = $this->db->getAllData("SELECT a.images FROM dmmenu a where id = $id");
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/project/public/media/upload_img/";
            $file_to_delete = $target_dir . basename($images[0]['images']);
            if (file_exists($file_to_delete)) {
                // Sử dụng hàm unlink để xóa tệp
                if (unlink($file_to_delete)) {
                    $sql = "DELETE FROM dmmenu WHERE id = '$id'";
                    $result = $this->db->deleteData($sql);
                    if($result){
                        $msg = "Đã xóa dử liệu";
                        setcookie('update_msg', $msg, time() + 2, '/'); 
                    }
                    $this->chuyentrang("index.php?action=dmmenu&method=get");
                } else {
                    echo 'Không thể xóa tệp.';
                }
            } else {
                echo 'Tệp không tồn tại.';
            }
            
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