<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class12"col-sm-12">
                    <h1>
                        <?= $title ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="conten">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Prestasi Mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <?php if ($prestasi['kepesertaan'] == 'individu') { ?>
                                    <label>Nama :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-fw fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['name']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonNama">
                                    </div>
                                <?php } else { ?>
                                    <?php $anggota = $this->M_prestasi->getNamaAnggota($prestasi['id_prestasi'])
                                    ?>
                                    <label>Nama Kelompok :</label>
                                    <?php foreach ($anggota as $row) { ?>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="nav-icon fas fa-fw fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $row['name']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonNama">
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Nama Pembimbing :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-user-tie"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['nama_pembimbing']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonPembimbing">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kegiatan Prestasi :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-file"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['nama_kegiatan']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonKegiatan">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kota Kegiatan :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-building"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['kota']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonKota">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Dana :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-hand-holding-usd"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="Rp. <?= $prestasi['jml_dana']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonDana">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tahun :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-calendar-week"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['tahun']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonTahun">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jenis Prestasi :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-file"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['nama_jenis']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonJenis">
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Tingkat Prestasi :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-award"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['nama_tingkat']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonTingkat">
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Jenis Juara :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-medal"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['nama_jenis_juara']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonJenisJuara">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Mulai :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['tgl_mulai']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonMulai">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Selesai :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prestasi['tgl_selesai']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonSelesai">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan Prestasi :</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-fw fa-pencil-alt"></i></span>
                                    </div>
                                    <textarea name="" id="" class="form-control" style="background: rgba(233, 236, 239, 0.307);" aria-label="Input group example" rows="5" aria-describedby="btnGroupAddonKeterangan" readonly><?= $prestasi['ket_prestasi']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Dokumen Prestasi Mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <iframe src="<?= base_url('upload/prestasi/' . $prestasi['file_prestasi']); ?>" width="100%" height="750" frameborder="0"></iframe>
                                </div>
                            </div>
                            <!-- /.form group -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </section>
</div>