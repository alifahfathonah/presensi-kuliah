<div class="container mt-4">
	<h3>Daftar Materi Presentasi</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="card mt-4">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#list" role="tab">List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab">Tambah</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="list" role="tabpanel">
					<?php if ( $data['press']['sum'] != 0 ): ?>
						<?php foreach ($data['press']['set'] as $press): ?>
							<?php $kpr = array(
								'm' => explode('/', $press['file']),
								'l' => explode('/', $press['lampiran'])
							);
							?>
							<div class="row">
								<div class="col">
									<a href="<?php echo BASIS_URL . $press['file']; ?>"><h5 class="text-title"><?php echo $press['judul']; ?></h5></a>
									<p class="text-muted"><?php echo $press['npm']; ?> - <?php echo $press['nama']; ?></p>
									<p>Aksi : <a href="<?php echo BASIS_URL . '/admin/pre/hapus/' . $kpr['m'][5] . '/' . $kpr['l'][5]; ?>" class="badge badge-danger">Hapus</a></p>
								</div>
								<div class="col">
									(<a href="<?php echo BASIS_URL . $press['lampiran']; ?>">Lampiran</a>)
									<table>
										<tr>
											<td><small class="text-muted">Tipe file materi</small></td>
											<td><small class="text-muted">:</small></td>
											<td><small class="text-muted"><?php echo $press['jenis_file']; ?></small></td>
										</tr>
										<tr>
											<td><small class="text-muted">Tipe file lampiran</small></td>
											<td><small class="text-muted">:</small></td>
											<td><small class="text-muted"><?php echo $press['jenis_lampiran']; ?></small></td>
										</tr>
										<tr>
											<td><small class="text-muted">Diunggah pada</small></td>
											<td><small class="text-muted">:</small></td>
											<td><small class="text-muted"><?php echo $press['tanggal']; ?></small></td>
										</tr>
									</table>
									
								</div>
							</div>
							<hr>
						<?php endforeach ?>
					<?php else: ?>
						<p class="text-center">Belum tersedia saat ini.</p>
					<?php endif ?>	
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL . '/admin/pre/kirim' ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>ID Materi</label>
							<input type="text" name="id" id="id" class="form-control" value="<?php echo $data['kodes']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>NPM Author</label>
							<input type="text" name="npm" id="npm" class="form-control" placeholder="Masukkan NPM...">
						</div>
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul materi...">
						</div>
						<div class="form-group">
							<label>Pilih File</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="file-input">Upload</span>
								</div>
								<div class="custom-file">
									<input type="file" name="file" id="file" class="form-control custom-file-input">
									<label class="custom-file-label" for="file">Choose file</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Pilih Lampiran</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="file-input">Upload</span>
								</div>
								<div class="custom-file">
									<input type="file" name="lamp" id="lamp" class="form-control custom-file-input">
									<label class="custom-file-label" for="lamp">Choose file</label>
								</div>
							</div>
						</div>
						<div class="form-group mt-3">
							<input type="submit" name="kirim" id="kirim" class="form-control btn btn-primary" value="Kirim">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>