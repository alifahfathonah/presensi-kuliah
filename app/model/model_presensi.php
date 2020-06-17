<?php 

/**
 * 
 */
class model_presensi extends Kontroler
{
	private $siswa = "mahasiswa";
	private $tabel = "tatapmuka";
	private $absen = "presensi";
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	function tatapmuka($ktm = '')
	{
		if ( $ktm == '' ) {
			$kueri = "SELECT * FROM $this->tabel";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			return $this->db->hasil_set();
		} else {
			$kueri = "SELECT * FROM $this->tabel WHERE kode_tm = :ktm";
			$this->db->kueri($kueri);
			$this->db->bind('ktm', $ktm);
			$this->db->eksekusi();
			return $this->db->hasil_tunggal();
		}
	}

	// function wkt_presensi($npm, $ktm)
	// {
	// 	$kueri = "SELECT * FROM $this->absen WHERE npm = :npm AND kode_tm = :ktm";
	// 	$this->db->kueri($kueri);
	// 	$this->db->bind('npm', $npm);
	// 	$this->db->bind('ktm', $ktm);
	// 	$this->db->eksekusi();
	// 	return $this->db->hasil_tunggal();
	// }

	function presensi($npm, $ktm)
	{
		$kueri = "SELECT * FROM $this->absen WHERE npm = :npm AND kode_tm = :ktm";
		$this->db->kueri($kueri);
		$this->db->bind('npm', $npm);
		$this->db->bind('ktm', $ktm);
		$this->db->eksekusi();
		return $this->db->hasil_tunggal();
	}

	function totalktm()
	{
		$kueri = "SELECT * FROM $this->tabel";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		return $this->db->hitung_baris();
	}

	function totalktmjalan()
	{
		$kueri = "SELECT * FROM $this->tabel WHERE waktumulai = :mulai";
		$this->db->kueri($kueri);
		$this->db->bind('mulai', 0);
		$this->db->eksekusi();
		$var_b = $this->db->hitung_baris();
		$var_a = $this->totalktm();
		$hasil = $var_a - $var_b;
		return $hasil;
	}

	function totalkehadiran($npm)
	{
		$kueri = "SELECT * FROM $this->absen WHERE npm=:npm AND keterangan = :ket";
		$this->db->kueri($kueri);
		$this->db->bind('npm', $npm);
		$this->db->bind('ket', 'Hadir');
		$this->db->eksekusi();
		return $this->db->hitung_baris();
	}

	function detilkehadiran($npm)
	{
		$cari = array(
			'ktm' => $this->totalktmjalan(),
			'ada' => $this->totalkehadiran($npm)
		);
		return $cari;
	}

	function detilakun($npm)
	{
		$kueri = "SELECT * FROM $this->siswa WHERE npm=:npm";
		$this->db->kueri($kueri);
		$this->db->bind('npm', $npm);
		$this->db->eksekusi();
		$hasil = array(
			'detil'	=> $this->db->hasil_tunggal(),
			'hadir'	=> $this->detilkehadiran($npm)
		);
		return $hasil;
	}

	function kirimpresensi($npm, $ktm)
	{
		$kueri = "UPDATE $this->absen SET keterangan = :ket WHERE npm = :npm AND kode_tm = :ktm";
		$this->db->kueri($kueri);
		$this->db->bind('ktm', $ktm);
		$this->db->bind('npm', $npm);
		$this->db->bind('ket', 'Hadir');
		$this->db->eksekusi();
		return $this->db->hitung_baris();
	}

	function hapuspresensi($npm, $ktm)
	{
		$kueri = "UPDATE $this->absen SET keterangan = :ket WHERE npm = :npm AND kode_tm = :ktm";
		$this->db->kueri($kueri);
		$this->db->bind('ktm', $ktm);
		$this->db->bind('npm', $npm);
		$this->db->bind('ket', '');
		$this->db->eksekusi();
		return $this->db->hitung_baris();
	}
}