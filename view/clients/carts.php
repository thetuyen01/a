<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Giỏ hàng - <?php echo count($_SESSION['carts'])?> sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        <?php 
                            $total = 0;
                            if($_SESSION['carts']){
                                $tru='tru';
                                $cong='cong';
                                foreach ($_SESSION['carts'] as $index=>$item) {
                                    $total+=((float)$item['sanpham']['giasp'] + (!empty($item['topping'])? (float)$item['topping'][0]['giatp']:0) +(!empty($item['size'])? (float)$item['size'][0]['giasize']:0));
                                    echo '
                                    <hr class="my-4" />
                                    <!-- Single item -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <!-- Image -->
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                data-mdb-ripple-color="light">
                                                <img src="http://localhost/project/public/media/upload_img/'.$item['dmhinh'][0]['duongdan'].'"
                                                    class="w-100" />
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                </a>
                                            </div>
                                            <!-- Image -->
                                        </div>
                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <!-- Data -->
                                            <p><strong>'.$item['sanpham']['tensp'].'</strong></p>
                                            <p>Topping: '.(!empty($item['topping'])? $item['topping'][0]['tentp']:"Không").'</p>
                                            <p>Size: '.(!empty($item['size'])? $item['size'][0]['tensize']:"Không").'</p>
            
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
                                            <!-- Quantity -->
                                            <div class="d-flex mb-4" style="max-width: 300px">
                                                <button class="btn btn-primary px-3 me-2"
                                                    onclick="updateTotalAmount(\''.$tru.'\',\'form'.$index.'\',\'price'.$index.'\',\''.$index.'\')">
                                                    <i class="fas fa-minus"></i>
                                                </button>
            
                                                <div class="form-outline">
                                                    <input id="form'.$index.'" min="1" name="quantity" value="1" type="number"
                                                        class="form-control" />
                                                </div>
            
                                                <button class="btn btn-primary px-3 ms-2"
                                                    onclick="updateTotalAmount(\''.$cong.'\',\'form'.$index.'\',\'price'.$index.'\',\''.$index.'\')">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <!-- Quantity -->
            
                                            <!-- Price -->
                                            <p class="text-start text-md-center">
                                                <strong id="price'.$index.'">$'.((float)$item['sanpham']['giasp'] + (!empty($item['topping'])? (float)$item['topping'][0]['giatp']:0) +(!empty($item['size'])? (float)$item['size'][0]['giasize']:0)).'</strong>
                                            </p>
                                            <!-- Price -->
                                        </div>
                                    </div>
                                    <!-- Single item -->
                                    ';
                                }
                                }
                        ?>
                        <hr class="my-4" />
                        <!-- Single item -->
                        <div class="row">
                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                    data-mdb-ripple-color="light">
                                    <img src="https://product.hstatic.net/1000075078/product/1700837685_tra-sua-oolong-berry-ly-thuy-tinh_58791248b366492e9f5520dc15c97839_large.jpg"
                                        class="w-100" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>
                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <p><strong>Red hoodie</strong></p>
                                <p>Color: red</p>
                                <p>Size: M</p>

                                <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                    title="Remove item">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                                    title="Move to the wish list">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <!-- Data -->
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <!-- Quantity -->
                                <div class="d-flex mb-4" style="max-width: 300px">
                                    <button class="btn btn-primary px-3 me-2"
                                        onclick="updateTotalAmount('tru','form1','price')">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <div class="form-outline">
                                        <input id="form1" min="1" name="quantity" value="1" type="number"
                                            class="form-control" />
                                    </div>

                                    <button class="btn btn-primary px-3 ms-2"
                                        onclick="updateTotalAmount('cong','form1','price')">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- Quantity -->

                                <!-- Price -->
                                <p class="text-start text-md-center">
                                    <strong id="price">$17.99</strong>
                                </p>
                                <!-- Price -->
                            </div>
                        </div>
                        <!-- Single item -->
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <p><strong>Expected shipping delivery</strong></p>
                        <p class="mb-0">12.10.2020 - 14.10.2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>$53.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Gratis</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong id="tongtien">$<?php echo $total?></strong></span>
                            </li>
                        </ul>

                        <a href="index.php?action=checkout" class="btn btn-primary btn-lg btn-block">
                            Go to checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
// Function to update total amount based on quantity changes
function updateTotalAmount(a, b, c, z) {
    console.log(z)
    let quantity = document.getElementById(b)
    let price = document.getElementById(c).innerHTML.trim().replace(/\$/g, '');
    let tongtien = document.getElementById('tongtien').innerHTML.trim().replace(/\$/g, '');
    if (parseInt(quantity.value) > 0) {
        if (a == "cong") {
            quantity.value = parseInt(quantity.value) + 1
            console.log(quantity.value, document.getElementById('tongtien').innerHTML, price)
            document.getElementById('tongtien').innerHTML = "$" + (parseFloat(document.getElementById('tongtien')
                    .innerHTML.trim().replace(/\$/g, '')) + parseFloat(price))
                .toFixed(3)

            updateCartItem(z, quantity.value)
        } else {
            if (parseInt(quantity.value) > 1) {
                quantity.value = parseInt(quantity.value) - 1
                document.getElementById('tongtien').innerHTML = "$" + (parseFloat(document.getElementById('tongtien')
                        .innerHTML.trim().replace(/\$/g, '')) - parseFloat(
                        price))
                    .toFixed(3)
                updateCartItem(z, quantity.value)
            }
        }
    }

    function updateCartItem(product_id, new_quantity) {
        console.log(product_id, new_quantity)
        // Gửi yêu cầu AJAX đến máy chủ
        $.ajax({
            type: "POST",
            url: "index.php?action=update_cart", // Đường dẫn đến file xử lý cập nhật giỏ hàng trên máy chủ
            data: {
                product_id: product_id,
                new_quantity: new_quantity
            },
            success: function(response) {
                // Xử lý phản hồi từ máy chủ (nếu cần)
                console.log(response);
            }
        });
    }
};
</script>