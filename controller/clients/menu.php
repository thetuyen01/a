<?php
    class Menu{
        public $db;

        function __construct()
        {
            include_once(__DIR__ . '../../../model/database.php');
            $this -> db = new Database();
            $this -> db ->connect();
        }

        function getMenu(){
            $sql = "SELECT * FROM dmmenu ";
            $result = $this->db->getObject($sql);
        }
    }

?>