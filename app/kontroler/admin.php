<?php

/**
 * 
 */
class admin extends Kontroler
{
	
	function __construct()
	{
		if ( $this->datasesi('npm') == NULL && $this->datasesi('akses') != 'adm') {
			$data = array(
				'judul' => 'Kesalahan 406',
				'errno'	=> '406',
				'errlt'	=> 'Akses Terbatas',
				'pesan'	=> 'Harap masuk melalui jalan yang benar...'
			);
			$this->tampilkan('templat/header', $data);
			$this->tampilkan('templat/navbar', $data);
			$this->tampilkan('errors/errors', $data);
			$this->tampilkan('templat/footer'); // 0811-10-222-10 kontak aduan bansos covid19
			exit;
		}
	}

	function indeks()
	{
		$data = array(
			'judul' => 'Dasbor Admin - ALIN B-081'
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbardash', $data);
		$this->tampilkan('admin/dasbor', $data);
		$this->tampilkan('templat/footer');
	}

	function mhs($nilai='', $npm='')
	{
		switch ($nilai) {
			case 'tambah':
				$data = array(
					'judul' => 'Tambah Mahasiswa - ALIN B-081'
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/mhs/tambah', $data);
				$this->tampilkan('templat/footer');
				break;

			case 'edit':
				$data = array(
					'judul' => 'Tambah Mahasiswa - ALIN B-081',
					'datas'	=> $this->model('model_admin')->detil_mhs($npm)
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/mhs/edit', $data);
				$this->tampilkan('templat/footer');
				break;

			case 'detil':
				$data = array(
					'judul' => 'Tambah Mahasiswa - ALIN B-081',
					'datas'	=> $this->model('model_presensi')->detilakun($npm)
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/mhs/detil', $data);
				$this->tampilkan('templat/footer');
				break;

			case 'tambahact':
				if ( $this->model('model_admin')->tambah_mhs($_POST) > 0 ) {
					Flasher::setFlash('Data mahasiswa', 'berhasil ditambahkan', 'Periksa data kembali', 'success');
					header('location:' . BASIS_URL . '/admin/mhs');
					exit;
				} else {
					Flasher::setFlash('Data mahasiswa', 'gagal ditambahkan', 'Periksa skrip yang dikirim', 'danger');
					header('location:' . BASIS_URL . '/admin/mhs');
					exit;
				}
				break;

			case 'editact':
				if ( $this->model('model_admin')->edit_mhs($_POST) > 0 ) {
					Flasher::setFlash('Data mahasiswa', 'berhasil ditambahkan', 'Periksa data kembali', 'success');
					header('location:' . BASIS_URL . '/admin/mhs');
					exit;
				} else {
					Flasher::setFlash('Data mahasiswa', 'gagal ditambahkan', 'Periksa skrip yang dikirim', 'danger');
					header('location:' . BASIS_URL . '/admin/mhs');
					exit;
				}
				break;

			case 'hapus':
				if ( $this->model('model_admin')->hapus_mhs($npm) > 0 ) {
					Flasher::setFlash('Data mahasiswa', 'berhasil dihapus', 'Periksa data kembali', 'success');
					header('location:' . BASIS_URL . '/admin/mhs');
					exit;
				} else {
					Flasher::setFlash('Data mahasiswa', 'gagal dihapus', 'Periksa skrip yang dikirim', 'danger');
					header('location:' . BASIS_URL . '/admin/mhs');
					exit;
				}
				break;
				
			default:
				$data = array(
					'judul' => 'Daftar Mahasiswa - ALIN B-081',
					'lists'	=> $this->model('model_admin')->daftar_mhs()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/mhs/list', $data);
				$this->tampilkan('templat/footer');
				break;
		}
	}

	function ktm($nilai = '', $ktm = '', $otherdata = '')
	{
		switch ($nilai) {
			case 'tambah':
				$data = array(
					'judul' => 'Tambah Tatap Muka - ALIN B-081'
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/ktm/tambah', $data);
				$this->tampilkan('templat/footer');
				break;

			case 'edit':
				$data = array(
					'judul' => 'Edit Tatap Muka - ALIN B-081',
					'datas'	=> $this->model('model_admin')->detil_ktm($ktm)
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/ktm/edit', $data);
				$this->tampilkan('templat/footer');
				break;

			case 'detil':
				switch ($otherdata) {
					case 'peserta':
						$data = array(
							'judul' => 'Detil Tatap Muka - ALIN B-081',
							'datas'	=> $this->model('model_admin')->detil_ktm($ktm),
							'dtmhs'	=> $this->model('model_admin')->detil_ktm_dtmhs_hadir($ktm)
						);
						$this->tampilkan('templat/header', $data);
						$this->tampilkan('templat/navbardash', $data);
						$this->tampilkan('admin/ktm/peserta', $data);
						$this->tampilkan('templat/footer');
						break;

					case 'tplwa':
						$data = array(
							'judul' => 'Detil Tatap Muka - ALIN B-081',
							'datas'	=> $this->model('model_admin')->detil_ktm($ktm),
							'dtmhs'	=> $this->model('model_admin')->detil_ktm_hadir1($ktm)
						);
						$this->tampilkan('templat/header', $data);
						$this->tampilkan('templat/navbardash', $data);
						$this->tampilkan('admin/ktm/tplwa', $data);
						$this->tampilkan('templat/footer');
						break;

					case 'mulaittm':
						$this->model('model_admin')->buka_ktm($ktm);
						header('location:' . BASIS_URL . '/admin/ktm/detil/' . $ktm);
						break;

					case 'akhirttm':
						$this->model('model_admin')->tutup_ktm($ktm);
						header('location:' . BASIS_URL . '/admin/ktm/detil/' . $ktm);
						break;
					
					default:
						$data = array(
							'judul' => 'Detil Tatap Muka - ALIN B-081',
							'datas'	=> $this->model('model_admin')->detil_ktm($ktm),
							'hadir' => $this->model('model_admin')->detil_ktm_hadir($ktm),
							'total'	=> $this->model('model_admin')->detil_ktm_totalmhs($ktm)
						);
						$this->tampilkan('templat/header', $data);
						$this->tampilkan('templat/navbardash', $data);
						$this->tampilkan('admin/ktm/detil', $data);
						$this->tampilkan('templat/footer');
						break;
				}
				break;

			case 'tambahact':
				if ( $this->model('model_admin')->tambah_ktm($_POST) > 0 ) {
					Flasher::setFlash('Data temu tatap muka', 'berhasil ditambahkan', 'Periksa data kembali', 'success');
					header('location:' . BASIS_URL . '/admin/ktm');
					exit;
				} else {
					Flasher::setFlash('Data temu tatap muka', 'gagal ditambahkan', 'Periksa skrip yang dikirim', 'danger');
					header('location:' . BASIS_URL . '/admin/ktm');
					exit;
				}
				break;

			case 'editact':
				if ( $this->model('model_admin')->edit_ktm($_POST) > 0 ) {
					Flasher::setFlash('Data temu tatap muka', 'berhasil diperbarui', 'Periksa data kembali', 'success');
					header('location:' . BASIS_URL . '/admin/ktm');
					exit;
				} else {
					Flasher::setFlash('Data temu tatap muka', 'gagal diperbarui', 'Periksa skrip yang dikirim', 'danger');
					header('location:' . BASIS_URL . '/admin/ktm');
					exit;
				}
				break;

			case 'hapus':
				if ( $this->model('model_admin')->hapus_ktm($ktm) > 0 ) {
					Flasher::setFlash('Data temu tatap muka', 'berhasil dihapus', 'Periksa data kembali', 'success');
					header('location:' . BASIS_URL . '/admin/ktm');
					exit;
				} else {
					Flasher::setFlash('Data temu tatap muka', 'gagal dihapus', 'Periksa skrip yang dikirim', 'danger');
					header('location:' . BASIS_URL . '/admin/ktm');
					exit;
				}
				break;
				
			default:
				$data = array(
					'judul' => 'Daftar Tatap Muka - ALIN B-081',
					'lists'	=> $this->model('model_admin')->daftar_ktm()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/ktm/list', $data);
				$this->tampilkan('templat/footer');
				break;
		}
	}

	function mtr($nilai = '', $kmt = '', $fmt = '')
	{
		switch ($nilai) {
			case 'kirim':
				if ( $this->pustaka('pustaka_file')->unggah_mtr($_POST, $_FILES) > 0 ) {
					if ( $this->model('model_admin')->tambah_mtr($_POST, $_FILES) > 0 ) {
						Flasher::setFlash('Materi', 'berhasil diunggah', 'Mohon cek daftar materi', 'success');
						header('location:' . BASIS_URL . '/admin/mtr');
						exit;
					} else {
						Flasher::setFlash('Materi', 'berhasil diunggah', '[Kegagalan pangkalan data]', 'success');
						header('location:' . BASIS_URL . '/admin/mtr');
						exit;
					}
				} else {
					Flasher::setFlash('Materi', 'gagal diunggah', '[Kegagalan pustaka file upload]', 'danger');
					header('location:' . BASIS_URL . '/admin/mtr');
					exit;
				}
				break;

			case 'hapus':
				if ( $this->pustaka('pustaka_file')->hapus_mtr($kmt) > 0 ) {
					if ( $this->model('model_admin')->hapus_mtr($kmt) > 0 ) {
						Flasher::setFlash('Materi', 'berhasil dihapus', 'Mohon cek daftar materi', 'success');
						header('location:' . BASIS_URL . '/admin/mtr');
						exit;
					} else {
						Flasher::setFlash('Materi', 'berhasil dihapus', '[Kegagalan pangkalan data]', 'success');
						header('location:' . BASIS_URL . '/admin/mtr');
						exit;
					}
				} else {
					Flasher::setFlash('Materi', 'gagal dihapus', '[Kegagalan pustaka file upload]', 'danger');
					header('location:' . BASIS_URL . '/admin/mtr');
					exit;
				}
				break;
			
			default:
				$data = array(
					'judul'	=> 'Daftar Materi - ALIN B-081',
					'teori'	=> $this->model('model_admin')->daftar_mtr(),
					'kodes'	=> $this->model('model_admin')->nomor_mtr_lama()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/mtr/list', $data);
				$this->tampilkan('templat/footer');
				break;
		}
	}

	function pre($nilai = '', $kdprm = '', $kdprl = '')
	{
		switch ($nilai) {
			case 'kirim':
				if ( $this->pustaka('pustaka_file')->unggah_pre($_POST, $_FILES) > 0 ) {
					if ( $this->model('model_admin')->tambah_pre($_POST, $_FILES) > 0 ) {
						Flasher::setFlash('Presentasi', 'berhasil diunggah', 'Mohon cek daftar materi', 'success');
						header('location:' . BASIS_URL . '/admin/pre');
						exit;
					} else {
						Flasher::setFlash('Presentasi', 'berhasil diunggah', '[Kegagalan pangkalan data]', 'success');
						header('location:' . BASIS_URL . '/admin/pre');
						exit;
					}
				} else {
					Flasher::setFlash('Presentasi', 'gagal diunggah', '[Kegagalan pustaka file upload]', 'danger');
					header('location:' . BASIS_URL . '/admin/pre');
					exit;
				}
				break;

			case 'hapus':
				if ( $this->pustaka('pustaka_file')->hapus_pre($kdprm, $kdprl) > 0 ) {
					if ( $this->model('model_admin')->hapus_pre($kdprm) > 0 ) {
						Flasher::setFlash('Presentasi', 'berhasil dihapus', 'Mohon cek daftar materi', 'success');
						header('location:' . BASIS_URL . '/admin/pre');
						exit;
					} else {
						Flasher::setFlash('Presentasi', 'gagal dihapus', '[Kegagalan pangkalan data]', 'danger');
						header('location:' . BASIS_URL . '/admin/pre');
						exit;
					}
				} else {
					Flasher::setFlash('Presentasi', 'gagal dihapus', '[Kegagalan pustaka file upload]', 'danger');
					header('location:' . BASIS_URL . '/admin/pre');
					exit;
				}
				break;
			
			default:
				$data = array(
					'judul'	=> 'Daftar Materi Presentasi - ALIN B-081',
					'press'	=> $this->model('model_admin')->daftar_pre(),
					'kodes'	=> $this->model('model_admin')->nomor_pre_lama()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbardash', $data);
				$this->tampilkan('admin/pre/list', $data);
				$this->tampilkan('templat/footer');
				break;
		}
	}
}