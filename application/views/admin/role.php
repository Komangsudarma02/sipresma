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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataRole"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('role'); ?>"></div>
                                <?php if ($this->session->flashdata('role')) : ?>
                                <?php endif; ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($role as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['role']; ?></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/roleAccess/') . $val['id_role']; ?>">
                                                    <div class="btn btn-sm btn-success"><i class="fas fa-fw fa-lock"></i></div>
                                                </a>
                                                <a>
                                                    <div class="btn btn-sm btn-primary tampilRoleUbah" data-toggle="modal" data-target="#dataRole" data-id="<?= $val['id_role']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                                <a href="<?= site_url('Admin/delete_role/' . ($val['id_role'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
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

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
<!-- /.content -->
<div class="modal fade" id="dataRole" tabindex="-1" aria-labelledby="dataRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataRoleLabel">Tambah Data Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/role'); ?>" method="post">
                    <input type="hidden" name="id_role" id="id_role">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Role</label>
                        <input type="text" name="role" class="form-control" id="role" placeholder="Masukan Nama Role">
                        <td><?= form_error('role'); ?></td>
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
        $('#role').val("");
        $('#dataRoleLabel').html('Tambah Data Role');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilRoleUbah').on('click', function() {
        $('#dataRoleLabel').html('Edit Data Role');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('Admin/save_update_role') ?>');

        const id_role = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Admin/getUbahRole') ?>',
            data: {
                id_role: id_role
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_role').val(data.id_role);
                $('#role').val(data.role);
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