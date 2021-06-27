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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataFakultas"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('fakultas'); ?>"></div>
                                <?php if ($this->session->flashdata('fakultas')) : ?>
                                <?php endif; ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($fakultas as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['nama_fakultas']; ?></td>
                                            <td class="text-center"><a>
                                                    <div class="btn btn-sm btn-primary tampilFakultasUbah" data-toggle="modal" data-target="#dataFakultas" data-id="<?= $val['id_fakultas']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                                <a href="<?= site_url('MasterData/deleteFakultas/' . ($val['id_fakultas'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
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
<div class="modal fade" id="dataFakultas" tabindex="-1" aria-labelledby="dataFakultasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataFakultasLabel">Tambah Data Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('MasterData/daftarFakultas'); ?>" method="post">
                    <input type="hidden" name="id_fakultas" id="id_fakultas">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Fakultas</label>
                        <input type="text" name="nama_fakultas" class="form-control" id="nama_fakultas" placeholder="Masukan Nama Fakultas">
                        <td><?= form_error('nama_fakultas'); ?></td>
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
        $('#nama_fakultas').val("");
        $('#dataFakultasLabel').html('Tambah Data Fakultas');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilFakultasUbah').on('click', function() {
        $('#dataFakultasLabel').html('Edit Data Fakultas');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('MasterData/saveUpdateFakultas') ?>');

        const id_fakultas = $(this).data('id');

        $.ajax({
            url: '<?= base_url('MasterData/getUbahFakultas') ?>',
            data: {
                id_fakultas: id_fakultas
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_fakultas').val(data.id_fakultas);
                $('#nama_fakultas').val(data.nama_fakultas);
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