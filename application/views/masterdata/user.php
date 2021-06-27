<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <div class="card-tools">
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataUser"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover" style="width:100%">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('user'); ?>"></div>
                                <?php if ($this->session->flashdata('user')) : ?>
                                <?php endif; ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Nama Fakultas</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($users as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['name']; ?></td>
                                            <td><?= $val['email']; ?></td>
                                            <td><?= $val['nama_fakultas']; ?></td>
                                            <td>
                                                <figure img src="<?= base_url('/upload/profile/' . $val['image']); ?>" class="gal"><img src="<?= base_url('/upload/profile/' . $val['image']); ?>" alt="" width="50px"></figure>
                                            </td>
                                            <td class="text-center" width="150"> <a>
                                                    <div class="btn btn-sm btn-primary tampilUserUbah" data-toggle="modal" data-target="#dataUser" data-id="<?= $val['id_user']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                                <a href="<?= site_url('DataUser/deleteUser/' . md5($val['id_user'])) ?>" width="50px" class="btn btn-sm bg-danger tombol-hapus">
                                                    <i class="fas fa-fw fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="dataUser" tabindex="-1" aria-labelledby="dataUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataUserLabel">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="quickForm" action="<?= site_url('MasterData/daftarUser'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" id="id_user">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama User">
                    </div>
                    <small class="text-danger"><?= form_error('name'); ?></small>




                    <div class="form-group" id="email">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email User">
                    </div>
                    <small class="text-danger"><?= form_error('email'); ?></small>



                    <div class="form-group">
                        <label>Masukan Foto</label>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="user">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <input type="hidden" name="old_image" id="old_image">



                    <div class="form-group" id="pass1">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" name="password1" class="form-control" id="password1">
                    </div>



                    <div class="form-group" id="pass2">
                        <label for="exampleInputEmail1">Repeat Password</label>
                        <input type="password" name="password2" class="form-control" id="password2">
                    </div>



                    <div class="form-group" id="fakultas">
                        <label>Nama Fakultas</label>
                        <select class="form-control" name="id_fakultas" id="id_fakultas">
                            <option>Pilih Fakultas</option>
                            <?php
                            foreach ($nama_fakultas as $val) { ?>
                                <option value="<?= $val['id_fakultas']; ?>"><?= $val['nama_fakultas']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group" id="id_jurusan">
                        <label>Nama Jurusan</label>
                        <select class="form-control" id="jurusan" name="id_jurusan" required>
                            <option>Pilih Jurusan</option>
                        </select>
                    </div>



                    <div class="form-group" id="id_role">
                        <label>Role</label>
                        <select class="form-control" name="id_role" id="id_role">
                            <?php
                            foreach ($role as $val) { ?>
                                <option value="<?= $val['id_role']; ?>"><?= $val['role']; ?></option>
                            <?php } ?>
                        </select>
                    </div>



                    <div class="form-check" id="is_active">
                        <input id="is_active" class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Acvtive?
                        </label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.tombolTambahData').on('click', function() {
        $('#name').val("");
        $('#dataUserLabel').html('Tambah Data User');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#email').show();
        $('#pass1').show();
        $('#pass2').show();
        $('#fakultas').show();
        $('#id_jurusan').show();
        $('#id_role').show();
        $('#is_active').show();
    });


    $('.tampilUserUbah').on('click', function() {
        $('#dataUserLabel').html('Edit Data User');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('MasterData/saveUpdateUser') ?>');

        $('#email').hide();
        $('#pass1').hide();
        $('#pass2').hide();
        $('#fakultas').hide();
        $('#id_jurusan').hide();
        $('#id_role').hide();
        $('#is_active').hide();
        const id_user = $(this).data('id');

        $.ajax({
            url: '<?= base_url('MasterData/getUbahUser') ?>',
            data: {
                id_user: id_user
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_user').val(data.id_user);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#old_image').val(data.image);
                $('#password1').val(data.password1);
                $('#password2').val(data.password2);
                $('#id_fakultas').val(data.id_fakultas);
                $('#id_jurusan').val(data.id_jurusan);
                $('#id_role').val(data.id_role);
                $('#is_active').val(data.is_active);

            }
        });
    });

    $("#id_fakultas").change(function() {

        // variabel dari nilai combo box kendaraan
        var id_fakultas = $("#id_fakultas").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: '<?= base_url('MasterData/getJurusan') ?>',
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
                $('#jurusan').html(html);

            }
        });
    });

    $(function() {
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
            "scrollX": true,
        });
    });
</script>