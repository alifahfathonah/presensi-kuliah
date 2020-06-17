<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	    <a class="navbar-brand" href="<?php echo BASIS_URL; ?>">Presensi</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
	    	</button>
	  	<div class="collapse navbar-collapse" id="navbarNav">
	    	<ul class="navbar-nav">
	    		<li class="nav-item <?php if ($data['pages'] == 'Presensi') { echo 'active btn-secondary'; } ?>">
	        		<a class="nav-link" href="<?php echo BASIS_URL; ?>">Presensi<span class="sr-only">(current)</span></a>
	      		</li>
	        	<li class="nav-item <?php if ($data['pages'] == 'Materi') { echo 'active btn-secondary'; } ?>">
	        		<a class="nav-link" href="<?php echo BASIS_URL; ?>/beranda/materi">Materi</a>
	        	</li>
	        	<li class="nav-item <?php if ($data['pages'] == 'Tentang') { echo 'active btn-secondary'; } ?>">
	        		<a class="nav-link" href="<?php echo BASIS_URL; ?>/beranda/tentang">Tentang</a>
	        	</li>
	    	</ul>
	  	</div>
	  	<a href="<?php echo BASIS_URL; ?>/beranda/admin" class="btn btn-primary my-2 my-sm-0">Admin</a>
	</div>
</nav>