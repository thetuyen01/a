<div class="container" style="margin-top: 200px;">
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Thông tin đơn hàng</h5>
                </div>
                <div class="card-body">
                    <?php 
                            if($_SESSION['carts']){
                                $tru='tru';
                                $cong='cong';
                                $qutity = 0;
                                $total = 0;
                                foreach ($_SESSION['carts'] as $index=>$item) {
                                    echo '
                                    <hr class="my-4" />
                                    <!-- Single item -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <!-- Image -->
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                data-mdb-ripple-color="light">
                                                <img src="http://localhost/project/public/media/upload_img/'.$item['dmhinh'][0]['duongdan'].'"
                                                    class="w-75" />
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                </a>
                                            </div>
                                            <!-- Image -->
                                        </div>
                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <!-- Data -->
                                            <p><strong>'.$item['sanpham']['tensp'].'</strong></p>
                                            <p>$'.((float)$item['sanpham']['giasp'] + (!empty($item['topping'])? (float)$item['topping'][0]['giatp']:0) +(!empty($item['size'])? (float)$item['size'][0]['giasize']:0)).'</p>
                                            <p>Số lượng: '.(!empty($item['quantity'])? $item['quantity']:"Không").'</p>
            
                                            <form action="index.php?action=deleteCart" method="post">
                                                <input type="hidden" name="id" value="'.$index.'">
                                                <button type="submit" name="delete" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                                    title="Remove item">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <!-- Data -->
                                        </div>
            
                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                            
                                            <p class="text-start text-md-center">
                                                <strong id="price">$'.(((float)$item['sanpham']['giasp'] + (!empty($item['topping'])? (float)$item['topping'][0]['giatp']:0) +(!empty($item['size'])? (float)$item['size'][0]['giasize']:0))*(int)$item['quantity']).'</strong>
                                            </p>
                                            <!-- Price -->
                                        </div>
                                    </div>
                                    <!-- Single item -->
                                    ';
                                    $qutity+=(int)$item['quantity'];
                                    $total+=((int)$item['sanpham']['giasp'] + (!empty($item['topping'])? (float)$item['topping'][0]['giatp']:0) +(!empty($item['size'])? (float)$item['size'][0]['giasize']:0))*(int)$item['quantity'];
                                }
                                }
                        ?>
                    <hr class="my-4" />
                    <!-- Single item -->
                    <div class="row">
                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                            <!-- Image -->
                            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                <img src="https://product.hstatic.net/1000075078/product/1700837685_tra-sua-oolong-berry-ly-thuy-tinh_58791248b366492e9f5520dc15c97839_large.jpg"
                                    class="w-75" alt="Blue Jeans Jacket" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                </a>
                            </div>
                            <!-- Image -->
                        </div>

                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                            <!-- Data -->
                            <p><strong>Blue denim shirt</strong></p>
                            <p>$36.00</p>
                            <p>Quantity: 2</p>
                            <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                title="Remove item">
                                <i class="fas fa-trash"></i>
                            </button>
                            <!-- Data -->
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                            <!-- Price -->
                            <p class="text-start text-md-center">
                                <strong>$17.99</strong>
                            </p>
                            <!-- Price -->
                        </div>
                    </div>
                    <!-- Single item -->

                    <hr class="my-4" />


                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h5>Thông tin khác hàng</h5>
            <form style="width: 26rem;" action="index.php?action=payment" method="post">
                <!-- Name input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <textarea type="text" name="diachi" id="form4Example1"
                        class="form-control"><?php if(isset($_SESSION['dc'])){echo $_SESSION['dc'];} ?></textarea>
                    <label class="form-label" for="form4Example1">Nhập địa chỉ nhận hàng</label>
                </div>
                <p>Tổng số lượng : <strong><?php echo $qutity ?></strong></p>
                <h5 class="mb-3">Tổng tiền : $<?php echo $total?></h5>
                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" name="thanhtoan" class="btn btn-primary btn-block mb-4">Đặt
                    hàng</button>
            </form>
        </div>
    </div>
</div>