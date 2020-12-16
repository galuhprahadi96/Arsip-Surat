<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fa fa-edit fa-sm"></i> Edit Instansi</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="<?php base_url('admin/instansi/edit' . $instansi->id_instansi); ?>" method="post">

                        <div class="form-group col-md-6">
                            <label>Name Instansi</label><br>
                            <input class="form-control form-control-user" type="text" name="nama_instansi" id="nama_instansi" value="<?= $instansi->nama_instansi; ?>" required>
                            <?php echo form_error('nama_instansi') ?>

                            <label>Alamat</label><br>
                            <textarea class="form-control form-control-user" type="text" name="alamat" id="alamat"><?= $instansi->alamat; ?></textarea>
                        </div>
                </div>

                <div class=" form-group col-md-6">
                    <input class="btn btn-primary" type="submit" value="submit">
                </div>
                </form>
            </div>
        </div>
</div>
</section>
</div>
<!-- Main Content -->