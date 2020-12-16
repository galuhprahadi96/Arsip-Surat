<?php foreach ($konfig as $konfig) : ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="Setda">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/admin/upload/instansi_logo/' . $konfig['logo']) ?>" sizes="32x32" />
    <title><?= $title ?> - <?= $konfig['nama_institusi'] ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/modules/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/modules/fontawesome/css/all.min.css') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/modules/datatables/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/modules/select2/dist/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/modules/jquery-selectric/selectric.css') ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/components.css') ?>">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/mycss.css') ?>">
  </head>

  <body class="layout-3">
    <div id="app">
      <div class="main-wrapper container">
        <div class="navbar-bg bg-dark"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <div class="container">
            <a href="<?php echo site_url('dashboard') ?>" class="navbar-brand sidebar-gone-hide mt-1">
              <img width="100" src="<?php echo base_url('assets/admin/upload/instansi_logo/' . $konfig['logo']) ?>"> <?= $konfig['nama_institusi'] ?>
            </a>
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars mt-3"></i></a>
            <form class="form-inline ml-auto">
            </form>
            <ul class="navbar-nav navbar-right">
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                  <div class="d-sm-none d-lg-inline-block">Hi, <?= $userdata['name']; ?></div>
                </a>


                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="<?= base_url('admin/user') ?>" class="dropdown-item has-icon text-dark">
                      <i class="fas fa-user"></i> User
                    </a></li>
                  <li><a href="<?= base_url('admin/navigasi') ?>" class="dropdown-item has-icon text-dark">
                      <i class="fas fa-tasks"></i> Navigasi
                    </a></li>
                  <li><a href="<?= base_url('admin/konfigurasi') ?>" class="dropdown-item has-icon text-dark">
                      <i class="fas fa-cogs"></i> Konfigurasi
                    </a></li>
                  <hr>
                  <li><a href="<?= base_url('login/logout') ?>" class="dropdown-item has-icon text-dark">
                      <i class="fas fa-sign-out-alt"></i> Logout
                    </a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      <?php endforeach; ?>