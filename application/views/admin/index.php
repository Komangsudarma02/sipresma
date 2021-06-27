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
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?= $ftk; ?></h3>

                            <p>FTK</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?= $fmipa; ?></h3>

                            <p>FMIPA</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3><?= $fe; ?></h3>

                            <p>FE</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <h3><?= $fip; ?></h3>

                            <p>FIP</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?= $fbs; ?></h3>

                            <p>FBS</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?= $fok; ?></h3>

                            <p>FOK</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h3><?= $fhis; ?></h3>

                            <p>FHIS</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3><?= $fk; ?></h3>

                            <p>FK</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-fw fa-trophy"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Prestasi Mahasiswa Undiksha</h3>
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
                                            <td><?= $val['nama_fakultas']; ?></td>
                                            <td><?= $val['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Jenis Juara Mahasiswa Undiksha</h3>
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


                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Tingkat Prestasi Mahasiswa Undiksha</h3>
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
                            <h3 class="card-title">Statistik Jenis Prestasi Mahasiswa Undiksha</h3>
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
            </div>
        </div>
    </section>
</div>