<div class="container mt-4">
	<h3>Halaman Presensi</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="card mt-4">
		<div class="card-header">
			<h5 class="text-center">Pertemuan Ke-<?php echo $data['kutam']['pertemuan']; ?></h5>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<tr>
					<th>Tanggal</th>
					<td><?php echo $data['kutam']['tanggal']; ?></td>
				</tr>
				<tr>
					<th>Materi</th>
					<td><?php echo $data['kutam']['materi']; ?></td>
				</tr>
				<tr>
					<th>Kehadiran</th>
					<td>
						<?php if ( $data['kutam']['waktumulai'] == 0 && $data['kutam']['waktuakhir'] == 0 ) { ?>
							<a href="" class="btn btn-secondary disabled">Presensi Belum Dibuka</a>
						<?php } else if ( $data['kutam']['waktumulai'] != 0 && $data['kutam']['waktuakhir'] == 0 ) { ?>
							<?php if ( $data['prese']['keterangan'] == '' ): ?>
								<a href="<?php echo BASIS_URL; ?>/presensi/kirimpresensi/<?php echo $_SESSION['npm'] . '/' . $data['kutam']['kode_tm']; ?>" class="btn btn-success">Catat Kehadiran</a>
							<?php else: ?>
								<a href="<?php echo BASIS_URL; ?>/presensi/hapuspresensi/<?php echo $_SESSION['npm'] . '/' . $data['kutam']['kode_tm']; ?>" class="btn btn-danger">Hapus Kehadiran</a><br>
								<small class="text-muted"><i>Kehadiran dicatat pada: <?php echo $data['prese']['waktu']; ?></i></small>
							<?php endif ?>
						<?php } else if ( $data['kutam']['waktumulai'] != 0 && $data['kutam']['waktuakhir'] != 0 ) { ?>
							<a href="" class="btn btn-danger disabled">Presensi Ditutup</a>
							<br>
							<?php if ( $data['prese']['keterangan'] == 'Hadir' ): ?>
								<small class="text-muted"><i>Kehadiran dicatat pada: <?php echo $data['prese']['waktu']; ?></i></small>
							<?php else: ?>
								<small class="text-muted"><i>Kehadiran tidak tercatat.</i></small>
							<?php endif ?>
						<?php } ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>