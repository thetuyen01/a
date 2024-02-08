<?php 
    class Payment{
        public $db;
        function __construct()
        {
            include_once(__DIR__ . '../../../../model/payment.php');
            $this -> db = new Payment_DB();
        }

        function setHoaDon(){
            if (isset($_POST['thanhtoan'])){
                if (isset($_POST['diachi']) && $_POST['diachi']){
                    $qutity = 0;
                    $total = 0;
                    foreach ($_SESSION['carts'] as $index=>$item) {
                        $qutity+=(int)$item['quantity'];
                        $total+=((float)$item['sanpham']['giasp'] + (!empty($item['topping'])? (float)$item['topping'][0]['giatp']:0) +(!empty($item['size'])? (float)$item['size'][0]['giasize']:0))*(int)$item['quantity'];
                    }
                    $id_hoadon = $this->db->insertHoaDon($_SESSION['iduser'], $total, $_POST['diachi']);
                    if ($id_hoadon){
                        foreach ($_SESSION['carts'] as $item) {
                            $topping_size = $item['topping'][0]['tentp']." & ".$item['size'][0]['tensize'];
                            $this->db->insertCTHoaDon((int)$id_hoadon, (int)$item['sanpham']['idsp'], (int)$item['quantity'], (float)(((float)$item['sanpham']['giasp'] + (!empty($item['topping'])? (float)$item['topping'][0]['giatp']:0) +(!empty($item['size'])? (float)$item['size'][0]['giasize']:0))*(int)$item['quantity']), $item['dmhinh'][0]['duongdan'],$topping_size);
                        }
                    }
                    $_SESSION['carts'] = [];
                    return $this->chuyentrang();
                }else{
                    return include_once 'view/clients/checkout.php';
                }
            }
        }
        function chuyentrang(){
            return header("Location: index.php");
        }
    }
?>