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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataMenu"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('menu'); ?>"></div>
                                <?php if ($this->session->flashdata('menu')) : ?>
                                <?php endif; ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($menu as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['menu']; ?></td>
                                            <td class="text-center"><a>
                                                    <div class="btn btn-sm btn-primary tampilMenuUbah" data-toggle="modal" data-target="#dataMenu" data-id="<?= $val['id_menu']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                                <a href="<?= site_url('Menu/delete_menu/' . ($val['id_menu'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
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

<!-- Modal -->
<div class="modal fade" id="dataMenu" tabindex="-1" aria-labelledby="dataMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataMenuLabel">Tambah Data Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Menu/daftar_menu'); ?>" method="post">
                    <input type="hidden" name="id_menu" id="id_menu">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Menu</label>
                        <input type="text" name="menu" class="form-control" id="menu" placeholder="Masukan Nama Menu">
                        <?= form_error('menu'); ?>
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
        $('#menu').val("");
        $('#dataMenuLabel').html('Tambah Data Menu');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilMenuUbah').on('click', function() {
        $('#dataMenuLabel').html('Edit Data Menu');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('Menu/save_update_menu') ?>');

        const id_menu = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Menu/getUbahMenu') ?>',
            data: {
                id_menu: id_menu
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_menu').val(data.id_menu);
                $('#menu').val(data.menu);
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