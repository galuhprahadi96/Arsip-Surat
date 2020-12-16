<!-- Main Content -->
<div class="main-content">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success'); ?>">
        <?php if ($this->session->flashdata('success')) : ?>
        <?php endif; ?>
        <section class="section">
            <div class="section-header">
                <h1><i class="fa fa-file fa-sm"></i> Data Pengajuan</h1>
            </div>

            <?php include 'cari.php' ?>

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
                                                <th>Tanggal Terima</th>
                                                <th>Judul Pengajuan</th>
                                                <th>Instansi</th>
                                                <th>Keterangan</th>
                                                <th>Penerima Disposisi</th>
                                                <th>Tanggal Naik</th>
                                                <th>Status</th>
                                                <th>SK Turun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($pengajuan as $p) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date("d F Y", strtotime($p['tgl_terima'])); ?></td>
                                                    <td><?= $p['jdl_pengajuan']; ?></td>
                                                    <td><?= $p['nama_instansi']; ?></td>
                                                    <td><?= $p['keterangan']; ?></td>
                                                    <td><?= $p['pen_disposisi']; ?></td>
                                                    <td><?= date("d F Y", strtotime($p['tgl_naik'])); ?></td>

                                                    <?php if ($p['status'] == 3) : ?>

                                                        <td>
                                                            <span class="badge badge-danger">Proses</span>
                                                        </td>

                                                    <?php else : ?>

                                                        <td><span class="badge badge-success">Naik</span></td>
                                                        <td>
                                                            <?php
                                                                    $terima = new DateTime($p['tgl_terima']);
                                                                    $naik   = new DateTime($p['tgl_naik']);
                                                                    $diff = $naik->diff($terima);
                                                                    echo $diff->d;
                                                                    echo " hari";
                                                                    ?>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td>
                                                        <a class="btn btn-sm btn-success" href="<?= base_url('admin/pengajuan/edit/' . $p['id_pengajuan']); ?>"><i class="fa fa-edit"></i>Edit</a>

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