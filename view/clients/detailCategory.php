<div class="container">
    <div class="row">
        <form action="<?php echo "index.php?action=addcarts"?>" method="post" class="row">
            <div class="col-12 col-sm-12 col-md-6 container pt-5">
                <?php 
                        $dmhinh_content = '';
                        $dmhinh_nav = '';
                        $dem = 0;
                        foreach($dmhinh as $item){
                            if ($dem==0){
                                $dmhinh_content.='
                            <div class="tab-pane fade show active" id="ex1-tabs-'.$item['id'].'" role="tabpanel" aria-labelledby="ex1-tab-'.$item['id'].'">
                                <img src="http://localhost/project/public/media/upload_img/'.$item['duongdan'].'"
                                    height="480px" width="480px" alt="">
                            </div>
                            ';
                            $dmhinh_nav.='
                            <li class="nav-item shadow-2 me-4 mb-2 border listItem" role="presentation" >
                                <a data-mdb-tab-init class="nav-link active" id="ex1-tab-'.$item['id'].'" href="#ex1-tabs-'.$item['id'].'" role="tab"
                                    aria-controls="ex1-tabs-'.$item['id'].'" aria-selected="true">
                                    <img src="http://localhost/project/public/media/upload_img/'.$item['duongdan'].'"
                                        height="100px" width="100px" alt="">
                                </a>
                                <div class="d-flex align-items-center justify-content-center">
                                    <input   type="radio" name="hinh" class="radioInput" style="display: none;" value="'.$dem.'">
                                </div>
                            </li>
                            ';
                            
                            }else{
                                $dmhinh_content.='
                            <div class="tab-pane fade show" id="ex1-tabs-'.$item['id'].'" role="tabpanel" aria-labelledby="ex1-tab-'.$item['id'].'">
                                <img src="http://localhost/project/public/media/upload_img/'.$item['duongdan'].'"
                                    height="480px" width="480px" alt="">
                            </div>
                            ';
                            $dmhinh_nav.='
                            <li class="nav-item shadow-2 me-4 mb-2 border listItem" role="presentation">
                                <a data-mdb-tab-init class="nav-link" id="ex1-tab-'.$item['id'].'" href="#ex1-tabs-'.$item['id'].'" role="tab"
                                    aria-controls="ex1-tabs-'.$item['id'].'" aria-selected="false">
                                    <img src="http://localhost/project/public/media/upload_img/'.$item['duongdan'].'"
                                        height="100px" width="100px" alt="">
                                </a>
                                <div class="d-flex align-items-center justify-content-center">
                                    <input   type="radio" name="hinh" class="radioInput" style="display: none;" value="'.$dem.'">
                                </div>
                            </li>
                            ';
                            }
                            $dem++;
                            
                        }
                    ?>
                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <?php 
                            echo $dmhinh_content;
                        ?>
                </div>

                <!-- Tabs content -->
                <!-- Tabs navs -->
                <ul class="nav nav-tabs mb-3 mt-3" id="ex1" role="tablist">
                    <?php echo $dmhinh_nav?>
                </ul>
                <!-- Tabs navs -->
            </div>
            <div class="col-12 col-sm-12 col-md-6 ps-5 pt-5">
                <?php 
                        if($data_spone){
                            echo '
                            <h3>'.$data_spone[0]['tensp'].'</h3>
                            <h5>'.$data_spone[0]['giasp'].' đ</h5>
                            ';
                        }
                    ?>

                <div class="mt-2">
                    <?php 
                        if(!empty($size)){
                            echo '<p>Chọn size (bắc buộc)</p>
                                    <div class="group" role="group" aria-label="Basic example">';
                                    $demsize = 0;
                            foreach($size as $item){
                                if ($demsize==0){
                                    echo '<div class="mb-2"><input type="radio" id="size" checked name="size" value="'.$demsize.'" class=" me-2 mb-2" data-mdb-ripple-init> '.$item['tensize'].' + '.$item['giasize'].'
                                    đ </div>';
                                    
                                }else{
                                    echo '<div class="mb-2"><input type="radio" id="size"  name="size" value="'.$demsize.'" class=" me-2 mb-2" data-mdb-ripple-init> '.$item['tensize'].' + '.$item['giasize'].'
                                    đ </div>';
                                }
                                $demsize++;
                            }
                        }
                    ?>
                </div>

            </div>
            <div class="mt-3">
                <?php 
                    
                    if(!empty($topping)){
                        echo '<p>Topping</p>
                                <div class="group" role="group" aria-label="Basic example">';
                        $demtopping = 0;
                        foreach($topping as $item){
                            if($demtopping == 0){
                                echo '<div class="mb-2"><input id="topping" checked name="topping" type="radio" value="'.$demtopping.'" class=" me-2 mb-2" data-mdb-ripple-init> '.$item['tentp'].' + '.$item['giatp'].'
                                đ </div>';
                            }else{
                                echo '<div class="mb-2"><input id="topping" name="topping" type="radio" value="'.$demtopping.'" class=" me-2 mb-2" data-mdb-ripple-init> '.$item['tentp'].' + '.$item['giatp'].'
                            đ </div>';
                                
                            }
                            $demtopping++;
                        }
                    }
                ?>
            </div>
            <div class="mt-4">
                <input type="hidden" name="dmhinh" value='<?php echo json_encode($dmhinh); ?>'>
                <input type="hidden" name="sanpham" value="<?php echo $data_spone[0]['tensp'];?>">
                <input type="hidden" name="idsanpham" value="<?php echo $data_spone[0]['idsp'];?>">
                <input type="hidden" name="giasp" value="<?php echo $data_spone[0]['giasp'];?>">
                <input type="hidden" name="mang" value='<?php echo json_encode($arr); ?>'>
                <input type="submit" name="addcart" class="btn btn-warning" value="Thêm vào giỏ hàng"
                    data-mdb-ripple-init />
            </div>

    </div>
    </form>
