<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fa fa-users fa-sm"></i> Edit Navigasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo site_url('user') ?>">User</a></div>
                <div class="breadcrumb-item">Edit User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="<?php base_url('admin/navigasi/' . $navigasi->id_subnavigasi) ?>" method="post">
                        <div class="form-group col-md-6">
                            <label>Name navigasi</label><br>
                            <input class="form-control form-control-user" type="text" name="title" id="title" value="<?= $navigasi->title; ?>">
                            <?php echo form_error('title') ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Url</label><br>
                            <input class="form-control form-control-user" type="text" name="url" id="url" value="<?= $navigasi->url; ?>">
                            <?php echo form_error('url') ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>icon</label><br>
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
                        <div class="form-group col-md-6">
                            <label for="uruttan">Urutan</label>
                            <select class="form-control form-control-user" name="urutan" id="urutan">
                                <option><?= $navigasi->urutan; ?></option>

                                <?php

                                for ($i = 1; $i <= 10; $i++) : ?>

                                    <option value="<?= $i; ?>"><?= $i; ?></option>

                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="is_active">status</label>
                            <select id="is_active" class="form-control form-control-user" name="is_active">
                                <?php if ($navigasi->is_active == 1) : ?>
                                    <option value="1">Active</option>
                                    <option value="0">Non Active</option>
                                <?php else : ?>
                                    <option value="0">Non Active</option>
                                    <option value="1">Active</option>

                                <?php endif; ?>
                            </select>
                        </div>


                        <input class="btn btn-primary" type="submit" value="submit">

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Main Content -->