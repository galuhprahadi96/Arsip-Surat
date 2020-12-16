<!-- Main Content -->
<div class="main-content">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success'); ?>">
        <?php if ($this->session->flashdata('success')) : ?>
        <?php endif; ?>
        <section class="section">
            <div class="section-header">
                <h1><i class="fa fa-cogs fa-sm"></i> Konfigurasi</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('admin/konfigurasi/simpan_konfig/' . $detail->id) ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-info"></i>Nama Website</label>
                                        <input class="form-control" type="text" name="title" id="title" value="<?= $detail->title_website; ?>">
                                        <?php echo form_error('title') ?>
                                    </div>


                                    <div class="form-group">
                                        <label><i class="fas fa-globe"></i> about</label>
                                        <input type="text" name="about" class="form-control" value="<?= $detail->about; ?>">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-id-card"></i> Nama Institusi</label>
                                        <input type="text" name="institusi" class="form-control" value="<?= $detail->nama_institusi; ?>">
                                        <?php echo form_error('institusi') ?>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-envelope"></i>Email</label>
                                        <input class="form-control" type="text" name="contact" id="contact" value="<?= $detail->contact; ?>">
                                        <?php echo form_error('contact') ?>
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fas fa-map-marker-alt"></i> Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="<?= $detail->alamat; ?>">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label><i class="fas fa-image"></i> Upload Logo Instansi</label>
                                        <span class="ml-1"><img src="<?php echo base_url('assets/admin/upload/instansi_logo/' . $detail->logo) ?>" width="64"></span>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-check"></i> Simpan</button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <a href="<?php echo site_url('dashboard') ?>" class="btn btn-dark btn-block"><i class="fas fa-times"></i> Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Main Content -->