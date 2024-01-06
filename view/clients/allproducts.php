<?php include_once 'view/clients/menu.php'; ?>
<h1 class="text-center m-5">Tất cả sản phẩm</h1>
<div class="d-flex align-items-center justify-content-center m-5">
    <div class="container row">
        <?php  
            if(count($result) > 0 || is_object($result)){
                foreach($result as $item){
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
            ?>
        <div class="col-md-12 d-flex justify-content-center">
            <!-- <a href="index.php?page=" type="button text-center" class="btn btn-warning"
                data-mdb-ripple-init>Xem thêm sản phẩm</a> -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link"
                            href="<?php if(!empty($_GET['page'])&& (int)$_GET['page'] > 1){echo 'index.php?page='.((int)$_GET['page']-1).'';}else{echo 'index.php?page=1';}?>">Previous</a>
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
                            href="<?php if(!empty($_GET['page'])&& (int)$_GET['page']+1 <= $count){echo 'index.php?page='.((int)$_GET['page']+1).'';}?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>