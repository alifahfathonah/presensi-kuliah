<div class="container mt-4">
	<h3>Daftar Mahasiswa</h3>
	<hr>
	<?php 
		Flasher::flash(); 
		$no = 1;
	?>
	<div class="card mt-4">
		<div class="card-body">
			<center>
				<a href="<?php echo BASIS_URL . '/admin/mhs/tambah'; ?>" class="btn btn-primary mb-2">+ Tambah Mahasiswa</a>
				<table class="table table-striped table-responsive">
					<tr>
						<th>No.</th>
						<th>NPM</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
					<?php foreach ($data['lists'] as $mhs): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td class="text-left"><?php echo $mhs['npm']; ?></td>
							<td class="text-left"><?php echo $mhs['nama']; ?></td>
							<td>
								<a href="<?php echo BASIS_URL . '/admin/mhs/detil/' . $mhs['npm']; ?>" class="badge badge-primary">Detil</a> <a href="<?php echo BASIS_URL . '/admin/mhs/edit/' . $mhs['npm']; ?>" class="badge badge-warning">Edit</a> <a href="<?php echo BASIS_URL . '/admin/mhs/hapus/' . $mhs['npm']; ?>" class="badge badge-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			</center>
		</div>
	</div>
</div>