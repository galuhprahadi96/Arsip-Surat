<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fa fa-edit fa-sm"></i> Edit Pengajuan Baru</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="<?php base_url('admin/pengajuan/edit_baru/' . $peng_baru->id_pengajuan) ?>" method="post">

                        <div class="row">
                            <div class="col-6">

                                <div class="form-group">
                                    <label>Tanggal Kirim</label>

                                    <input class="form-control" name="tgl_terima" type="date" value="<?= date("d F Y", strtotime($peng_baru->tgl_terima)) ?>" />
                                </div>


                                <div class="form-group">

                                    <label>judul pengajuan</label><br>
                                    <input class="form-control form-control-user" type="text" placeholder="jdl_pengajuan" name="jdl_pengajuan" value="<?= $peng_baru->jdl_pengajuan ?>">




                                    <label>instansi</label>
                                    <select name="id_instansi" class="form-control">
                                        <?php foreach ($instansi as $instansi) { ?>
                                            <option value="<?php echo $instansi['id_instansi'] ?>" <?php if ($peng_baru->id_instansi == $instansi['id_instansi']) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                <?php echo $instansi['nama_instansi'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <div class="form-group">
                                        <label>Keterangan</label><br>
                                        <input class="form-control form-control-user" type="text" placeholder="keterangan" name="keterangan" value="<?= $peng_baru->keterangan ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Penerima Disposisi</label><br>
                                        <input class="form-control form-control-user" type="text" name="pen_disposisi" value="<?= $peng_baru->pen_disposisi ?>">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <button class="btn btn-sm btn-primary" type="submit" value="submit">Edit data</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Main Content -->