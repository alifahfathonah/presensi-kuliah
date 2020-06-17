<?php

/**
 * 
 */
class beranda extends Kontroler
{
	
	function indeks()
	{
		if ( isset($_SESSION['akses']) ) {
			if ( $this->datasesi('akses') == 'adm' ) {
				header('location:' . BASIS_URL . '/admin');
			} else {
				header('location:' . BASIS_URL . '/presensi');
			}
		} else {
			$data = array(
				'judul' => 'Presensi - ALIN B-081',
				'pages' => 'Presensi',
				'captc' => $this->pustaka('pustaka_captcha')->tampilkanrumus()
			);
			$this->mulaisesi('kode', $data['captc']['h']);
			$this->tampilkan('templat/header', $data);
			$this->tampilkan('templat/navbar', $data);
			$this->tampilkan('beranda/portal', $data);
			$this->tampilkan('templat/footer');
		}
	}

	function admin()
	{
		$data = array(
			'judul' => 'Admin Area - ALIN B-081',
			'pages' => 'Admin',
			'captc' => $this->pustaka('pustaka_captcha')->tampilkanrumus()
		);
		$this->mulaisesi('kode', $data['captc']['h']);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar', $data);
		$this->tampilkan('beranda/admins', $data);
		$this->tampilkan('templat/footer');
	}

	function materi()
	{
		$data = array(
			'judul' => 'Materi - ALIN B-081',
			'pages' => 'Materi',
			'press' => $this->model('model_beranda')->dapatpresentasi(),
			'teori' => $this->model('model_beranda')->dapatmateri()
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar', $data);
		$this->tampilkan('beranda/materi', $data);
		$this->tampilkan('templat/footer');
	}

	function tentang()
	{
		$data = array(
			'judul' => 'Tentang - ALIN B-081',
			'pages' => 'Tentang'
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar', $data);
		$this->tampilkan('beranda/author', $data);
		$this->tampilkan('templat/footer');
	}
}