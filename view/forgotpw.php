<section class="vh-90" style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 ">
                        <h3 class="mb-5 text-center text-black">Forgot password</h3>
                        <p class="text-danger"><?php if(isset($msg) && isset($msg['msg'])) echo $msg['msg']; ?>
                        <form action="index.php?action=checkemail" method="post">
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="email" id="typeEmailX-2" name="email"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block mb-3" name="forgot"
                                type="submit">Forgot</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>