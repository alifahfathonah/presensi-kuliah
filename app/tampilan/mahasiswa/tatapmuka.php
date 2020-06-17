<div class="container mt-4">
	<div class="card">
		<div class="card-body">
			<h3>Selamat datang, <?php echo $_SESSION['nama']; ?>!</h3>
		</div>
	</div>
	<br>
	<?php foreach ($data['kutam'] as $ktm): ?>
		<div class="card mb-2">
			<div class="card-header">
				<h5 class="card-title text-center">Pertemuan Ke-<?php echo $ktm['pertemuan']; ?></h5>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<tr>
						<th>Tanggal</th>
						<td><?php echo $ktm['tanggal']; ?></td>
					</tr>
					<tr>
						<th>Materi</th>
						<td><?php echo $ktm['materi']; ?></td>
					</tr>
					<tr>
						<th>Presensi</th>
						<td>
							<?php if ( $ktm['waktumulai'] == 0 && $ktm['waktuakhir'] == 0 ) { ?>
								<a href="" class="btn btn-secondary disabled">Presensi Belum Dibuka</a>
							<?php } else if ( $ktm['waktumulai'] != 0 && $ktm['waktuakhir'] == 0 ) { ?>
								<a href="<?php echo BASIS_URL; ?>/presensi/presensi/<?php echo $ktm['kode_tm'] ?>" class="btn btn-success">Laman Presensi</a>
							<?php } else if ( $ktm['waktumulai'] != 0 && $ktm['waktuakhir'] != 0 ) { ?>
								<a href="<?php echo BASIS_URL; ?>/presensi/presensi/<?php echo $ktm['kode_tm'] ?>" class="btn btn-danger">Presensi Ditutup</a>
							<?php } ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	<?php endforeach ?>
</div>