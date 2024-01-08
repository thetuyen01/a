<div class="container mt-5">
    <h4 class="text-center mb-5">Menu sản phẩm</h4>
    <div class="row">
        <?php 
            include_once "controller/clients/home.php"; 
            $home = new Home();
            $list_menu = $home->getMenu();
            if($list_menu){
                foreach($list_menu as $item){
                    echo '
                    <div class="col-lg-3 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay d-flex justify-content-center mt-5" data-mdb-ripple-init
                                data-mdb-ripple-color="light">
                                <img src="http://localhost/project/public/media/upload_img/'.$item['images'].'"
                                    style="border-radius:50% ;height: 100px; width: 100px;" />
                                <a href="index.php?action=menu&dmmenu=' . $item['slug_dmmenu'] . '&idmenu='.$item['idmenu'].'">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">'.$item['ten_dmmenu'].'</p>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
        ?>
        <!-- <div class="col-lg-2 col-md-12">
            <div class="card">
                <div class="bg-image hover-overlay d-flex justify-content-center mt-5" data-mdb-ripple-init
                    data-mdb-ripple-color="light">
                    <img src="https://minio.thecoffeehouse.com/image/admin/1701759625_img-copy.png"
                        style="border-radius:50% ;height: 100px; width: 100px;" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">Cà phê</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12">
            <div class="card">
                <div class="bg-image hover-overlay d-flex justify-content-center mt-5" data-mdb-ripple-init
                    data-mdb-ripple-color="light">
                    <img src="https://minio.thecoffeehouse.com/image/admin/1701760207_img-9.png"
                        style="border-radius:50% ;height: 100px; width: 100px;" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">Trà</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12">
            <div class="card">
                <div class="bg-image hover-overlay d-flex justify-content-center mt-5" data-mdb-ripple-init
                    data-mdb-ripple-color="light">
                    <img src="https://minio.thecoffeehouse.com/image/admin/1701760188_img-8.png"
                        style="border-radius:50% ;height: 100px; width: 100px;" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">Cà phê</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12">
            <div class="card">
                <div class="bg-image hover-overlay d-flex justify-content-center mt-5" data-mdb-ripple-init
                    data-mdb-ripple-color="light">
                    <img src="https://minio.thecoffeehouse.com/image/admin/1701760222_img-10.png"
                        style="border-radius:50% ;height: 100px; width: 100px;" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">Cà phê</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card">
                <div class="bg-image hover-overlay d-flex justify-content-center mt-5" data-mdb-ripple-init
                    data-mdb-ripple-color="light">
                    <img src="https://minio.thecoffeehouse.com/image/admin/1701760147_img-5.png"
                        style="border-radius:50% ;height: 100px; width: 100px;" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">Cà phê</p>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6">
            <div class="card">
                <div class="bg-image hover-overlay d-flex justify-content-center mt-5" data-mdb-ripple-init
                    data-mdb-ripple-color="light">
                    <img src="https://minio.thecoffeehouse.com/image/admin/1701760133_img-4.png"
                        style="border-radius:50% ;height: 100px; width: 100px;" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">Cà phê</p>
                </div>
            </div>
        </div> -->
    </div>