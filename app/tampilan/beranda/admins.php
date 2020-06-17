<div class="container mt-4">
	<h1>Administrator Area</h1>
	<hr>
	<br>
	<div class="card">
		<div class="card-body">
			<form action="<?= BASIS_URL; ?>/auth/masukadm" method="post">
				<div class="form-group">
					<label for="uname">Username</label>
					<input class="form-control" type="text" id="uname" name="uname">
				</div>
				<div class="form-group">
					<label for="pword">Password</label>
					<input class="form-control" type="password" id="pword" name="pword">
				</div>
				<div class="form-group">
					<label for="captcha">Captcha</label>
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text"><?= $data['captc']['a'] . ' ' . $data['captc']['o'] . ' ' . $data['captc']['b'] . ' ='; ?></span>
						</div>
						<input class="form-control" type="text" id="captcha" name="captcha" autocomplete="off">
					</div>
				</div>
				<div class="form-group mt-4">
					<input class="form-control btn btn-primary" type="submit" id="kirim" name="kirim" value="Masuk">
				</div>
			</form>
		</div>
	</div>
</div>