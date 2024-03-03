<?php 
    class Carts{
        function showCart(){
            include_once './view/clients/carts.php';
        }
        function addCart(){
            if(isset($_POST['addcart']) && ($_POST['addcart'])){
                $idsp = $_POST['idsanpham'];
                $demidsp = 0;
                $dmhinh = $_POST['mang'];
                $arr_hinh = json_decode($dmhinh, true);
                $topping = isset($_POST['topping']) ? $_POST['topping']:null;
                $size = isset($_POST['size']) ? $_POST['size']:null;
                $idhinh = isset($_POST['hinh']) ? $_POST['hinh']:null;
                $arr_hinh['topping'] = $this->giuPhanTu($arr_hinh['topping'], (int)$topping);
                $arr_hinh['size'] = $this->giuPhanTu($arr_hinh['size'], (int)$size);
                $arr_hinh['dmhinh'] = $this->giuPhanTu($arr_hinh['dmhinh'], (int)$idhinh);
                $arr_hinh['quantity'] = 1;
                
                // Kiểm tra xem $_SESSION['carts'] có phải là mảng không
                $number_product = [];
                if (isset($_SESSION['carts']) && is_array($_SESSION['carts'])) {
                    foreach ($_SESSION['carts'] as $index=>$level1) {
                        if ($level1['sanpham']['idsp']==$idsp){
                            $demidsp++;
                            array_push($number_product, $index);
                        }
                    }
                }
                if ($demidsp > 0){
                    
                    $id_product = null;
                    $topping_def=false;
                    $size_def = false;
                    foreach($number_product as $item){
                        $topping=false;
                        $size = false;
                        if($_SESSION['carts'][$item]['dmhinh'][0]['duongdan'] ==$arr_hinh['dmhinh'][0]['duongdan']){
                            $_SESSION['carts'][$item]['dmhinh'][0]['duongdan']=$arr_hinh['dmhinh'][0]['duongdan'];
                        }
    
                        if(isset($_SESSION['carts'][$item]['topping'][0]) && $_SESSION['carts'][$item]['topping'][0]['tentp'] ==$arr_hinh['topping'][0]['tentp']){
                            $_SESSION['carts'][$item]['topping'][0]['tentp']=$arr_hinh['topping'][0]['tentp'];
                            $topping = true;
                        }
                        if(isset($_SESSION['carts'][$item]['size'][0]) && $_SESSION['carts'][$item]['size'][0]['tensize'] ==$arr_hinh['size'][0]['tensize']){
                            $_SESSION['carts'][$item]['size'][0]['tensize']=$arr_hinh['size'][0]['tensize'];
                            $size = true;
                        }
                        if($topping && $size){
                            $id_product=$item;
                            $topping_def= true;
                            $size_def=true;
                        }
                    }  
                    if($topping_def && $size_def){
                        $_SESSION['carts'][$id_product]['quantity'] +=1;
                    }else{
                        $_SESSION['carts'][]=$arr_hinh; 
                    }
                    
                    include_once './view/clients/carts.php';
                }else{
                    $_SESSION['carts'][]=$arr_hinh;
                }
                
            }
            // $_SESSION['carts']=[];
            // session_unset();
            include_once './view/clients/carts.php';
        }
        function giuPhanTu($mang, $giaTriCanGiu) {
            $newArray = array();
            if (!is_null($mang) && (is_array($mang) || is_object($mang))) {
                foreach ($mang as $key => $value) {
                    if ($key == $giaTriCanGiu) {
                        $newArray[0] = $value;
                    }
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