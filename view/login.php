<section class="vh-90" style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 ">

                        <h3 class="mb-5 text-center text-black">Login</h3>
                        <p class="text-danger"><?php if(isset($msg) && isset($msg['msg'])) echo $msg['msg']; ?>
                        <form action="index.php?action=checklogin" method="post">
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="email" id="typeEmailX-2" name="email"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="password" id="typePassword" name="password"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typePassword">Password input</label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block mb-3" name="login"
                                type="submit">Login</button>
                        </form>
                        <a class="text-muted mt-5" href="index.php?action=forgotpw">Forgot password?</a>
                        <hr class="my-4">
                        <div class="d-flex align-items-center justify-content-center pb-4">
                            <p class="mb-0 me-2">Don't have an account?</p>
                            <a href="index.php?action=register" class="btn btn-outline-danger">Register now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>