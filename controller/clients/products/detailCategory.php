<?php 
    class detailCategory{
        public $db;
        function __construct()
        {
            // include_once(__DIR__ . '../../../../model/database.php');
            // $this -> db = new Database();
            // $this -> db ->connect();
            include_once(__DIR__ . '../../../../model/detailCategory.php');
            $this -> db = new detailCategory_DB();
        }
        function showDetailCategory(){
            if ($_GET['idsp'] != null) {
                $data_spone = $this->db->getWhereData('sanpham', 'idsp', $_GET['idsp']);
                $id_sp = (int)$data_spone[0]['idsp'];
                if (isset($data_spone[0]) && is_array($data_spone)) {
                    $arr = [];
            
                    $dmhinh = $this->db->getObject("SELECT a.id, a.ten, a.duongdan FROM dmhinh a JOIN sp_dmhinh b ON a.id=b.hinh_id WHERE id_sanpham=$id_sp;");
                    $arr['sanpham'] = array_merge($data_spone[0]);
                    $arr['dmhinh'] = is_array($dmhinh) ? $dmhinh : null;
            
                    $topping = $this->db->getObject("SELECT a.idtopping , a.tentp, a.giatp FROM topping a JOIN sp_topping b ON a.idtopping=b.topping_id WHERE id_sanpham=$id_sp");
                    $arr['topping'] = is_array($topping) ? $topping : null;
            
                    $size = $this->db->getObject("SELECT a.idsize, a.tensize, a.giasize FROM size_ a JOIN sp_size b ON a.idsize=b.size_id WHERE id_sanpham=$id_sp;");
                    $arr['size'] = is_array($size) ? $size : null;
            
                    include_once './view/clients/detailCategory.php';
                } else {
                    include_once './view/errorr.php';
                }
            }
            
    
        }
    }
?>