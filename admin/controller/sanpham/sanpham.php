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
                $sql = "INSERT INTO sp_dmhinh (id_sanpham, hinh_id)
                VALUES ($newlyInsertedId, $item) ";
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
                    include_once 'view/sanpham/list_products.php';
                }
                
                
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
            $images = $this->db->getAllData("SELECT a.duongdan FROM dmhinh a where id = $id");
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/project/public/media/upload_img/";
            $file_to_delete = $target_dir . basename($images[0]['duongdan']);
            if (file_exists($file_to_delete)) {
                // Sử dụng hàm unlink để xóa tệp
                if (unlink($file_to_delete)) {
                    $sql = "DELETE FROM dmhinh WHERE id = '$id'";
                    $result = $this->db->deleteData($sql);
                    if($result){
                        $msg = "Đã xóa dử liệu";
                        setcookie('update_msg', $msg, time() + 2, '/'); 
                    }
                    $this->chuyentrang("index.php?action=dmhinh&method=get");
                } else {
                    echo 'Không thể xóa tệp.';
                }
            } else {
                echo 'Tệp không tồn tại.';
            }
            
        }
    
        function chuyentrang($url){
            header("Location: $url");
            exit();
            return 0;
        }
    }
?>