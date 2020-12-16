<!DOCTYPE html>
<html>

<head>
	<title>Cetak Laporan Pengajuan</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/cetak_agenda.css') ?>">
</head>

<body>
	<div id="colres">
		<div class="disp">
			<?php foreach ($konfig as $k) { ?>
				<!--  -->
				<p class="up"><?php echo $k['nama_institusi'] ?></p>

				<p class="up" id="nama">Data Laporan Pengajuan <?= $_GET['nama_instansi'] ?></p>

				<br>
				<span id="alamat"><?php echo $k['alamat'] ?></span><br>
				<span id="alamat"><?php echo $k['contact'] ?></span>
			<?php } ?>
		</div>
		<div class="separator"></div>
		<h4 id="detail">
			Laporan Pengajuan dari tanggal <?php echo date("d M Y", strtotime($_GET['tanggal_awal'])); ?>
			Sampai dengan tanggal <?php echo date("d M Y", strtotime($_GET['tanggal_akhir'])); ?>
		</h4>
		<table class="table-data">
			<thead>
				<tr>
					<!-- <th>Instansi</th> -->
					<th>Judul Pengajuan</th>
					<th>Keterangan</th>
					<th>Tanggal Terima</th>
					<th>Tanggal Naik</th>
					<th>Penerima Disposisi</th>
				</tr>
				<?php
				foreach ($laporan as $l) {
				?>
			<tbody>
				<tr>
					<!-- <td><?php echo $l->nama_instansi ?></td> -->
					<td><?php echo $l->jdl_pengajuan ?></td>
					<td><?php echo $l->keterangan ?></td>
					<td><?php echo date("d M Y", strtotime($l->tgl_terima)); ?></td>
					<td><?php echo date("d M Y", strtotime($l->tgl_naik)); ?></td>
					<td><?php echo $l->pen_disposisi ?></td>
				</tr>
			</tbody>
		<?php } ?>
		</thead>
		</table>
	</div>
	<script type="text/javascript">
		window.print();
	</script>
</body>

</html>