<div class="container mt-4">
	<h3>Dasbor Administrator</h3>
	<hr>
	<div class="alert alert-primary">
		<h4 class="card-title">Selamat datang, <b>@<?= $_SESSION['uname']; ?></b>!</h4>
	</div>
	
	<div class="container">
		<div class="card mt-4">
			<div class="card-body">
				<h5 class="card-title">Daftar Mahasiswa</h5>
				<a href="<?php echo BASIS_URL . '/admin/mhs'; ?>" class="btn btn-primary">Tuju >></a>
			</div>
		</div>
		<div class="card mt-4">
			<div class="card-body">
				<h5 class="card-title">Perkuliahan</h5>
				<a href="<?php echo BASIS_URL . '/admin/ktm'; ?>" class="btn btn-primary">Tuju >></a>
			</div>
		</div>
		<div class="card mt-4">
			<div class="card-body">
				<h5 class="card-title">Materi Perkuliahan</h5>
				<a href="<?php echo BASIS_URL . '/admin/mtr'; ?>" class="btn btn-primary">Tuju >></a>
			</div>
		</div>
		<div class="card mt-4">
			<div class="card-body">
				<h5 class="card-title">Hasil Presentasi</h5>
				<a href="<?php echo BASIS_URL . '/admin/pre'; ?>" class="btn btn-primary">Tuju >></a>
			</div>
		</div>
	</div>
</div>
	