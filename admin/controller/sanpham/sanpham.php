<?php 

    
    class Sanpham{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }
        function createSP($tensp, $giasp, $mtasp, $menu, $topping, $size, $anh){
            $sql = "INSERT INTO sanpham (tensp, giasp, mota, idmmenu)
            VALUES ('$tensp', $giasp, '$mtasp', $menu) ";
            $newlyInsertedId = $this->db->insertData($sql);
            foreach($topping as $item){
                $sql = "INSERT INTO sp_topping (id_sanpham, topping_id)
                VALUES ($newlyInsertedId, $item) ";
                $topping = $this->db->insertData($sql);
            }
            foreach($size as $item){
                $sql = "INSERT INTO sp_size (id_sanpham, size_id)
                VALUES ($newlyInsertedId, $item) ";
                $size = $this->db->insertData($sql);
            }
            foreach($anh as $item){
                $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/project/public/media/upload_img/';
                $targetFilePath = $uploadDirectory . $item['name'];
                move_uploaded_file($item['tmp'], $targetFilePath);
                $Iddmh = $this->insertDmhinh($tensp,$item['name']);
                $sql = "INSERT INTO sp_dmhinh (id_sanpham, hinh_id)
                VALUES ($newlyInsertedId, $Iddmh) ";
                $dmhinh = $this->db->insertData($sql);
            }
            if($newlyInsertedId){
                $msg = "Đã tạo dử liệu";
                setcookie('update_msg', $msg, time() + 2, '/'); 
            }
            $this->chuyentrang("index.php?action=sanpham&method=get");
        }

        function showFormAdd(){
            $sql_dmmenu = "SELECT * FROM dmmenu";
            $result_dmmenu = $this->db->getAllData($sql_dmmenu);
            $sql_hinh = "SELECT * FROM dmhinh";
            $result_hinh = $this->db->getAllData($sql_hinh);
            $sql_topping = "SELECT * FROM topping";
            $result_topping = $this->db->getAllData($sql_topping);
            $sql_size = "SELECT * FROM size_";
            $result_size = $this->db->getAllData($sql_size);

            include_once "view/sanpham/add_products.php";
        }


        function showSanpham(){
            $sql = "SELECT * FROM sanpham ";
            $result = $this->db->getAllData($sql);
            
            if(is_array($result)){
                $arr_sp = [];
                foreach($result as $item){
                    $arr = [];
                    $idsp = (int)$item['idsp'];
                    $arr['sanpham'] = array_merge($item);
                    $dmmenu = $this->db->getAllData("SELECT a.ten_dmmenu from dmmenu a JOIN sanpham b ON a.id= b.idmmenu WHERE idsp = $idsp");
                    $arr['dmmenu'] = is_array($dmmenu) ? $dmmenu : null;

                    $dmhinh = $this->db->getAllData("SELECT a.id, a.ten, a.duongdan FROM dmhinh a JOIN sp_dmhinh b ON a.id=b.hinh_id WHERE id_sanpham=$idsp;");
                    $arr['dmhinh'] = is_array($dmhinh) ? $dmhinh : null;

                    $topping = $this->db->getAllData("SELECT a.idtopping , a.tentp, a.giatp FROM topping a JOIN sp_topping b ON a.idtopping=b.topping_id WHERE id_sanpham=$idsp");
                    $arr['topping'] = is_array($topping) ? $topping : null;

                    $size = $this->db->getAllData("SELECT a.idsize, a.tensize, a.giasize FROM size_ a JOIN sp_size b ON a.idsize=b.size_id WHERE id_sanpham=$idsp;");
                    $arr['size'] = is_array($size) ? $size : null;
                    $arr_sp[] = $arr;
                    
                }
                include_once 'view/sanpham/list_products.php';
                
            }
            
        }

        function showFormEdit($id){      
            $sanpham = $this->db->getAllData("SELECT * from sanpham WHERE idsp = $id");
            $arr['sanpham'] = is_array($sanpham) ? $sanpham : null;
            // list tất cả danh sách
            $sql_dmmenu = "SELECT * FROM dmmenu";
            $result_dmmenu = $this->db->getAllData($sql_dmmenu);
            $sql_hinh = "SELECT * FROM dmhinh";
            $result_hinh = $this->db->getAllData($sql_hinh);
            $sql_topping = "SELECT * FROM topping";
            $result_topping = $this->db->getAllData($sql_topping);
            $sql_size = "SELECT * FROM size_";
            $result_size = $this->db->getAllData($sql_size);
            include_once "view/sanpham/edit_products.php";
        }

        function edit_SP($tensp, $giasp, $mtasp, $menu, $topping, $size, $anh, $idsp){
            $sql = "UPDATE sanpham
            SET tensp = '$tensp', giasp = $giasp, mota = '$mtasp', idmmenu = $menu
            WHERE idsp = $idsp";
            $newlyInsertedId = $this->db->updateData($sql);
            foreach($topping as $item){
                $sql = "INSERT INTO sp_topping (id_sanpham, topping_id)
                VALUES ($idsp, $item) ";
                $topping = $this->db->insertData($sql);
            }
            foreach($size as $item){
                $sql = "INSERT INTO sp_size (id_sanpham, size_id)
                VALUES ($idsp, $item) ";
                $size = $this->db->insertData($sql);
            }
            foreach($anh as $item){
                $sql = "INSERT INTO sp_dmhinh (id_sanpham, hinh_id)
                VALUES ($idsp, $item) ";
                $dmhinh = $this->db->insertData($sql);
            }
            if($newlyInsertedId){
                $msg = "Đã tạo dử liệu";
                setcookie('update_msg', $msg, time() + 2, '/'); 
            }
            $this->chuyentrang("index.php?action=sanpham&method=get");
        }


        function delete($id){
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/project/public/media/upload_img/";
            $images = $this->db->getAllData("SELECT b.id,b.duongdan FROM sp_dmhinh a JOIN dmhinh b ON a.hinh_id=b.id WHERE id_sanpham = $id");
            foreach($images as $item){
                $file_to_delete = $target_dir . basename($item['duongdan']);
                if (file_exists($file_to_delete)) {
                    // Sử dụng hàm unlink để xóa tệp
                    if (unlink($file_to_delete)) {
                        $idimage=$item['id'];
                        $sql = "DELETE FROM dmhinh WHERE id = '$idimage'";
                        $result = $this->db->deleteData($sql);
                        if($result){
                            $msg = "Đã xóa dử liệu";
                            setcookie('update_msg', $msg, time() + 2, '/'); 
                        }
                    } else {
                        echo 'Không thể xóa tệp.';
                    }
                } else {
                    echo 'Tệp không tồn tại.';
                }
            }
            $sql = "DELETE FROM sanpham WHERE idsp = $id";
                        $result = $this->db->deleteData($sql);
            $this->chuyentrang("index.php?action=sanpham&method=get");
            
        }
    
        function chuyentrang($url){
            header("Location: $url");
            exit();
            return 0;
        }
        function insertDmhinh($ten, $duongdan) {
            $sql = "INSERT INTO dmhinh (ten, duongdan) VALUES ('$ten', '$duongdan')";
            
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
    }
?>