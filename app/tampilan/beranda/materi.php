<div class="container mt-4">
	<h1>Daftar Materi</h1>
	<hr>
	<br>
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#kuliah" role="tab">Kuliah</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#presentasi" role="tab">Presentasi</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="kuliah" role="tabpanel">
					<?php if ( $data['teori']['sum'] != 0 ): ?>
						<?php foreach ($data['teori']['set'] as $teori): ?>
							<a href="<?php echo BASIS_URL . $teori['file']; ?>"><h5 class="text-title"><?php echo $teori['judul']; ?></h5></a>
							<p class="text-muted"><b><?php echo $teori['author']; ?></b></p>
							<small class="text-muted">Tipe File : <?php echo $teori['jenis_file'] ?></small><br>
							<small class="text-muted">Tanggal Upload : <?php echo $teori['tanggal']; ?></small>
							<hr>
						<?php endforeach ?>
					<?php else: ?>
						<p class="text-center">Belum tersedia saat ini.</p>
					<?php endif ?>	
				</div>
				<div class="tab-pane fade" id="presentasi" role="tabpanel">
					<?php if ( $data['press']['sum'] != 0 ): ?>
						<?php foreach ($data['press']['set'] as $press): ?>
							<div class="row">
								<div class="col">
									<a href="<?php echo BASIS_URL . $press['file']; ?>"><h5 class="text-title"><?php echo $press['judul']; ?></h5></a>
									<p class="text-muted"><?php echo $press['npm'] . ' - ' . $press['nama']; ?></p>
									(<a href="<?php echo BASIS_URL . $press['lampiran']; ?>">Lampiran</a>)
									
								</div>
								<div class="col text-left">
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
			</div>
		</div>
	</div>
</div>