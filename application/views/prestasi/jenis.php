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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataJenis"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('jenis'); ?>"></div>
                                <?php if ($this->session->flashdata('jenis')) : ?>
                                <?php endif; ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Jenis Prestasi</th>
                                        <th>Nama Bidang</th>
                                        <th>Keterangan Jenis Prestasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jenis as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++ ?></td>
                                            <td><?= $val['nama_jenis']; ?></td>
                                            <td><?= $val['nama_bidang']; ?></td>
                                            <td><?= $val['ket_jenis']; ?></td>
                                            <td class="text-center"><a>
                                                    <div class="btn btn-sm btn-primary tampilJenisUbah" data-toggle="modal" data-target="#dataJenis" data-id="<?= $val['id_jenis']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                                <a href="<?= site_url('Prestasi/deleteJenis/' . ($val['id_jenis'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
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
<div class="modal fade" id="dataJenis" tabindex="-1" aria-labelledby="dataJenisLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataJenisLabel">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Prestasi/daftarJenis'); ?>" method="post">
                    <input type="hidden" name="id_jenis" id="id_jenis">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Jenis Prestasi</label>
                        <input type="text" name="nama_jenis" class="form-control" id="nama_jenis" placeholder="Masukan Nama Jenis Prestasi" value="<?= (isset($id_jenis['nama_jenis'])) ? ($id_jenis['nama_jenis']) : ''; ?>">
                        <td><?= form_error('nama_jenis'); ?></td>
                    </div>
                    <div class="form-group">
                        <label>Nama Bidang</label>
                        <select class="form-control" name="id_bidang" id="id_bidang">
                            <?php
                            foreach ($nama_bidang as $val) { ?>
                                <option value="<?= $val['id_bidang']; ?>"><?= $val['nama_bidang']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-14">
                        <div class="form-group">
                            <label>Keterangan Jenis Prestasi</label>
                            <textarea class="form-control" name="ket_jenis" id="ket_jenis" rows="3" placeholder="Masukan Keterangan Jenis Prestasi"></textarea>
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
        $('#nama_jenis').val("");
        $('#ket_jenis').val("");
        $('#dataJenisLabel').html('Tambah Data Jenis Prestasi');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilJenisUbah').on('click', function() {
        $('#dataJenisLabel').html('Edit Data Jenis Prestasi');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('Prestasi/saveUpdateJenis') ?>');

        const id_jenis = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Prestasi/getUbahJenis') ?>',
            data: {
                id_jenis: id_jenis
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_jenis').val(data.id_jenis);
                $('#nama_jenis').val(data.nama_jenis);
                $('#id_bidang').val(data.id_bidang);
                $('#ket_jenis').val(data.ket_jenis);
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