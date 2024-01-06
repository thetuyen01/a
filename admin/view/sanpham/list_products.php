<?php include_once 'view/header.php';?>
<div class="container mt-5">
    <?php 
        if(isset($_COOKIE['update_msg'])){
            echo '
            <div class="alert alert-success" role="alert">
                '.$_COOKIE['update_msg'].'
            </div>
            ';
        }
    ?>
    <h3 class="text-center">Danh sách Menu</h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Sản phẩm thuộc loại </th>
                    <th style="max-width: 100px;">Ảnh</th>
                    <th>Topping</th>
                    <th>Size</th>
                    <th>Edit</th>
                </tr>

            </thead>
            <tbody>
                <?php 
                    if (is_array($arr_sp)){
                        foreach($arr_sp as $item){
                            $list_anh = '';
                            if(is_array($item['dmhinh'])){
                                foreach ($item['dmhinh'] as $index =>$anh){
                                    if($index==0){
                                        $list_anh.='<div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img height="100" width="100" src="http://localhost/project/public/media/upload_img/'.$anh['duongdan'].'" class="d-block " alt="Wild Landscape"/>
                                        </div>';
                                    }else{
                                        $list_anh.='<div class="carousel-inner">
                                        <div class="carousel-item ">
                                            <img height="100" width="100" src="http://localhost/project/public/media/upload_img/'.$anh['duongdan'].'" class="d-block " alt="Wild Landscape"/>
                                        </div>';
                                    }
                                    
                                }
                        
                            }
                            $list_topping = "";
                            if(is_array($item['topping'])){
                                foreach ($item['topping'] as $index=>$topping){
                                    $list_topping.= '<li class="list-group-item text-nowrap fs-6">'.$topping['tentp'].'</li>';
                                }
                            }
                            $list_size = "";
                            if(is_array($item['size'])){
                                foreach ($item['size'] as $index=>$size){
                                    $list_size.= '<li class="list-group-item text-nowrap fs-6">'.$size['tensize'].'</li>';
                                }
                            }
                            
;                            echo '
                            <tr>
                                <td>'.$item['sanpham']['idsp'].'</td>
                                <td>'.$item['sanpham']['tensp'].'</td>
                                <td>'.$item['sanpham']['giasp'].'</td>
                                <td>oke</td>
                                <td>'.$item['dmmenu'][0]['ten_dmmenu'].'</td>
                                <td style="max-width: 140px;">
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-mdb-ride="carousel" data-mdb-carousel-init>
                                    '.$list_anh.'
                                    </div>
                                </td>
                                <td >
                                    <ul class="list-group list-group-light">
                                    '.$list_topping.'
                                    </ul>
                                </td>
                                <td >
                                    <ul class="list-group list-group-light">
                                    '.$list_size.'
                                    </ul>
                                </td>
                                <td>
                                    <a type="button" href="index.php?action=sanpham&method=edit&idsanpham='.$item['sanpham']['idsp'].'" class="btn btn-outline-primary">Sửa</a>
                                    <a type="button" href="index.php?action=sanpham&method=delete&idsanpham='.$item['sanpham']['idsp'].'" class="btn btn-outline-danger">Xóa</a>
                                </td>
                            </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>