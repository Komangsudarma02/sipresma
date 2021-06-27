<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="col-lg-12">
        <div class="section-title  text-center">
            <h2>Data Prestasi Mahasiswa Undiksha</h2>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card text-black mb-3">
            <div class="card-body">
                <div class="row no-gutters">
                    <div style="overflow-x:auto;">
                        <table id="example2" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th width="250">Nama Mahasiswa</th>
                                    <th width="300">Fakultas</th>
                                    <th>Jenis Prestasi</th>
                                    <th>Tingkat Prestasi</th>
                                    <th>Jenis Juara</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Kota Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($prestasi as $val) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <?php if ($val['kepesertaan'] == 'individu') { ?>
                                            <td width="150"><?= $val['name']; ?></td>
                                        <?php } else { ?>
                                            <?php $anggota = $this->M_prestasi->getNamaAnggota($val['id_prestasi'])
                                            ?>
                                            <td width="150">
                                                <ul>
                                                    <?php foreach ($anggota as $row) { ?>
                                                        <li><?= $row['name']; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </td>
                                        <?php } ?>


                                        <?php if ($val['kepesertaan'] == 'individu') { ?>
                                            <td width="150"><?= $val['nama_fakultas']; ?></td>
                                        <?php } else { ?>
                                            <?php $anggota = $this->M_prestasi->getNamaAnggota($val['id_prestasi'])
                                            ?>
                                            <td width="150">
                                                <ul>
                                                    <?php foreach ($anggota as $row) { ?>
                                                        <li><?= $row['nama_fakultas']; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </td>
                                        <?php } ?>
                                        <td><?= $val['nama_jenis']; ?></td>
                                        <td><?= $val['nama_tingkat']; ?></td>
                                        <td><?= $val['nama_jenis_juara']; ?></td>
                                        <td><?= $val['nama_kegiatan']; ?></td>
                                        <td><?= $val['kota']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End About Us Section -->
</main><!-- End #main -->


<script>
    $(function() {
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
            'pageLength': 10,
            // "scrollX": "100%",
            // 'scrollCollapse': true,
        });
    });
</script>