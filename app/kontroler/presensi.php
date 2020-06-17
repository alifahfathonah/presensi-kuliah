<?php 

/**
 * 
 */
class presensi extends Kontroler
{
	
	function __construct()
	{
		if ( $this->datasesi('npm') == NULL && $this->datasesi('akses') != 'mhs' ) {
			$data = array(
				'judul' => 'Kesalahan 406',
				'errno'	=> '406',
				'errlt'	=> 'Akses Terbatas',
				'pesan'	=> 'Harap masuk melalui jalan yang benar...'
			);
			$this->tampilkan('templat/header', $data);
			$this->tampilkan('templat/navbardash', $data);
			$this->tampilkan('errors/errors', $data);
			$this->tampilkan('templat/footer'); // 0811-10-222-10 kontak aduan bansos covid19
			exit;
		}
	}

	function indeks()
	{
		$data = array(
			'judul' => 'Presensi - ALIN B-081',
			'kutam' => $this->model('model_presensi')->tatapmuka()
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbardash', $data);
		$this->tampilkan('mahasiswa/tatapmuka', $data);
		$this->tampilkan('templat/footer');
	}

	function presensi($ktm)
	{
		$data = array(
			'judul' => 'Presensi - ALIN B-081',
			'kutam' => $this->model('model_presensi')->tatapmuka($ktm),
			'prese' => $this->model('model_presensi')->presensi($this->datasesi('npm'), $ktm)
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbardash', $data);
		$this->tampilkan('mahasiswa/presensi', $data);
		$this->tampilkan('templat/footer');
	}

	function kirimpresensi($npm, $ktm)
	{
		if ( $this->model('model_presensi')->kirimpresensi($npm, $ktm) > 0 ) {
			Flasher::setFlash('Presensi', 'telah dicatat', 'Terima kasih atas partisipasinya', 'success');
			header('location:' . BASIS_URL . '/presensi/presensi/' . $ktm);
			exit;
		} else {
			Flasher::setFlash('Presensi', 'tidak dicatat', 'Mohon hubungi komting', 'danger');
			header('location:' . BASIS_URL . '/presensi/presensi/' . $ktm);
			exit;
		}
	}

	function hapuspresensi($npm, $ktm)
	{
		if ( $this->model('model_presensi')->hapuspresensi($npm, $ktm) > 0 ) {
			Flasher::setFlash('Presensi', 'telah dihapus', 'Terima kasih atas partisipasinya', 'success');
			header('location:' . BASIS_URL . '/presensi/presensi/' . $ktm);
			exit;
		} else {
			Flasher::setFlash('Presensi', 'gagal dihapus', 'Mohon hubungi komting', 'danger');
			header('location:' . BASIS_URL . '/presensi/presensi/' . $ktm);
			exit;
		}
	}

	function detail()
	{
		$data = array(
			'judul' => 'Presensi - ALIN B-081',
			'detil' => $this->model('model_presensi')->detilakun($this->datasesi('npm'))
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbardash', $data);
		$this->tampilkan('mahasiswa/detail', $data);
		$this->tampilkan('templat/footer');
	}
}