</div>
</div>
<hr>
</div>

<div class="container mt-5 mb-2">

    <h4 class="mb-3">Mô tả sản phẩm</h4>
    <?php 
        echo '<p >'.$data_spone[0]['mota'].'</p>';
    ?>
    <hr class="mt-5">
</div>

<!--Sản Phẩm liên quan  -->

<div class="container">
    <h4 class="mb-5">Sản phẩm liên quan</h4>
    <div class="row">
        <?php  
        if (is_array($result_dmmenu)){
            if(count($result_dmmenu) > 0 || is_object($result_dmmenu)){
                foreach($result_dmmenu as $item){
                    echo '
                    <div class="col-md-3 mb-5">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="http://localhost/project/public/media/upload_img/'.$item['duongdan'].'"
                                    class="img-fluid" />
                                <a href="index.php?action=menu&dmmenu=ca-phe&idsp='.$item['idsp'].'">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-nowrap">'.$item['tensp'].'</h5>
                                <p class="card-text">'.$item['giasp'].' đ</p>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }  ;
        };
            // // foreach($arr_sp as $item){
            // //     echo '
            // //     <div class="col-md-3 mb-5 p-2">
            // //         <div class="card">
            // //             <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
            // //                 <img src="http://localhost/project/public/media/upload_img/'.$item['duongdan'].'"
            // //                     class="img-fluid" />
            // //                 <a href="index.php?action=menu&dmmenu=ca-phe&idsp='.$item['idsp'].'">
            // //                     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            // //                 </a>
            // //             </div>
            // //             <div class="card-body">
            // //                 <h5 class="card-title">'.$item['tensp'].'</h5>
            // //                 <p class="card-text">'.$item['giasp'].' đ</p>
            // //             </div>
            // //         </div>
            // //     </div>
            // //     ';
            // }
        ?>
        <div class="col-sm-3 p-2">
            <div class="card">
                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="https://product.hstatic.net/1000075078/product/1669736893_hi-tea-vai_3c5f6e9b7f59407696b888a8550cf2ad_large.png"
                        class="img-fluid" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hi-Tea Vải</h5>
                    <p class="card-text">49.000 đ</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 p-2">
            <div class="card">
                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="https://product.hstatic.net/1000075078/product/1669736893_hi-tea-vai_3c5f6e9b7f59407696b888a8550cf2ad_large.png"
                        class="img-fluid" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hi-Tea Vải</h5>
                    <p class="card-text">49.000 đ</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 p-2">
            <div class="card">
                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="https://product.hstatic.net/1000075078/product/1669736893_hi-tea-vai_3c5f6e9b7f59407696b888a8550cf2ad_large.png"
                        class="img-fluid" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hi-Tea Vải</h5>
                    <p class="card-text">49.000 đ</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Lấy danh sách tất cả các listItem và radioInput
var listItems = document.querySelectorAll('.listItem');
var radioInputs = document.querySelectorAll('.radioInput');

// Thêm sự kiện click cho từng listItem
listItems.forEach(function(listItem, index) {
    listItem.addEventListener('click', function() {
        // Chuyển đổi trạng thái checked của radioInput tương ứng
        radioInputs[index].checked = !radioInputs[index].checked;
    });
});
</script>