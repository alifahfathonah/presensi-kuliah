<?php

/**
 * 
 */
class model_beranda extends Kontroler
{
	private $materi = "materi";
	private $presen = "presentasi";
	private $msiswa = "mahasiswa";
	private $db;

	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	public function dapatmateri()
	{
		$kueri = "SELECT * FROM $this->materi ORDER BY tanggal DESC";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = array(
			'set' => $this->db->hasil_set(),
			'sum' => $this->db->hitung_baris()
		);
		return $hasil;
	}

	public function dapatpresentasi()
	{
		$kueri = "SELECT * FROM $this->presen JOIN $this->msiswa USING (npm) ORDER BY tanggal DESC";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = array(
			'set' => $this->db->hasil_set(),
			'sum' => $this->db->hitung_baris()
		);
		return $hasil;
	}
}