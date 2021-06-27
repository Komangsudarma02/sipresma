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
                        <form role="form" id="quickForm" action="<?= site_url('Menu/save_register_submenu'); ?>" method="POST">
                            <input type="hidden" name="id_sub" value="<?= (isset($id_sub['id_sub'])) ? md5($id_sub['id_sub']) : ''; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Sub Menu Title" value="<?= (isset($id_sub['title'])) ? ($id_sub['title']) : ''; ?>">
                                </div>
                                <small class="text-danger"><?= form_error('title'); ?></small>


                                <div class="form-group">
                                    <label>Menu</label>
                                    <select class="form-control" name="id_menu">
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
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
</div>