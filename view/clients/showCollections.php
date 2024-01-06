<div class="d-flex align-items-center justify-content-center" style="margin-top: 190px;">
    <div class="container row">
        <div class="col-md-3 mb-5">
            <div class="list-group list-group-light">
                <?php 
                    foreach($dmmenu as $item){
                        echo '
                        <a href="index.php?action='.$_GET['action'].'&dmmenu='.$item['slug_dmmenu'].'&idmenu='.$_GET['idmenu'].'" class="list-group-item list-group-item-action px-3 border-0 '.($_GET['dmmenu']==$item['slug_dmmenu']? 'active':null).'">'.$item['ten_dmmenu'].'</a>
                        ';
                    }
                ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php  
                    if(count($arr_sp) > 0 || is_object($arr_sp)){
                        foreach($arr_sp as $item){
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
                                        <h5 class="card-title text-nowrap fs-6">'.$item['tensp'].'</h5>
                                        <p class="card-text">'.$item['giasp'].' đ</p>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    }
                
                ?>
            </div>
        </div>
    </div>
</div>