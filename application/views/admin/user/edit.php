<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fa fa-users fa-sm"></i> Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('admin/user') ?>">User</a></div>
                <div class="breadcrumb-item">Edit User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?= form_open('admin/user/edit/' . $user->id_user); ?>
                    <div class="form-group col-md-6">
                        <label for="name">nama anda</label>
                        <input class="form-control form-control-user" type="text" name="name" id="name" value="<?= $user->name; ?>">
                        <?= form_error('name'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input class="form-control form-control-user" type="username" name="username" id="username" value="<?= $user->username; ?>">
                        <?= form_error('username'); ?>
                    </div>
                    <div class=" form-group col-md-6">
                        <label for="password">Password</label>
                        <input class="form-control form-control-user" type="password" name="password" id="password" value="<?= password_verify($user->password, PASSWORD_DEFAULT) ?>">
                        <?= form_error('password'); ?>
                    </div>


                    <div class=" form-group col-md-6">
                        <input class="btn btn-primary" type="submit" value="submit">
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Main Content -->