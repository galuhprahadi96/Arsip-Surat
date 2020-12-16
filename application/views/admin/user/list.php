<div class="main-content">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success'); ?>">
        <?php if ($this->session->flashdata('success')) : ?>
        <?php endif; ?>
        <section class="section">
            <div class="section-header">
                <h1><i class="fa fa-users fa-sm"></i> Manajemen User</h1>
                <a class="btn btn-dark btn-sm ml-3" data-toggle="modal" data-target="#adduser" href="<?= base_url('admin/user') ?>"><i class="fa fa-plus"></i> user</a>

            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>username</th>
                                        <th>x</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $p) : ?>
                                        <tr>
                                            <td><?= $p['name']; ?></td>
                                            <td><?= $p['username']; ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="<?= base_url('admin/user/edit/' . $p['id_user']);  ?>"><i class="fa fa-edit">|Edit</i></a>|
                                                <a href="<?= base_url('admin/user/delete/' . $p['id_user']) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Main Content -->

    <div class="table-responsive">
        <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="addnavigasi" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnavigasi">Add Navigasi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <?= form_open_multipart('admin/user'); ?>
                        <div class="form-group col-md-6">
                            <label for="name">nama anda</label>
                            <input class="form-control form-control-user" type="text" name="name" id="name" placeholder="Input Your Name" required>
                            <?= form_error('name'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input class="form-control form-control-user" type="username" name="username" id="username" placeholder="your username" required>
                            <?= form_error('username'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input class="form-control form-control-user" type="password" name="password" id="password" placeholder="password" required>
                            <?= form_error('password'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <input class="btn btn-primary" type="submit" value="submit">
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>