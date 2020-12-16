<!-- Main Content -->
<div class="main-content">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success'); ?>">
        <?php if ($this->session->flashdata('success')) : ?>
        <?php endif; ?>
        <section class="section">
            <div class="section-header">
                <h1><i class="fa fa-home fa-sm"></i> Dashboard</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="hero bg-dark text-white">
                            <div class="hero-inner">
                                <h5><?php echo strtoupper("Selamat datang " . $userdata['name']); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="far fa-paper-plane"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header text-center">
                                    <h4 class="text-dark">Pengajuan Baru</h4>
                                </div>
                                <div class="card-body text-center">
                                    <?= count($proses) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header text-center">
                                    <h4 class="text-dark">Total Pengajuan</h4>
                                </div>
                                <div class="card-body text-center">
                                    <?= count($pengajuan) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Main Content -->