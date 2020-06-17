<div class="container mt-4">
	<h1>Portal Presensi</h1>
	<hr>
	<br>
	<div class="card">
		<div class="card-body">
			<?php Flasher::flash(); ?>
			<form action="<?= BASIS_URL; ?>/auth/masukmhs" method="post">
				<div class="form-group">
					<label for="npm">NPM</label>
					<input class="form-control" type="text" id="npm" name="npm">
				</div>
				<div class="form-group">
					<label for="captcha">Captcha</label>
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text"><?= $data['captc']['a'] . ' ' . $data['captc']['o'] . ' ' . $data['captc']['b'] . ' ='; ?></span>
						</div>
						<input class="form-control" type="text" id="captcha" name="captcha">
					</div>
				</div>
				<div class="form-group mt-4">
					<input class="form-control btn btn-primary" type="submit" id="kirim" name="kirim" value="Masuk">
				</div>
			</form>
		</div>
	</div>
</div>