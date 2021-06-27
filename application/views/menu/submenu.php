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
                            <a><button type="button" class="btn btn-block btn-primary tombolTambahData" data-toggle="modal" data-target="#dataSubMenu"><i class="fas fa-folder-plus"></i> Tambah Data</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sub'); ?>"></div>
                                <?php if ($this->session->flashdata('sub')) : ?>
                                <?php endif; ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Menu</th>
                                        <th>Url</th>
                                        <th>Icon</th>
                                        <th>Active</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($submenu as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $val['title']; ?></td>
                                            <td><?= $val['menu']; ?></td>
                                            <td><?= $val['url']; ?></td>
                                            <td><?= $val['icon']; ?></td>
                                            <td><?= $val['is_active']; ?></td>
                                            <td class="text-center" width="150"><a>
                                                    <div class="btn btn-sm btn-primary tampilSubUbah" data-toggle="modal" data-target="#dataSubMenu" data-id="<?= $val['id_sub']; ?>"><i class="fas fa-fw fa-edit"></i></div>
                                                </a>
                                                <a href="<?= site_url('Menu/delete_submenu/' . ($val['id_sub'])); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                    <i class="fas fa-fw fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
<div class="modal fade" id="dataSubMenu" tabindex="-1" aria-labelledby="dataSubMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataSubMenuLabel">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Menu/submenu'); ?>" method="post">
                    <input type="hidden" name="id_sub" id="id_sub">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Sub Menu Title" value="<?= (isset($id_sub['title'])) ? ($id_sub['title']) : ''; ?>">
                    </div>
                    <small class="text-danger"><?= form_error('title'); ?></small>


                    <div class="form-group">
                        <label>Menu</label>
                        <select class="form-control" name="id_menu" id="id_menu">
                            <option value=""> Select Menu </option>
                            <?php
                            foreach ($menu as $val) { ?>
                                <option value="<?= $val['id_menu']; ?>"><?= $val['menu']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Url</label>
                        <input type="text" name="url" class="form-control" id="url" placeholder="Sub Menu Url" value="<?= (isset($id_sub['url'])) ? ($id_sub['url']) : ''; ?>">
                    </div>
                    <small class="text-danger"><?= form_error('url'); ?></small>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Icon</label>
                        <input type="text" name="icon" class="form-control" id="icon" placeholder="Sub Menu icon" value="<?= (isset($id_sub['icon'])) ? ($id_sub['icon']) : ''; ?>">
                    </div>
                    <small class="text-danger"><?= form_error('icon'); ?></small>


                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Acvtive?
                            </label>
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
        $('#title').val("");
        $('#url').val("");
        $('#icon').val("");
        $('#dataSubMenuLabel').html('Tambah Data Sub Menu');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilSubUbah').on('click', function() {
        $('#dataSubMenuLabel').html('Edit Data Sub Menu');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', '<?= base_url('Menu/save_update_submenu') ?>');

        const id_sub = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Menu/getUbahSubmenu') ?>',
            data: {
                id_sub: id_sub
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_sub').val(data.id_sub);
                $('#title').val(data.title);
                $('#id_menu').val(data.id_menu);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                $('#is_active').val(data.is_active);

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