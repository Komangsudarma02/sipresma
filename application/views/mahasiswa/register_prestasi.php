<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                        <form role="form" id="quickForm" action="<?= site_url('Mahasiswa/' . $form); ?>" method="POST" enctype="multipart/form-data">
                            <div id="profile" class="frm">
                                <fieldset>
                                    <?php $this->load->view($kategori); ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Pembimbing</label>
                                            <select class="form-control id_pembimbing " name="id_pembimbing" data-placeholder="Masukkan Nama Pembimbing" style="width: 100%;"></select>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Kegiatan</label>
                                            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Masukan Nama Kegiatan">
                                        </div>
                                        <small class="text-danger"><?= form_error('nama_kegiatan'); ?></small>
                                    </div>


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kota Kegiatan</label>
                                            <input type="text" name="kota" class="form-control" id="kota" placeholder="Masukan Kota Kegiatan">
                                        </div>
                                        <small class="text-danger"><?= form_error('kota'); ?></small>
                                    </div>


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Dana</label>
                                            <input type="number" name="jml_dana" class="form-control" id="jml_dana" placeholder="Masukan Jumlah Dana Kegiatan">
                                        </div>
                                        <small class="text-danger"><?= form_error('jml_dana'); ?></small>
                                    </div>




                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tahun</label>
                                            <input type="number" name="tahun" class="form-control" id="tahun" placeholder="Masukan Tahun Kegiatan">
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
                                                    <option value="<?= $val['id_jenis']; ?>"><?= $val['nama_jenis']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tingkat Prestasi</label>
                                            <select class="form-control" name="id_tingkat">
                                                <?php
                                                foreach ($nama_tingkat as $val) { ?>
                                                    <option value="<?= $val['id_tingkat']; ?>"><?= $val['nama_tingkat']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Jenis Juara</label>
                                            <select class="form-control" name="id_jenis_juara">
                                                <?php
                                                foreach ($nama_jenis_juara as $val) { ?>
                                                    <option value="<?= $val['id_jenis_juara']; ?>"><?= $val['nama_jenis_juara']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Mulai</label>
                                            <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" placeholder="Masukan Tanggal Mulai">
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Selesai</label>
                                            <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" placeholder="Masukan Tanggal Selesai">
                                        </div>
                                    </div>




                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Masukan File Prestasi</label>
                                            <div class="custom-file">
                                                <input type="file" id="presma" name="prestasi" onchange="previewFile()" class="custom-file-input">
                                                <label class="custom-file-label" for="prestasi">Choose file</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Keterangan Bidang Prestasi</label>
                                            <textarea class="form-control" name="ket_prestasi" id="ket_prestasi" rows="3" placeholder="Masukan Keterangan Prestasi"></textarea>
                                        </div>
                                        <small class="text-danger"><?= form_error('ket_prestasi'); ?></small>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-secondary back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                            <button class="btn btn-primary" type="submit">Submit </button>
                                        </div>
                                    </div>

                                    <hr>
                                    <center>
                                        <h2 class="label-filePdf" hidden> File Prestasi </h2><br>
                                        <embed type="application/pdf" hidden src="" width="800" height="500" class="file-preview"></embed>
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
        // Binding next button on first step
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
            url: "<?php echo base_url(); ?>Mahasiswa/findMahasiswa",
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
        placeholder: 'search nama pembimbing',
        theme: 'bootstrap4',
        ajax: {
            url: "<?php echo base_url(); ?>Mahasiswa/findPembimbing",
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