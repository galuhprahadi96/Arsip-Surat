<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><i class="fa fa-edit fa-sm"></i> Proses Pengajuan</h1>

        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="<?php base_url('admin/pengajuan/edit') ?>" method="post">

                        <div class="row">
                            <div class="col-6">
                                <fieldset disabled="disabled">
                                    <div class="form-group">
                                        <label for="disabledSelect">Tanggal Kirim</label>
                                        <input class="form-control" id="disabledInput" type="text" disabled value="<?= date("d F Y", strtotime($pengajuan->tgl_terima)) ?>" />
                                    </div>


                                    <div class="form-group">

                                        <label for="disabledSelect">Judul Pengajuan</label>
                                        <input class="form-control" id="disabledInput" type="text" disabled value="<?= $pengajuan->jdl_pengajuan ?>" />



                                        <label for="disabledSelect">instansi</label>
                                        <select id="disabledSelect" class="form-control">class="form-control">
                                            <?php foreach ($instansi as $instansi) { ?>
                                                <option value="<?php echo $instansi['id_instansi'] ?>" <?php if ($pengajuan->id_instansi == $instansi['id_instansi']) {
                                                                                                                echo "selected";
                                                                                                            } ?>>
                                                    <?php echo $instansi['nama_instansi'] ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <label>Keterangan</label><br>
                                    <input class="form-control form-control-user" type="text" placeholder="keterangan" name="keterangan" value="<?= $pengajuan->keterangan ?>">
                                </div>

                                <div class="form-group">
                                    <label>Penerima</label><br>
                                    <input class="form-control form-control-user" type="text" name="pen_disposisi" value="<?= $pengajuan->pen_disposisi ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Naik</label>
                                    <input class="form-control" type="date" name="tgl_naik" />
                                </div>
                            </div>
                        </div>



                        <button class="btn btn-sm btn-primary" type="submit" value="submit">Edit</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Main Content -->