<?php 
    class Header{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }

        function getAllMenu(){
            $table = "menu";
            $data = $this -> db ->getAllData($table);
            $arr = [];
            foreach ($data as $x) {
                $a = $this->getAllDMMenu("dmmenu", "idmenu", $x['idmenu']);
                if (is_array($a)) {
                    $arr[] = array_merge($x, ['dmmenu' => $a]);
                } else {
                    $arr[] = array_merge($x, ['dmmenu' => null]);
                }
            }
            include "./view/header.php";
        }   
        function getAllDMMenu($tenTable, $truong, $id){
            $data = $this -> db -> getWhereData($tenTable, $truong, $id);
            return $data;
        }
        
    }
?>