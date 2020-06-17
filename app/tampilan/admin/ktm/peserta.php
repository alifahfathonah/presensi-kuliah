<div class="container mt-4">
	<h3>Daftar Perkuliahan</h3>
	<hr>
	<?php 
		Flasher::flash(); 
		$no = 1;
		$na = 1;
	?>
	<div class="card mt-4">
		<div class="card-body">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped">
						<tr>
							<th>Kode Tatap Muka </th>
							<td><?php echo $data['datas']['kode_tm']; ?></</td>
						</tr>
						<tr>
							<th>Pertemuan</th>
							<td>Pekan <?php echo $data['datas']['pertemuan']; ?></</td>
						</tr>
					</table>
				</div>
			</div>
			<br class="mt-2">
			<h5 class="card-title">Sudah Presensi</h5>
			<hr>
			
			<center>
				<table class="table table-striped table-responsive mt-4">
					<tr>
						<th>No.</th>
						<th>NPM</th>
						<th>Nama</th>
						<th>Presensi</th>
					</tr>
					<?php foreach ($data['dtmhs'] as $dtmhs): ?>
						<tr>
							<td class="text-left"><?php echo $no++; ?></td>
							<td class="text-left"><?php echo $dtmhs['npm']; ?></td>
							<td class="text-left"><?php echo $dtmhs['nama']; ?></td>
							<td class="text-left">
								<?php if ( $dtmhs['keterangan'] == 'Hadir' ): ?>
									<div class="badge badge-success"><?php echo $dtmhs['waktu']; ?></div>
								<?php else: ?>
									<div class="badge badge-danger">Belum Lapor</div>
								<?php endif ?>	
							</td>
						</tr>
					<?php endforeach ?>
				</table>
				<hr>
			</center>
		</div>
	</div>
</div>