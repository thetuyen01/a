<?php 
    class Collections{
        public $db;

        function __construct()
        {
            // include_once(__DIR__ . '../../../../model/database.php');
            // $this -> db = new Database();
            // $this -> db ->connect();
            include_once(__DIR__ . '../../../../model/collections.php');
            $this -> db = new collections_DB();
        }

        function getAllProduct($slug,$idmenu){
            $id_menu = $this ->db ->getIdData('dmmenu','slug_dmmenu',$slug);
            $dmmenu = $this->db->getWhereData('dmmenu','idmenu',$idmenu);
            if (is_array($id_menu)&& isset($id_menu[0])){
                $data_sp = $this->db->getWhereData("sanpham","idmmenu",$id_menu[0]["id"]);
                $arr_sp = [];
                if(is_array($data_sp)&& isset($data_sp[0])){
                    foreach ($data_sp as $x) {
                        $a = $this->db->getObject("SELECT a.id, a.ten, a.duongdan FROM dmhinh a JOIN sp_dmhinh b ON a.id=b.hinh_id WHERE id_sanpham=".((int)$x['idsp'])."");
                        if (is_array($a)) {
                            $arr_sp[] = array_merge($x, ['duongdan' => $a[0]['duongdan']]);
                        } else {
                            $arr_sp[] = array_merge($x, ['duongdan' => null]);
                        }
                    }
                }
                
                return  include_once "./view/clients/showCollections.php";
            }else{
                include_once './view/errorr.php';
            }
        }
    }
?>