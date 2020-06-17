<div class="container mt-4">
	<h3>Edit Data TM</h3>
	<hr>
	<div class="card mt-4">
		<div class="card-header">
			<h4 class="card-title text-center">
				Form Data
			</h4>
		</div>
		<div class="card-body">
			<form class="mt-4" action="<?php echo BASIS_URL . '/admin/ktm/editact'; ?>" method="post">
				<div class="form-group">
					<label>Kode TM</label>
					<input type="text" name="ktm" id="ktm" class="form-control" value="<?php echo $data['datas']['kode_tm']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Pertemuan</label>
					<input type="number" name="ttm" id="ttm" class="form-control" value="<?php echo $data['datas']['pertemuan']; ?>" required>
				</div>
				<div class="form-group">
					<label>Tanggal TM</label>
					<input type="date" name="tgl" id="tgl" class="form-control" value="<?php echo $data['datas']['tanggal']; ?>" required>
				</div>
				<div class="form-group">
					<label>Materi</label>
					<input type="text" name="mtr" id="mtr" class="form-control" value="<?php echo $data['datas']['materi']; ?>" required>
				</div>
				<div class="form-group">
					<input type="submit" name="kirim" id="kirim" class="form-control btn btn-primary" value="Kirim">
				</div>
			</form>
		</div>
	</div>
</div>