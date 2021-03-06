<div class="register-box">
    <div class="register-logo">
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <img src="<?= base_url(); ?>/assets/img/Undiksha.png" width="200px" height="200px" style="display: block; margin: auto;">
            <div class="mb-3"></div>
            <div class="login-box-msg">
                <a><strong>
                        <h3>SIPRESMA</h3>
                    </strong></a>
                <p>SISTEM INFORMASI PRESTASI MAHASISWA</p>
            </div>

            <form action="<?= base_url('auth/registration'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name" value="<?= set_value('name'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger"><?= form_error('name'); ?></small>


                <div class="input-group mb-3">
                    <select class="form-control" name="id_fakultas" id="id_fakultas">
                        <option>Pilih Fakultas</option>
                        <?php
                        foreach ($nama_fakultas as $val) { ?>
                            <option value="<?= $val['id_fakultas']; ?>"><?= $val['nama_fakultas']; ?></option>
                        <?php } ?>
                    </select>
                    <div class=" input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-building"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select class="form-control" id="id_jurusan" name="id_jurusan" required>
                        <option>Pilih Jurusan</option>
                    </select>
                    <div class=" input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-university"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                    <div class=" input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger"><?= form_error('email'); ?></small>


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
                <div class="row mb-3">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="<?= base_url('auth'); ?>" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>


<script>
    $("#id_fakultas").change(function() {

        // variabel dari nilai combo box kendaraan
        var id_fakultas = $("#id_fakultas").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url('auth/get_jurusan') ?>',
            method: "POST",
            data: {
                id_fakultas: id_fakultas
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_jurusan + '>' + data[i].nama_jurusan + '</option>';
                }
                $('#id_jurusan').html(html);

            }
        });
    });
</script>