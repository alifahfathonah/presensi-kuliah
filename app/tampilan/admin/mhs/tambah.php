<div class="container mt-4">
	<h3>Tambah Mahasiswa</h3>
	<hr>
	<div class="card mt-4">
		<div class="card-header">
			<h4 class="card-title text-center">
				Form Data
			</h4>
		</div>
		<div class="card-body">
			<form class="mt-4" action="<?php echo BASIS_URL . '/admin/mhs/tambahact'; ?>" method="post">
				<div class="form-group">
					<label>NPM</label>
					<input type="text" name="npm" id="npm" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" id="nama" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="submit" name="kirim" id="kirim" class="form-control btn btn-primary" value="Kirim">
				</div>
			</form>
		</div>
	</div>
</div>