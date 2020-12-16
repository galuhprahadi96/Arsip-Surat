<!-- Main Content -->
<div class="main-content">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success'); ?>">
        <?php if ($this->session->flashdata('success')) : ?>
        <?php endif; ?>
        <section class="section">
            <div class="section-header">
                <h1><i class="fa fa-building fa-sm"></i> Instansi</h1>
                <a class="btn btn-dark btn-sm ml-3" data-toggle="modal" data-target="#addinstansi" href="<?= base_url('admin/instansi') ?>"><i class="fa fa-plus"></i> Instansi</a>
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
                                                <th>nama instansi</th>
                                                <th>alamat</th>
                                                <th>x</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($instansi as $i) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $i['nama_instansi'] ?></td>
                                                    <td><?= $i['alamat'] ?></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/instansi/edit/' . $i['id_instansi']) ?>"><i class="fa fa-edit"></i>Edit</a> |
                                                        <a href="<?php echo site_url('admin/instansi/hapus/' . $i['id_instansi']) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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
        <div class="modal fade" id="addinstansi" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addinstansi">Data Instansi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php base_url('admin/instansi') ?>" method="post">
                            <div class="form-group">
                                <label>Name Instansi</label><br>
                                <input class="form-control form-control-user" type="text" name="nama_instansi" id="nama_instansi" placeholder="nama instansi" required>
                                <?php echo form_error('nama_instansi') ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label><br>
                                <textarea class="form-control form-control-user" type="text" name="alamat" id="alamat" placeholder="alamat"></textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" value="submit">

                        </form>
                    </div>
                </div>
            </div>