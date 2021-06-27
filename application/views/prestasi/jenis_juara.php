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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataJuara"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('juara'); ?>"></div>
                                <?php if ($this->session->flashdata('juara')) : ?>
                                <?php endif; ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Jenis Juara</th>
                                        <th>Keterangan Jenis Juara</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jenis_juara as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++ ?></td>
                                            <td><?= $val['nama_jenis_juara']; ?></td>
                                            <td><?= $val['ket_jenis_juara']; ?></td>
                                            <td class="text-center"><a>
                                                    <div class="btn btn-sm btn-primary tampilJuaraUbah" data-toggle="modal" data-target="#dataJuara" data-id="<?= $val['id_jenis_juara']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                                <a href="<?= site_url('Prestasi/deleteJenisJuara/' . ($val['id_jenis_juara'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
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
<div class="modal fade" id="dataJuara" tabindex="-1" aria-labelledby="dataJuaraLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataJuaraLabel">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Prestasi/daftarJenisJuara'); ?>" method="post">
                    <input type="hidden" name="id_jenis_juara" id="id_jenis_juara">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Jenis Juara</label>
                        <input type="text" name="nama_jenis_juara" class="form-control" id="nama_jenis_juara" placeholder="Masukan Nama Jenis Juara" value="<?= (isset($id_jenis_juara['nama_jenis_juara'])) ? ($id_jenis_juara['nama_jenis_juara']) : ''; ?>">
                        <td><?= form_error('nama_jenis_juara'); ?></td>
                    </div>
                    <div class="col-sm-14">
                        <div class="form-group">
                            <label>Keterangan Jenis Juara</label>
                            <textarea class="form-control" name="ket_jenis_juara" id="ket_jenis_juara" rows="3" placeholder="Masukan Keterangan Jenis Juara"></textarea>
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
        $('#nama_jenis_juara').val("");
        $('#ket_jenis_juara').val("");
        $('#dataJuaraLabel').html('Tambah Data Jenis Juara');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilJuaraUbah').on('click', function() {
        $('#dataJuaraLabel').html('Edit Data Jenis Juara');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('Prestasi/saveUpdateJenisJuara') ?>');

        const id_jenis_juara = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Prestasi/getUbahJuara') ?>',
            data: {
                id_jenis_juara: id_jenis_juara
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_jenis_juara').val(data.id_jenis_juara);
                $('#nama_jenis_juara').val(data.nama_jenis_juara);
                $('#ket_jenis_juara').val(data.ket_jenis_juara);
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