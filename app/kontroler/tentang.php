<?php

/**
 * 
 */
class tentang extends Kontroler
{
	public function indeks($nama = 'waw', $semester = '4')
	{
		$data = array(	
			'judul'    => 'Tentang',
			'pages'    => 'Tentang',
			'nama'     => $nama,
			'semester' => $semester
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar', $data);
		$this->tampilkan('tentang/halaman', $data);
		$this->tampilkan('templat/footer');
	}
	
	public function halaman()
	{
		echo "tentang/halaman";
	}
}