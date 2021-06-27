<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                    <div class="row">
                        <div class="col-lg-8 mt-2">
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('/upload/profile/') . $user['image'] ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['name']; ?></h3>

                            <p class="text-muted text-center"><?= $user['role']; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <strong><i class="fas fa-envelope"></i></strong> <a class="float-right"><?= $user['email']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <strong><i class="fa fa-calendar"></i></strong><a class="float-right">&ensp;<small>since</small> <?= date('d F Y', $user['date_created']); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">My Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit Profile</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <h3 class="timeline-header border-0"><a><?= $user['name']; ?></a>
                                                </h3>
                                            </div>
                                        </div>

                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <h3 class="timeline-header"><a><?= $user['email']; ?></a></h3>
                                            </div>
                                        </div>

                                        <div>
                                            <i class="fas fa-user-graduate bg-success"></i>

                                            <div class="timeline-item">

                                                <h3 class="timeline-header"><a><?= $user['role']; ?></a></h3>

                                            </div>
                                        </div>

                                        <div>
                                            <i class="fas fa-clock bg-grey"></i>

                                            <div class="timeline-item">

                                                <h3 class="timeline-header"><a><?= date('d F Y', $user['date_created']); ?></a></h3>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="edit">
                                    <?= form_open_multipart('user/edit'); ?>
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                                <small class="text-danger"><?= form_error('name'); ?></small>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Picture</label>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img src="<?= base_url('upload/profile/') . $user['image']; ?>" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                            <label class="custom-file-label" for="image">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
            </div>
        </div>
    </section>
</div>