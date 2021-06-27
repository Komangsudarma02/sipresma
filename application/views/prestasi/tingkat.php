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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataTingkat"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('tingkat'); ?>"></div>
                                <?php if ($this->session->flashdata('tingkat')) : ?>
                                <?php endif; ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Tingkat Prestasi</th>
                                        <th>Keterangan Tingkat Prestasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tingkat as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++ ?></td>
                                            <td><?= $val['nama_tingkat']; ?></td>
                                            <td><?= $val['ket_tingkat']; ?></td>
                                            <td class="text-center"><a>
                                                    <div class="btn btn-sm btn-primary tampilTingkatUbah" data-toggle="modal" data-target="#dataTingkat" data-id="<?= $val['id_tingkat']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                                <a href="<?= site_url('Prestasi/deleteTingkat/' . ($val['id_tingkat'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                    <i class="fas fa-fw fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
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
<!-- Modal -->
<div class="modal fade" id="dataTingkat" tabindex="-1" aria-labelledby="dataTingkatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataTingkatLabel">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Prestasi/daftarTingkat'); ?>" method="post">
                    <input type="hidden" name="id_tingkat" id="id_tingkat">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Tingkat Prestasi</label>
                        <input type="text" name="nama_tingkat" class="form-control" id="nama_tingkat" placeholder="Masukan Nama Tingkat Prestasi" value="<?= (isset($id_tingkat['nama_tingkat'])) ? ($id_tingkat['nama_tingkat']) : ''; ?>">
                        <td><?= form_error('nama_tingkat'); ?></td>
                    </div>
                    <div class="col-sm-14">
                        <div class="form-group">
                            <label>Keterangan Tingkat Prestasi</label>
                            <textarea class="form-control" name="ket_tingkat" id="ket_tingkat" rows="3" placeholder="Masukan Keterangan Tingkat Prestasi"></textarea>
                        </div>
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
        $('#nama_tingkat').val("");
        $('#ket_tingkat').val("");
        $('#dataTingkatLabel').html('Tambah Data Tingkat Prestasi');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilTingkatUbah').on('click', function() {
        $('#dataTingkatLabel').html('Edit Data Tingkat Prestasi');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('Prestasi/saveUpdateTingkat') ?>');

        const id_tingkat = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Prestasi/getUbahTingkat') ?>',
            data: {
                id_tingkat: id_tingkat
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_tingkat').val(data.id_tingkat);
                $('#nama_tingkat').val(data.nama_tingkat);
                $('#ket_tingkat').val(data.ket_tingkat);
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