<div class="container mt-4">
	<h3>Daftar Perkuliahan</h3>
	<hr>
	<?php 
		Flasher::flash(); 
		$no = 1;
	?>
	<div class="card mt-4">
		<div class="card-body">
			<center>
				<a href="<?php echo BASIS_URL . '/admin/ktm/tambah'; ?>" class="btn btn-primary mb-2">+ Tambah Tatap Muka</a>
				<table class="table table-striped table-responsive">
					<tr>
						<th>Kode TM</th>
						<th>Pertemuan</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
					<?php foreach ($data['lists'] as $ktm): ?>
						<tr>
							<td class="text-left"><?php echo $ktm['kode_tm']; ?></td>
							<td class="text-left"><?php echo $ktm['pertemuan']; ?></td>
							<td class="text-left"><?php echo $ktm['tanggal']; ?></td>
							<td>
								<?php if ( $ktm['waktumulai'] != 0 && $ktm['waktuakhir'] == 0 ): ?>
									<div class="badge badge-success">Aktif</div>
								<?php else: ?>
									<div class="badge badge-danger">Inaktif</div>
								<?php endif ?>
							</td>
							<td>
								<a href="<?php echo BASIS_URL . '/admin/ktm/detil/' . $ktm['kode_tm']; ?>" class="badge badge-primary">Detil</a> <a href="<?php echo BASIS_URL . '/admin/ktm/edit/' . $ktm['kode_tm']; ?>" class="badge badge-warning">Edit</a> <a href="<?php echo BASIS_URL . '/admin/ktm/hapus/' . $ktm['kode_tm']; ?>" class="badge badge-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			</center>
		</div>
	</div>
</div>