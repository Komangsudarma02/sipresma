<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" action="<?= site_url('PrestasiFakultas/' . $form . '/' . md5($id_prestasi['id_prestasi'])); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="id_prestasi" name="id_prestasi" value="<?= $id_prestasi['id_prestasi']; ?>">
                            <div id="profile" class="frm">
                                <fieldset>
                                    <?php $this->load->view($kategori); ?>


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Pembimbing</label>
                                            <select class="form-control id_pembimbing" name="id_pembimbing">
                                                <?php
                                                foreach ($nama_pembimbing as $val) { ?>
                                                    <option <?= ($id_prestasi['id_pembimbing'] == $val['id_pembimbing']) ? 'selected' : ''; ?> value="<?= ($val['id_pembimbing']); ?>"><?= $val['nama_pembimbing']; ?></option> <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Kegiatan</label>
                                            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Masukan Nama Kegiatan" value="<?= $id_prestasi['nama_kegiatan']; ?>">
                                        </div>
                                        <small class="text-danger"><?= form_error('nama_kegiatan'); ?></small>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kota Kegiatan</label>
                                            <input type="text" name="kota" class="form-control" id="kota" placeholder="Masukan Kota Kegiatan" value="<?= $id_prestasi['kota']; ?>">
                                        </div>
                                        <small class="text-danger"><?= form_error('kota'); ?></small>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Dana</label>
                                            <input type="number" name="jml_dana" class="form-control" id="jml_dana" placeholder="Masukan Jumlah Dana Kegiatan" value="<?= $id_prestasi['jml_dana']; ?>">
                                        </div>
                                        <small class="text-danger"><?= form_error('jml_dana'); ?></small>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tahun</label>
                                            <input type="tahun" name="tahun" class="form-control" id="tahun" placeholder="Masukan Tahun Kegiatan" value="<?= $id_prestasi['tahun']; ?>">
                                        </div>
                                        <small class="text-danger"><?= form_error('tahun'); ?></small>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div id="prestasi" class="frm">
                                <fieldset>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Jenis Prestasi</label>
                                            <select class="form-control" name="id_jenis">
                                                <?php
                                                foreach ($nama_jenis as $val) { ?>
                                                    <option <?= ($id_prestasi['id_jenis'] == $val['id_jenis']) ? 'selected' : ''; ?> value="<?= ($val['id_jenis']); ?>"><?= $val['nama_jenis']; ?></option> <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tingkat Prestasi</label>
                                            <select class="form-control" name="id_tingkat">
                                                <?php
                                                foreach ($nama_tingkat as $val) { ?>
                                                    <option <?= ($id_prestasi['id_tingkat'] == $val['id_tingkat']) ? 'selected' : ''; ?> value="<?= ($val['id_tingkat']); ?>"><?= $val['nama_tingkat']; ?></option> <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Jenis Juara</label>
                                            <select class="form-control" name="id_jenis_juara">
                                                <?php
                                                foreach ($nama_jenis_juara as $val) { ?>
                                                    <option <?= ($id_prestasi['id_jenis_juara'] == $val['id_jenis_juara']) ? 'selected' : ''; ?> value="<?= ($val['id_jenis_juara']); ?>"><?= $val['nama_jenis_juara']; ?></option> <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Mulai</label>
                                            <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" placeholder="Masukan Tanggal Mulai" value="<?= $id_prestasi['tgl_mulai']; ?>">
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Selesai</label>
                                            <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" placeholder="Masukan Tanggal Selesai" value="<?= $id_prestasi['tgl_selesai']; ?>">
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Masukan File Prestasi</label>
                                            <div class="custom-file">
                                                <input type="file" id="presma" name="prestasi" onchange="previewFile()" class="custom-file-input">
                                                <label class="custom-file-label" for="presma"><?= $id_prestasi['file_prestasi']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="old_prestasi" id="old_prestasi" value="<?= $id_prestasi['file_prestasi']; ?>">


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Keterangan Prestasi</label>
                                            <textarea class="form-control" name="ket_prestasi" id="ket_prestasi" rows="3" placeholder="Masukan Keterangan Prestasi"><?= $id_prestasi['ket_prestasi']; ?></textarea>
                                        </div>
                                        <small class="text-danger"><?= form_error('ket_prestasi'); ?></small>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-secondary back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                            <button class="btn btn-primary" type="submit">Submit </button>
                                            <img src="spinner.gif" alt="" id="loader" style="display: none">
                                        </div>
                                    </div>

                                    <hr>
                                    <center>
                                        <h2 class="label-filePdf">File Prestasi</h2><br>
                                        <embed type="application/pdf" src="<?= base_url('upload/prestasi/' . $id_prestasi['file_prestasi']); ?>" width="800" height="500" class="file-preview"></embed>
                                    </center>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    jQuery().ready(function() {
        $("#prestasi").hide();

        // Binding next button on second step
        $(".open2").click(function() {

            $(".frm").hide("slow");
            $("#prestasi").show("slow");

        });
        // Binding back button on second step
        $(".back3").click(function() {
            $(".frm").hide("slow");
            $("#profile").show("slow");
        });

    });

    $(".id_user").select2({
        minimumInputLength: 3,
        allowClear: true,
        placeholder: 'search mahasiswa',
        theme: 'bootstrap4',
        ajax: {
            url: "<?php echo base_url(); ?>PrestasiFakultas/findMahasiswa",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    id_user: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
    $(".id_pembimbing").select2({
        minimumInputLength: 3,
        allowClear: true,
        placeholder: 'search pembimbing',
        theme: 'bootstrap4',
        ajax: {
            url: "<?php echo base_url(); ?>PrestasiFakultas/findPembimbing",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    id_pembimbing: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
</script>