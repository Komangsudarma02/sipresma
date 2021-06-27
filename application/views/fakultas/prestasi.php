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
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Catatan:</h5>
                        Silahkan upload file prestasi dalam fomat (PDF).
                    </div>
                    <?= form_error('id_prestasi[]'); ?>

                    <div class="card-header">
                        <div class="card-tools" style="float: right;">
                            <a><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#inputData"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                        <div class="card-tools" style="float: left;">
                            <a><button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#exportData"><i class="fas fa-file-export"></i> Eksport Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tervalidasi-tab" data-toggle="tab" href="#tervalidasi" role="tab" aria-controls="tervalidasi" aria-selected="true">Tervalidasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="blmTervalidasi-tab" data-toggle="tab" href="#blmTervalidasi" role="tab" aria-controls="blmTervalidasi" aria-selected="false">Belum Tervalidasi</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tervalidasi" role="tabpanel" aria-labelledby="tervalidasi-tab">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <?= $this->session->flashdata('message'); ?>
                                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('prestasi'); ?>"></div>
                                        <?php if ($this->session->flashdata('prestasi')) : ?>
                                        <?php endif; ?>
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Kota Kegiatan</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Keterangan Prestasi</th>
                                                <th>Nama Pembimbing</th>
                                                <th>Tahun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($prestasi[0] as $val) { ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++ ?></td>
                                                    <td><?= $val['nama_kegiatan']; ?></td>
                                                    <td><?= $val['kota']; ?></td>
                                                    <td width="150"><?= $val['name']; ?></td>
                                                    <td><?= $val['ket_prestasi']; ?></td>
                                                    <td><?= $val['nama_pembimbing']; ?></td>
                                                    <td><?= $val['tahun']; ?></td>
                                                    <td class="text-center" width="150"> <a href="<?= site_url('PrestasiFakultas/detail/' . md5($val['id_prestasi'])) ?>">
                                                            <div class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></div>
                                                        </a>
                                                        <a href="<?= site_url('PrestasiFakultas/updateRegisterPrestasi/' . md5($val['id_prestasi'])) ?>">
                                                            <div class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></div>
                                                        </a>
                                                        <a href="<?= site_url('PrestasiFakultas/deletePrestasi/' . ($val['id_prestasi'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                            <i class="fas fa-fw fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php foreach ($prestasi[1] as $val) { ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++ ?></td>
                                                    <td><?= $val['nama_kegiatan']; ?></td>
                                                    <td><?= $val['kota']; ?></td>
                                                    <?php $anggota = $this->M_fakultas->getNamaAnggota($val['id_prestasi'])
                                                    ?>
                                                    <td width="150">
                                                        <ul>
                                                            <?php foreach ($anggota as $row) { ?>
                                                                <li><?= $row['name']; ?></li>
                                                            <?php } ?>
                                                        </ul>
                                                    </td>
                                                    <td><?= $val['ket_prestasi']; ?></td>
                                                    <td><?= $val['nama_pembimbing']; ?></td>
                                                    <td><?= $val['tahun']; ?></td>
                                                    <td class="text-center" width="250"> <a href="<?= site_url('PrestasiFakultas/detail/' . md5($val['id_prestasi'])) ?>">
                                                            <div class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></div>
                                                        </a>
                                                        <a href="<?= site_url('PrestasiFakultas/updateRegisterKelompok/' . md5($val['id_prestasi'])) ?>">
                                                            <div class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></div>
                                                        </a>
                                                        <a href="<?= site_url('PrestasiFakultas/deletePrestasi/' . ($val['id_prestasi'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                            <i class="fas fa-fw fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="tab-pane fade" id="blmTervalidasi" role="tabpanel" aria-labelledby="blmTervalidasi-tab">
                                    <form action="<?= site_url('PrestasiFakultas/validasi'); ?>" method="POST">
                                        <table id="example2" class="table table-bordered table-striped">
                                            <?= $this->session->flashdata('message'); ?>
                                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('prestasi'); ?>"></div>
                                            <?php if ($this->session->flashdata('prestasi')) : ?>
                                            <?php endif; ?>
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Nama Kegiatan</th>
                                                    <th>Kota Kegiatan</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>Keterangan Prestasi</th>
                                                    <th>Nama Pembimbing</th>
                                                    <th>Tahun</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($prestasi_blmTervalidasi[0] as $val) { ?>
                                                    <tr>
                                                        <td class="a-center ">
                                                            <input type="checkbox" class="flat" name="id_prestasi[]" value="<?= $val['id_prestasi']; ?>">
                                                        </td>
                                                        <td><?= $val['nama_kegiatan']; ?></td>
                                                        <td><?= $val['kota']; ?></td>
                                                        <td width="150"><?= $val['name']; ?></td>
                                                        <td><?= $val['ket_prestasi']; ?></td>
                                                        <td><?= $val['nama_pembimbing']; ?></td>
                                                        <td><?= $val['tahun']; ?></td>
                                                        <td class="text-center" width="150"> <a href="<?= site_url('PrestasiFakultas/detail/' . md5($val['id_prestasi'])) ?>">
                                                                <div class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></div>
                                                            </a>
                                                            <a href="<?= site_url('PrestasiFakultas/updateRegisterPrestasi/' . md5($val['id_prestasi'])) ?>">
                                                                <div class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></div>
                                                            </a>
                                                            <a href="<?= site_url('PrestasiFakultas/deletePrestasi/' . ($val['id_prestasi'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                                <i class="fas fa-fw fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php foreach ($prestasi_blmTervalidasi[1] as $val) { ?>
                                                    <tr>
                                                        <td class="a-center ">
                                                            <input type="checkbox" class="flat" name="id_prestasi[]" value="<?= $val['id_prestasi']; ?>">
                                                        </td>
                                                        <td><?= $val['nama_kegiatan']; ?></td>
                                                        <td><?= $val['kota']; ?></td>
                                                        <?php $anggota = $this->M_fakultas->getNamaAnggota($val['id_prestasi'])
                                                        ?>
                                                        <td width="150">
                                                            <ul>
                                                                <?php foreach ($anggota as $row) { ?>
                                                                    <li><?= $row['name']; ?></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </td>
                                                        <td><?= $val['ket_prestasi']; ?></td>
                                                        <td><?= $val['nama_pembimbing']; ?></td>
                                                        <td><?= $val['tahun']; ?></td>
                                                        <td class="text-center" width="250"> <a href="<?= site_url('PrestasiFakultas/detail/' . md5($val['id_prestasi'])) ?>">
                                                                <div class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></div>
                                                            </a>
                                                            <a href="<?= site_url('PrestasiFakultas/updateRegisterKelompok/' . md5($val['id_prestasi'])) ?>">
                                                                <div class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></div>
                                                            </a>
                                                            <a href="<?= site_url('PrestasiFakultas/deletePrestasi/' . ($val['id_prestasi'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                                <i class="fas fa-fw fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary mt-5"><i class="fas fa-fw fa-check-square-o"></i> Validasi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Button trigger modal -->
<div class="modal fade" id="exportData" tabindex="-1" aria-labelledby="exportDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportDataLabel">Export Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('PrestasiFakultas/export'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tahun</label>
                        <select name="export" class="form-control">
                            <option selected="selected">Pilih Tahun</option>
                            <?php
                            $now = date('Y');
                            for ($a = 2015; $a <= $now; $a++) {
                                echo "<option value='$a'>$a</option>";
                            }
                            echo "</select>";
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Export</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="inputData" tabindex="-1" aria-labelledby="inputDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="inputDataLabel">Pilih Kategori Kepesertaan</h5>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url('PrestasiFakultas/registerPrestasi'); ?>" type="button" class="btn btn-block btn-info btn-lg"><i class="nav-icon fas fa-fw fa-user" style="font-size: 100px;"></i>INDIVIDU</a>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('PrestasiFakultas/registerKelompok'); ?>" type="button" class="btn btn-block btn-info btn-lg"><i class="nav-icon fas fa-fw fa-users" style="font-size: 100px;"></i>KELOMPOK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>