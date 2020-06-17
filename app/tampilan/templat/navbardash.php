<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	    <a class="navbar-brand" href="<?php echo BASIS_URL; ?>">Presensi</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
		  	<span class="navbar-toggler-icon"></span>
	    </button>
	  	<div class="dropdown">
			<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="menu-akun" data-toggle="dropdown">
				<?php 
				if ( isset($_SESSION['npm']) ) {
					if ( strlen($_SESSION['npm']) == 11) {
						echo substr($_SESSION['npm'], 0, -9) . substr($_SESSION['npm'], 8);
					} else {
						echo substr($_SESSION['npm'], 0, -8) . substr($_SESSION['npm'], 7);
					}
				} else {
					if ( isset($_SESSION['uname']) ) {
						echo $_SESSION['uname'];
					} else {
						echo "err406";
					}
				} ?>
			</a>

			<div class="dropdown-menu dropdown-menu-right">
				<?php if ( isset($_SESSION['akses']) ): ?>
					<?php switch ($_SESSION['akses']) {
						case 'adm': ?>
							<a class="dropdown-item" href="<?php echo BASIS_URL; ?>/admin">Dasbor</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo BASIS_URL; ?>/auth/keluar">Keluar</a>
						<?	break;
						
						case 'mhs': ?>
							<a class="dropdown-item" href="<?php echo BASIS_URL; ?>/presensi">Presensi</a>
							<a class="dropdown-item" href="<?php echo BASIS_URL; ?>/presensi/detail">Info Akun</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo BASIS_URL; ?>/auth/keluar">Keluar</a>
						<?	break;
					} ?>
				<?php else: ?>
					<a class="dropdown-item" href="<?php echo BASIS_URL; ?>">Kembali</a>
				<?php endif ?>
					
			</div>
		</div>
	</div>
</nav>