<div class="login-box">
    <div class="login-logo">
        <a href="l"><b>SIPRESMA</b>UNDIKSHA</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Change Your Password for</p>
            <p><?= $this->session->userdata('resest_email'); ?></p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth/changePassword'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="password" name="password1" id="password1" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger"><?= form_error('password1'); ?></small>


                <div class="input-group mb-3">
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Reset password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="<?= base_url('auth'); ?>">Login</a>
            </p>
            <p class="mb-0">
                <a href="<?= base_url('auth/registration'); ?>" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>