<?php

/**
 * 
 */
class model_auth extends Kontroler
{
	private $usr = "user"; 
	private $mhs = "mahasiswa";
	private $db;

	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	function masuk_mhs($data)
	{
		$kueri = "SELECT * FROM $this->mhs WHERE npm = :npm";
		$this->db->kueri($kueri);
		$this->db->bind('npm', $data['npm']);
		$this->db->eksekusi();
		$hasil = array(
			'one' => $this->db->hasil_tunggal(),
			'row' => $this->db->hitung_baris()
		);
		return $hasil;
	}

	function masuk_usr($data)
	{
		$kueri = "SELECT * FROM $this->usr WHERE username = :uname AND password = :pword";
		$this->db->kueri($kueri);
		$this->db->bind('uname', $data['uname']);
		$this->db->bind('pword', md5($data['pword']));
		$this->db->eksekusi();
		$hasil = array(
			'one' => $this->db->hasil_tunggal(),
			'row' => $this->db->hitung_baris()
		);
		return $hasil;
	}
}