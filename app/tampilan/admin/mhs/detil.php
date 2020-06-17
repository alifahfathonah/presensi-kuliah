<div class="container mt-4">
	<h3>Detil Mahasiswa</h3>
	<hr>
	<?php 
		Flasher::flash(); 
		$no = 1;
	?>
	<div class="card mt-4">
		<div class="card-header">
			<h5 class="text-center">Data Mahasiswa di Server</h5>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<tr>
					<th>NPM</th>
					<td><?php echo $data['datas']['detil']['npm']; ?></td>
				</tr>
				<tr>
					<th>Nama</th>
					<td><?php echo $data['datas']['detil']['nama']; ?></td>
				</tr>
				<tr>
					<th>Kehadiran</th>
					<td>
						<?php echo $data['datas']['hadir']['ada'] . ' dari ' . $data['datas']['hadir']['ktm'] . ' pertemuan.'; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>