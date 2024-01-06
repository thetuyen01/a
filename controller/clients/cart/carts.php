<?php 
    class Carts{
        function showCart(){
            include_once './view/clients/carts.php';
        }
        function addCart(){
            if(isset($_POST['addcart']) && ($_POST['addcart'])){
                $idsp = $_POST['idsanpham'];
                $demidsp = 0;
                // Kiểm tra xem $_SESSION['carts'] có phải là mảng không
                if (isset($_SESSION['carts']) && is_array($_SESSION['carts'])) {
                    foreach ($_SESSION['carts'] as $level1) {
                        if ($level1['sanpham']['idsp']==$idsp){
                            $demidsp++;
                        }
                    }
                }
                if ($demidsp > 0){
                    include_once './view/clients/carts.php';
                }else{
                    $dmhinh = $_POST['mang'];
                    $arr_hinh = json_decode($dmhinh, true);
                    $topping = isset($_POST['topping']) ? $_POST['topping']:null;
                    $size = isset($_POST['size']) ? $_POST['size']:null;
                    $idhinh = isset($_POST['hinh']) ? $_POST['hinh']:null;
                    $arr_hinh['topping'] = $this->giuPhanTu($arr_hinh['topping'], (int)$topping);
                    $arr_hinh['size'] = $this->giuPhanTu($arr_hinh['size'], (int)$size);
                    $arr_hinh['dmhinh'] = $this->giuPhanTu($arr_hinh['dmhinh'], (int)$idhinh);
                    $arr_hinh['quantity'] = 1;
                    $_SESSION['carts'][]=$arr_hinh;
                }
                
            }
            // $_SESSION['carts']=[];
            // session_unset();
            include_once './view/clients/carts.php';
        }
        function giuPhanTu($mang, $giaTriCanGiu) {
            $newArray = array();
          foreach ($mang as $key => $value) {
              if ($key == $giaTriCanGiu) {
                  $newArray[0] = $value;
              }
          }
          return $newArray;
        }

        function delete($id) {
            unset($_SESSION['carts'][$id]);
            $this->chuyentrang();
        }
        function chuyentrang(){
            return header("Location: index.php?action=carts");
        }
    }
?>