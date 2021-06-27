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
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $data_user; ?></h3>

                            <p>Data User</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-user"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?= $data_prestasi; ?></h3>

                            <p>Data Prestasi</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Prestasi Mahasiswa Individu Per Tahun <i class="nav-icon fas fa-fw fa-user"></i></h3>
                        </div>
                        <div class="card-body">
                            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                                <thead>
                                    <tr>
                                        <th>Fakultas</th>
                                        <th data-graph-stack-group="1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($prestasi as $val) { ?>
                                        <tr>
                                            <td><?= $val['tahun']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Prestasi Mahasiswa Kelompok Per Tahun <i class="nav-icon fas fa-fw fa-users"></i></h3>
                        </div>
                        <div class="card-body">
                            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                                <thead>
                                    <tr>
                                        <th>Fakultas</th>
                                        <th data-graph-stack-group="1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kelompok as $val) { ?>
                                        <tr>
                                            <td><?= $val['tahun']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Jenis Juara Individu Mahasiswa <i class="nav-icon fas fa-fw fa-user"></i></h3>
                        </div>
                        <div class="card-body">
                            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                                <thead>
                                    <tr>
                                        <th>Fakultas</th>
                                        <th data-graph-stack-group="1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jenis_juara as $val) { ?>
                                        <tr>
                                            <td><?= $val['nama_jenis_juara']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Jenis Juara Kelompok Mahasiswa <i class="nav-icon fas fa-fw fa-users"></i></h3>
                        </div>
                        <div class="card-body">
                            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                                <thead>
                                    <tr>
                                        <th>Fakultas</th>
                                        <th data-graph-stack-group="1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jenis_juara_kelompok as $val) { ?>
                                        <tr>
                                            <td><?= $val['nama_jenis_juara']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Tingkat Prestasi Individu Mahasiswa <i class="nav-icon fas fa-fw fa-user"></i></h3>
                        </div>
                        <div class="card-body">
                            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                                <thead>
                                    <tr>
                                        <th>Tingkat</th>
                                        <th data-graph-stack-group="1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tingkat as $val) { ?>
                                        <tr>
                                            <td><?= $val['nama_tingkat']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Tingkat Prestasi Kelompok Mahasiswa <i class="nav-icon fas fa-fw fa-users"></i></h3>
                        </div>
                        <div class="card-body">
                            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                                <thead>
                                    <tr>
                                        <th>Tingkat</th>
                                        <th data-graph-stack-group="1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tingkat_kelompok as $val) { ?>
                                        <tr>
                                            <td><?= $val['nama_tingkat']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Jenis Prestasi Individu Mahasiswa <i class="nav-icon fas fa-fw fa-user"></i></h3>
                        </div>
                        <div class="card-body">
                            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                                <thead>
                                    <tr>
                                        <th>Tingkat</th>
                                        <th data-graph-stack-group="1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jenis as $val) { ?>
                                        <tr>
                                            <td><?= $val['nama_jenis']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Jenis Prestasi Kelompok Mahasiswa <i class="nav-icon fas fa-fw fa-users"></i></h3>
                        </div>
                        <div class="card-body">
                            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                                <thead>
                                    <tr>
                                        <th>Tingkat</th>
                                        <th data-graph-stack-group="1">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jenis_kelompok as $val) { ?>
                                        <tr>
                                            <td><?= $val['nama_jenis']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
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