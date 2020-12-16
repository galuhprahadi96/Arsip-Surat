<!-- Main Content -->
<div class="main-content">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success'); ?>">
        <?php if ($this->session->flashdata('success')) : ?>
        <?php endif; ?>
        <section class="section">
            <div class="section-header">
                <h1><i class="fa fa-tasks fa-sm"></i> Navigasi</h1>
                <a class="btn btn-dark btn-sm ml-3" data-toggle="modal" data-target="#addNavigasi" href="<?= base_url('fp_admin/navigasi') ?>"><i class="fa fa-plus"></i> Navigasi</a>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Surat Masuk</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>title</th>
                                                <th>icon</th>
                                                <th>url</th>
                                                <th>urutan</th>
                                                <th>Status</th>
                                                <th>x</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            //menampilkan data-->
                                            $no = 1;
                                            foreach ($navigasi as $n) : ?>



                                                <tr>
                                                    <td>
                                                        <?php echo $no++; ?>
                                                    </td>
                                                    <td><?php echo $n['title']; ?></td>
                                                    <td><i class="<?php echo $n['icon']; ?>"></i></td>
                                                    <td> <?php echo $n['url']; ?></td>
                                                    <td><?php echo $n['urutan']; ?></td>

                                                    <?php if ($n['is_active'] == 1) : ?>

                                                        <td>
                                                            <span class="badge badge-success">Active</span>
                                                        </td>
                                                    <?php else : ?>
                                                        <td>
                                                            <span class="badge badge-danger">Non Active</span>
                                                        </td>
                                                    <?php endif; ?>


                                                    <td>
                                                        <a class="btn btn-sm btn-success" href="<?= base_url('admin/navigasi/edit/' . $n['id_subnavigasi']); ?>"><i class="fa fa-edit"></i>Edit</a> |
                                                        <a href="<?= base_url('admin/navigasi/hapus/' . $n['id_subnavigasi']) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                            // end tampil data -->
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End Main Content -->


    <div class="table-responsive">
        <div class="modal fade" id="addNavigasi" tabindex="-1" role="dialog" aria-labelledby="addnavigasi" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnavigasi">Add Navigasi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php base_url('admin/navigasi') ?>" method="post">
                            <div class="form-group">
                                <label>Name navigasi</label><br>
                                <input class="form-control form-control-user" type="text" name="title" id="title" placeholder="title navigasi" required>
                                <?php echo form_error('title') ?>
                            </div>
                            <div class="form-group">
                                <label>Url</label><br>
                                <input class="form-control form-control-user" type="text" name="url" id="url" placeholder="url" required>
                                <?php echo form_error('url') ?>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <select class="form-control form-control-user" name="icon" id="icon" required>
                                    <option>Pilih icon</option>
                                    <option value="fas fa-fw fa-home">Home</option>
                                    <option value="fas fa-fw fa-book">Book</option>
                                    <option value="fas fa-fw fa-cogs">Config</option>
                                    <option value="fas fa-fw fa-user">User</option>
                                    <option value="fas fa-fw fa-building">instansi</option>
                                    <option value="fas fa-fw fa-print">print</option>
                                    <option value="fas fa-fw fa-tasks">navigasi</option>
                                    <option value="fas fa-fw fa-file">file</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-user" name="urutan" id="urutan" required>
                                    <option value="">Select Urutan Menu</option>

                                    <?php

                                    for ($i = 1; $i <= 10; $i++) : ?>

                                        <option value="<?= $i; ?>"><?= $i; ?></option>

                                    <?php endfor; ?>
                                </select>
                            </div>



                            <input class="btn btn-primary" type="submit" value="submit">

                        </form>
                    </div>
                </div>
            </div>