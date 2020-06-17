<div class="container mt-4">
	<h3>Detail Akun</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="card mt-4">
		<div class="card-header">
			<h5 class="text-center">Data Anda di Server</h5>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<tr>
					<th>NPM</th>
					<td><?php echo $data['detil']['detil']['npm']; ?></td>
				</tr>
				<tr>
					<th>Nama</th>
					<td><?php echo $data['detil']['detil']['nama']; ?></td>
				</tr>
				<tr>
					<th>Kehadiran</th>
					<td>
						<?php echo $data['detil']['hadir']['ada'] . ' dari ' . $data['detil']['hadir']['ktm'] . ' pertemuan.'; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>