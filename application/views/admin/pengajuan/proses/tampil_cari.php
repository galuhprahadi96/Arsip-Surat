<!-- Main Content -->
<div class="main-content">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success'); ?>">
        <?php if ($this->session->flashdata('success')) : ?>
        <?php endif; ?>
        <section class="section">
            <div class="section-header">
                <h1><i class="fa fa-paper-plane fa-sm"></i> Pengajuan Baru</h1>
                <a class="btn btn-dark btn-sm ml-3" data-toggle="modal" data-target="#addPengajuan" href="<?= base_url('admin/pengajuan/baru') ?>"><i class="fa fa-plus"></i> Tambah</a>
            </div>

            <?php include "cari.php" ?>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Pengajuan</th>
                                                <th>Instansi</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Terima</th>
                                                <th>Penerima Disposisi</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($cari as $p) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date("d F Y", strtotime($p['tgl_terima'])); ?></td>
                                                    <td><?= $p['jdl_pengajuan']; ?></td>
                                                    <td><?= $p['nama_instansi']; ?></td>
                                                    <td><?= $p['keterangan']; ?></td>
                                                    <td><?= $p['pen_disposisi']; ?></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/pengajuan/proses/' . $p['id_pengajuan']); ?>"><i class="fa fa-recycle"></i> proses</a>

                                                        <a class="btn btn-sm btn-success" href="<?= base_url('admin/pengajuan/edit_baru/' . $p['id_pengajuan']); ?>"><i class="fa fa-edit"></i>Edit</a>

                                                        <a href="<?= base_url('admin/pengajuan/hapus/' . $p['id_pengajuan']) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>

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
        <div class="modal fade" id="addPengajuan" tabindex="-1" role="dialog" aria-labelledby="addPengajuan" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnavigasi">Tambah Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php base_url('admin/pengajuan/baru') ?>" method="post">
                            <div class="form-group">
                                <label>Tanggal Terima</label><br>
                                <input class="form-control form-control-user" type="date" placeholder="tgl_terima" name="tgl_terima">
                                <?php echo form_error('tgl_terima') ?>
                            </div>
                            <div class="form-group">
                                <label>judul pengajuan</label><br>
                                <input class="form-control form-control-user" type="text" placeholder="judul pengajuan" name="jdl_pengajuan">
                                <?php echo form_error('jdl_pengajuan') ?>
                            </div>
                            <div class="form-group">
                                <label>Name Instansi</label><br>
                                <select class="form-control form-control-user" name="id_instansi" id="id_instansi">
                                    <option> Pilih Intansi </option>
                                    <?php foreach ($instansi as $i) : ?>
                                        <option value="<?= $i['id_instansi'] ?>"><?= $i['nama_instansi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_instansi') ?>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label><br>
                                <input class="form-control form-control-user" type="text" placeholder="keterangan" name="keterangan">
                                <?php echo form_error('keterangan') ?>
                            </div>
                            <div class="form-group">
                                <label>Penerima Disposisi</label><br>
                                <input class="form-control form-control-user" type="text" placeholder="nama penerima" name="pen_disposisi">
                                <?php echo form_error('jdl_pengajuan') ?>
                            </div>

                            <button class="btn btn-sm btn-primary" type="submit" value="submit">Tambah</button>

                        </form>
                    </div>
                </div>
            </div>