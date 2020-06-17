<div class="container mt-4">
	<h3>Detil Tatap Muka</h3>
	<hr>
	<?php 
		Flasher::flash(); 
		$no = 1;
	?>
	<div class="card mt-4">
		<div class="card-header">
			<h5 class="text-center">Data Tatap Muka di Server</h5>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<tr>
					<th>Kode TM</th>
					<td><?php echo $data['datas']['kode_tm']; ?></td>
				</tr>
				<tr>
					<th>Pertemuan</th>
					<td>Pekan <?php echo $data['datas']['pertemuan']; ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?php echo $data['datas']['tanggal']; ?></td>
				</tr>
				<tr>
					<th>Materi</th>
					<td><?php echo $data['datas']['materi']; ?></td>
				</tr>
				<tr>
					<th>Mulai</th>
					<td>
						<?php if ( $data['datas']['waktumulai'] == 0 ): ?>
							<a href="<?php echo BASIS_URL . '/admin/ktm/detil/' . $data['datas']['kode_tm'] . '/mulaittm'; ?>" class="btn btn-success">Mulai Kelas</a>
						<?php else: ?>
							<?php echo $data['datas']['waktumulai']; ?>
						<?php endif ?>
					</td>
				</tr>
				<tr>
					<th>Selesai</th>
					<td>
						<?php if ( $data['datas']['waktuakhir'] == 0 ): ?>
							<a href="<?php echo BASIS_URL . '/admin/ktm/detil/' . $data['datas']['kode_tm'] . '/akhirttm'; ?>" class="btn btn-danger">Akhiri Kelas</a>
						<?php else: ?>
							<?php echo $data['datas']['waktuakhir']; ?>
						<?php endif ?>
					</td>
				</tr>
				<tr>
					<th>Mahasiswa Hadir</th>
					<td>
						<?php echo $data['hadir'] . ' dari ' . $data['total'] . ' total mahasiswa.'; ?>
						<br>
						<a href="<?php echo BASIS_URL . '/admin/ktm/detil/' . $data['datas']['kode_tm'] . '/peserta'; ?>" class="btn btn-primary">Daftar Kehadiran</a> <a href="<?php echo BASIS_URL . '/admin/ktm/detil/' . $data['datas']['kode_tm'] . '/tplwa'; ?>" class="btn btn-success">Templat WA</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>