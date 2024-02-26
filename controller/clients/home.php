<?php
    class Home{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }

        function getHome($page){
            $timkiem = isset($_GET['timkiem'])? $_GET['timkiem']:null;
            $limit = 8;
            $start = ($page - 1) * $limit;
            $count = $this->CountProduct();
            $sql = "SELECT MIN(c.duongdan) AS duongdan, a.tensp, a.giasp, a.idsp , z.slug_dmmenu
            FROM dmmenu z JOIN sanpham a ON z.id=a.idmmenu JOIN sp_dmhinh b ON a.idsp = b.id_sanpham 
            JOIN dmhinh c ON c.id=b.hinh_id 
            GROUP BY a.idsp, a.tensp, a.giasp LIMIT $start,$limit";
            if(!empty($timkiem)){
                $sql = "SELECT MIN(c.duongdan) AS duongdan, a.tensp, a.giasp, a.idsp , z.slug_dmmenu
                FROM dmmenu z JOIN sanpham a ON z.id=a.idmmenu JOIN sp_dmhinh b ON a.idsp = b.id_sanpham 
                JOIN dmhinh c ON c.id=b.hinh_id 
                WHERE a.tensp LIKE '%$timkiem%' GROUP BY a.idsp, a.tensp, a.giasp LIMIT $start,$limit";
            }
            $result = $this -> db->getObject($sql);
            include "./view/clients/home.php";
        }

        function CountProduct(){
            $sql = "SELECT MIN(c.duongdan) AS duongdan, a.tensp, a.giasp, a.idsp 
            FROM sanpham a JOIN sp_dmhinh b ON a.idsp = b.id_sanpham 
            JOIN dmhinh c ON c.id=b.hinh_id 
            GROUP BY a.idsp, a.tensp, a.giasp";
            $result = $this -> db->getObject($sql);
            if (is_array($result)){
                $count = count($result);
            }else{
                $count = 0;
            }
            return $count;
        }
        
        function getMenu(){
            $sql = "SELECT * FROM dmmenu";
            $list_menu = $this -> db->getObject($sql);
            return $list_menu;
        }
    }

?>