<?php 
    class History{
        public $db;
        function __construct()
        {
            include_once(__DIR__ . '../../../../model/history_product.php');
            $this -> db = new DB_History();
        }

        function showAllhistory(){
            $history = $this->db->getAllHoaDon();
            return include_once "view/clients/purchase_history.php";
        }

        function showDetalhistory(){
            if($_GET['idhistory']){
                $user_id = $_SESSION['iduser'];
                $idhistory = (int) $_GET['idhistory'];
                $sql = "SELECT a.tensp, c.ngaylaphd, b.images, b.topping_size, b.soluong, b.thanhtien 
                FROM sanpham a JOIN cthd b 
                ON a.idsp=b.idsp JOIN hoadon c 
                ON c.idhoadon=b.idhd 
                WHERE iduser = $user_id AND idhoadon= $idhistory";
                $cthd = $this->db->getCTHoaDon($sql);

                if ($cthd){
                    return include_once "view/clients/detailHistoryProduct.php";
                }
            }
        }
    }
?>