<div class="container mt-4">
	<h3>Daftar Perkuliahan</h3>
	<hr>
	<?php 
		Flasher::flash(); 
		$no = 1;
	?>
	<div class="card mt-4">
		<div class="card-header">
			<h5 class="card-title text-center">Templat WA</h5>
		</div>
		<div class="card-body">
			Presensi ALIN Kelas B <br>
			Hari Senin, <?php echo $data['datas']['tanggal']; ?> <br>
			______________ <br>
			No. NPM. Nama <br>
			<?php foreach ($data['dtmhs'] as $dtmhs): ?>
				<?php echo $no++ . ') ' . $dtmhs['npm'] . ' ' . $dtmhs['nama']; ?><br>				
			<?php endforeach ?>
		</div>
	</div>
</div>