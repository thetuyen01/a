<section class="vh-90" style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 ">

                        <h3 class="mb-5 text-center text-black">Register</h3>
                        <p class="text-danger"><?php if(isset($msg) && isset($msg['general'])) echo $msg['general']; ?>
                        </p>
                        <form action="index.php?action=addregister" method="post">
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="email" name="email" id="typeEmailX-2"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>
                            <p class="text-danger"><?php if(isset($msg) && isset($msg['email'])) echo $msg['email']; ?>
                            </p>
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="text" id="form12" name="sodt" class="form-control form-control-lg" />
                                <label class="form-label" for="form12">Số điện thoại</label>
                            </div>
                            <p class="text-danger"><?php if(isset($msg) && isset($msg['sodt'])) echo $msg['sodt']; ?>
                            </p>
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                <label class="form-label" for="username">Username</label>
                            </div>
                            <p class="text-danger">
                                <?php if(isset($msg) && isset($msg['username'])) echo $msg['username']; ?></p>
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="password" id="typePassword" name="password"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typePassword">Password input</label>
                            </div>
                            <p class="text-danger">
                                <?php if(isset($msg) && isset($msg['password'])) echo $msg['password']; ?></p>
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="text" id="password" name="diachi" class="form-control form-control-lg" />
                                <label class="form-label" for="password">Địa chỉ</label>
                            </div>
                            <p class="text-danger">
                                <?php if(isset($msg) && isset($msg['diachi'])) echo $msg['diachi']; ?></p>
                            <button class="btn btn-primary btn-lg btn-block mb-3" name="register"
                                type="submit">Register</button>
                        </form>
                        <hr class="my-4">
                        <div class="d-flex align-items-center justify-content-center pb-4">
                            <a href="index.php?action=login" class="btn btn-outline-danger">Login now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>