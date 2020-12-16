<?= form_open_multipart('admin/user/add'); ?>
<div class="form-group col-md-6">
    <input type="text" name="name" id="name" placeholder="Input Your Name">
    <?= form_error('name'); ?>
</div>
<div class="form-group col-md-6">
    <input type="username" name="username" id="username" placeholder="your username">
    <?= form_error('username'); ?>
</div>
<div class="form-group col-md-6">
    <input type="password" name="password" id="password" placeholder="password">
    <?= form_error('password'); ?>
</div>

<input type="submit" value="submit">
<?= form_close(); ?>