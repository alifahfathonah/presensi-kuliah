<?php

/**
 * 
 */
class auth extends Kontroler
{
	
	function masukmhs()
	{
		if ( $_POST['captcha'] == $this->datasesi('kode') ) {
			$data = $this->model('model_auth')->masuk_mhs($_POST);
			if ( $data['row'] > 0 ) {
				$this->mulaisesi('npm', $data['one']['npm']);
				$this->mulaisesi('nama', $data['one']['nama']);
				$this->mulaisesi('akses', 'mhs');
				header('location:' . BASIS_URL . '/presensi');
			} else {
				Flasher::setFlash('NPM', 'tidak ditemukan', 'Silakan periksa NPM yang Anda masukkan', 'danger');
				header('location:' . BASIS_URL . '/beranda');
				exit;
			}
		} else {
			Flasher::setFlash('Captcha', 'salah', 'Silakan ulangi proses dari awal', 'danger');
			header('location:' . BASIS_URL . '/beranda');
			exit;
		}
		$this->akhirsesi('kode');
	}

	function masukadm()
	{
		if ( $_POST['captcha'] == $this->datasesi('kode') ) {
			$data = $this->model('model_auth')->masuk_usr($_POST);
			if ( $data['row'] > 0 ) {
				$this->mulaisesi('uname', $data['one']['username']);
				$this->mulaisesi('akses', 'adm');
				header('location:' . BASIS_URL . '/admin');
			} else {
				Flasher::setFlash('Username atau password', 'salah', 'Silakan periksa username atau password yang Anda masukkan', 'danger');
				header('location:' . BASIS_URL . '/beranda/admin');
				exit;
			}
		} else {
			Flasher::setFlash('Captcha', 'salah', 'Silakan ulangi proses dari awal', 'danger');
			header('location:' . BASIS_URL . '/beranda/admin');
			exit;
		}
		$this->akhirsesi('kode');
	}

	function keluar()
	{
		$this->akhirsesi('npm');
		$this->akhirsesi('nama');
		$this->akhirsesi('uname');
		$this->akhirsesi('akses');
		header('location:' . BASIS_URL);
	}
}