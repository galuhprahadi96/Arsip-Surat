<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fa fa-print fa-sm"></i> Laporan</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url('admin/laporan/cari') ?>">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><i class="fas fa-building"></i> Pilih instansi </label>
                                    <select class="form-control form-control-user" name="nama_instansi" id="nama_instansi">
                                        <option value=""> Pilih Intansi </option>
                                        <?php foreach ($instansi as $i) : ?>
                                            <option value="<?= $i['nama_instansi'] ?>"><?= $i['nama_instansi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar"></i> Dari Tanggal</label>
                                    <input type="date" name="tanggal_awal" class="form-control">
                                    <span class="text-danger"><?php echo form_error('tanggal_awal'); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><i class="fas fa-calendar-alt"></i> Sampai Tanggal</label>
                                    <input type="date" name="tanggal_akhir" class="form-control">
                                    <span class="text-danger"><?php echo form_error('tanggal_akhir'); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-search"></i> Tampilkan</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">

                                    <a href="<?= base_url('admin/laporan') ?>" class="btn btn-primary btn-block"><i class="fas fa-exit"></i> Reset Data</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>