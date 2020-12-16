<!-- Main Content -->
<div class="main-content">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success'); ?>">
        <?php if ($this->session->flashdata('success')) : ?>
        <?php endif; ?>
        <section class="section">
            <div class="section-header">
                <h1><i class="fa fa-file fa-sm"></i> Data Pengajuan</h1>
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
                                                <th>Tanggal Terima</th>
                                                <th>Judul Pengajuan</th>
                                                <th>Instansi</th>
                                                <th>Keterangan</th>
                                                <th>Penerima Disposisi</th>
                                                <th>Tanggal Naik</th>
                                                <th>Status</th>
                                                <th>SK Turun</th>
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

                                                    <?php if ($p['status'] == 3) : ?>
                                                        <td></td>

                                                        <td>
                                                            <span class="badge badge-danger">Proses</span>
                                                        </td>
                                                        <td></td>



                                                    <?php else : ?>

                                                        <td><?= date("d F Y", strtotime($p['tgl_naik'])); ?></td>

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