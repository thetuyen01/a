<?php include_once 'view/clients/menu.php'; ?>
<h1 class="text-center m-5 text-primary">Sản phẩm của chúng tôi </h1>
<div class="container row mt-5">
    <div class="col-md-3">
        <form action="" method="get">
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" name="timkiem" placeholder="Search"
                    aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <button class="btn btn-primary">Tìm kiếm</button>
                </span>
            </div>
        </form>
    </div>
    <div class="col-md-6">

    </div>
</div>
<div class="d-flex align-items-center justify-content-center m-5">
    <div class="container row">
        <?php  

            if (is_array($result)){
                if(count($result) > 0 || is_object($result)){
                    foreach($result as $item){
                        echo '
                        <div class="col-md-3 mb-5">
                            <div class="card">
                                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                    <img src="http://localhost/project/public/media/upload_img/'.$item['duongdan'].'"
                                        class="img-fluid" />
                                    <a href="index.php?action=menu&dmmenu='.$item['slug_dmmenu'].'&idsp='.$item['idsp'].'">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">'.$item['tensp'].'</h5>
                                    <p class="card-text">'.$item['giasp'].' đ</p>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }  ;
            } else{
                echo ' <p class="text-center text-danger">Không tìm thấy sản phẩm nào</p>';
            }   
        ?>

        <div class="col-md-12 d-flex justify-content-center">
            <!-- <a href="index.php?page=" type="button text-center" class="btn btn-warning"
                data-mdb-ripple-init>Xem thêm sản phẩm</a> -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link"
                            href="<?php if(!empty($_GET['page'])&& (int)$_GET['page'] > 1){echo 'index.php?page='.((int)$_GET['page']-1).'';}else{echo 'index.php?page=1';}?>">Trước</a>
                    </li>
                    <?php 
                        if($count){
                            $count = ceil($count/4);
                            for ($i=1; $i <= $count; $i++) { 
                               echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                            }
                        }
                    ?>
                    <li class="page-item"><a class="page-link"
                            href="<?php if(!empty($_GET['page'])&& (int)$_GET['page']+1 <= $count){echo 'index.php?page='.((int)$_GET['page']+1).'';}?>">Kế
                            tiếp</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>