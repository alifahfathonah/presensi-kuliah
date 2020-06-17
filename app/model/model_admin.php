<?php 

/**
 * 
 */
class model_admin extends Kontroler
{
	private $usr = "user";
	private $mhs = "mahasiswa";
	private $mtr = "materi";
	private $pre = "presentasi";
	private $ktm = "tatapmuka";
	private $prs = "presensi";
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	// Mahasiswa

		function tambah_mhs($data)
		{
			$kueri = "INSERT INTO $this->mhs (npm, nama) VALUES (:npm, :nama)";
			$this->db->kueri($kueri);
			$this->db->bind('npm', $data['npm']);
			$this->db->bind('nama', $data['nama']);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function daftar_mhs()
		{
			$kueri = "SELECT * FROM $this->mhs";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			return $this->db->hasil_set();
		}

		function detil_mhs($npm)
		{
			$kueri = "SELECT * FROM $this->mhs WHERE npm=:npm";
			$this->db->kueri($kueri);
			$this->db->bind('npm', $npm);
			$this->db->eksekusi();
			return $this->db->hasil_tunggal();
		}

		function edit_mhs($data)
		{
			$kueri = "UPDATE $this->mhs SET nama=:nama WHERE npm=:npm";
			$this->db->kueri($kueri);
			$this->db->bind('npm', $data['npm']);
			$this->db->bind('nama', $data['nama']);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function hapus_mhs($npm)
		{
			$kueri = "DELETE FROM $this->mhs WHERE npm=:npm";
			$this->db->kueri($kueri);
			$this->db->bind('npm', $npm);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

	// Kuliah

		function tambah_ktm($data)
		{
			$kueri = "INSERT INTO $this->ktm (kode_tm, pertemuan, materi, waktumulai, waktuakhir, tanggal) VALUES (:ktm, :ttm, :mtr, :wml, :wak, :tgl)";
			$this->db->kueri($kueri);
			$this->db->bind('ktm', $data['ktm']);
			$this->db->bind('ttm', $data['ttm']);
			$this->db->bind('mtr', $data['mtr']);
			$this->db->bind('wml', '');
			$this->db->bind('wak', '');
		
			$this->db->bind('tgl', $data['tgl']);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function daftar_ktm()
		{
			$kueri = "SELECT * FROM $this->ktm";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			return $this->db->hasil_set();
		}

		function detil_ktm($kode_tm)
		{
			$kueri = "SELECT * FROM $this->ktm WHERE kode_tm = :ktm";
			$this->db->kueri($kueri);
			$this->db->bind('ktm', $kode_tm);
			$this->db->eksekusi();
			return $this->db->hasil_tunggal();
		}

		// function detil_ktm_belum_hadir($kode_tm)
		// {
		// 	$kueri = "SELECT COUNT(*) AS repetisi, npm, nama, waktu, kode_tm FROM $this->prs JOIN $this->mhs WHERE kode_tm = :ktm AND npm_id != npm HAVING repetisi > 1";
		// 	$this->db->kueri($kueri);
		// 	$this->db->bind('ktm', $kode_tm);
		// 	$this->db->eksekusi();
		// 	return $this->db->hasil_tunggal();
		// }

		function detil_ktm_hadir($kode_tm) // Jumlah Mahasiswa Hadir dalam Perkuliahan
		{
			$kueri = "SELECT * FROM $this->prs WHERE kode_tm = :ktm AND keterangan = :ket";
			$this->db->kueri($kueri);
			$this->db->bind('ket', 'Hadir');
			$this->db->bind('ktm', $kode_tm);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function detil_ktm_hadir1($kode_tm) // For WA Templates
		{ 
			$kueri = "SELECT * FROM $this->prs JOIN $this->mhs USING (npm) WHERE kode_tm = :ktm AND keterangan = :ket ORDER BY waktu ASC";
			$this->db->kueri($kueri);
			$this->db->bind('ktm', $kode_tm);
			$this->db->bind('ket', 'Hadir');
			$this->db->eksekusi();
			return $this->db->hasil_set();
		}

		function detil_ktm_totalmhs($kode_tm) // Total Mahasiswa dalam Satu Kelas
		{
			$kueri = "SELECT * FROM $this->mhs";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function detil_ktm_dtmhs_hadir($kode_tm)
		{
			$kueri = "SELECT npm, kode_tm, nama, waktu, keterangan FROM $this->prs JOIN $this->mhs USING (npm) WHERE kode_tm = :ktm";
			$this->db->kueri($kueri);
			$this->db->bind('ktm', $kode_tm);
			$this->db->eksekusi();
			return $this->db->hasil_set();
		}

		function edit_ktm($data)
		{
			$kueri = "UPDATE $this->ktm SET pertemuan = :ttm, materi = :mtr, tanggal = :tgl WHERE kode_tm = :ktm";
			$this->db->kueri($kueri);
			$this->db->bind('ktm', $data['ktm']);
			$this->db->bind('ttm', $data['ttm']);
			$this->db->bind('mtr', $data['mtr']);
			$this->db->bind('tgl', $data['tgl']);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function buka_ktm($kode_tm)
		{
			$kueri = "UPDATE $this->ktm SET waktumulai = :mulai WHERE kode_tm = :ktm; INSERT INTO $this->prs (npm, kode_tm) SELECT `$this->mhs`.`npm`, `$this->ktm`.`kode_tm` FROM $this->mhs JOIN $this->ktm WHERE `$this->ktm`.`kode_tm` = :ktm";
			$this->db->kueri($kueri);
			$this->db->bind('mulai', date('Y-m-d H:i:s'));
			$this->db->bind('ktm', $kode_tm);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function tutup_ktm($kode_tm)
		{
			$kueri = "UPDATE $this->ktm SET waktuakhir = :akhir WHERE kode_tm = :ktm";
			$this->db->kueri($kueri);
			$this->db->bind('akhir', date('Y-m-d H:i:s'));
			$this->db->bind('ktm', $kode_tm);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function hapus_ktm($kode_tm)
		{
			$kueri = "DELETE FROM $this->ktm WHERE kode_tm = :ktm";
			$this->db->kueri($kueri);
			$this->db->bind('ktm', $kode_tm);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

	// Materi

		function tambah_mtr($post, $file)
		{
			$file1 = explode('/', $file['file']['type']);
			$kueri = "INSERT INTO $this->pre (id, author, judul, file, jenis_file, tanggal) VALUES (:nomor, :authr, :judul, :files, :tfile, :tanggal)";
			$this->db->kueri($kueri);
			$this->db->bind('nomor', $post['id']);
			$this->db->bind('authr', $post['author']);
			$this->db->bind('judul', $post['judul']);
			$this->db->bind('files', '/aset/upload/materi/' . $post['id'] . '.' . $file1[1]);
			$this->db->bind('tfile', $file['file']['type']);
			$this->db->bind('tanggal', date('Y-m-d H:i:s'));
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function nomor_mtr_lama()
		{
			$kueri = "SELECT max(id) AS kode FROM $this->mtr";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$nlama = $this->db->hasil_tunggal();
			$kupas = (int) substr($nlama['kode'], -4, 4);
			$hasil = $kupas + 1;
			if ( date('m') <= 6 ) {
				$semes = 2;
			} else {
				$semes = 1;
			}
			$tahun = 'MAT' . date('y') . $semes;
			if ( $hasil < 10 ) $nbaru = $tahun . '000' . $hasil;
			else if ( $hasil <= 10 && $hasil < 100 ) $nbaru = $tahun . '00' . $hasil;
			else if ( $hasil <= 100 && $hasil < 1000 ) $nbaru = $tahun . '0' . $hasil;
			else $nbaru = $tahun . '-' . $hasil;
			return $nbaru;
		}

		function daftar_mtr()
		{
			$kueri = "SELECT * FROM $this->mtr ORDER BY tanggal DESC";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = array(
				'sum' => $this->db->hitung_baris(),
				'set' => $this->db->hasil_set()
			);
			return $hasil;
		}

	// 	function detil_mtr($mtr_id);
	// 	function edit_mtr($data);
		function hapus_mtr($mtr_id)
		{
			$files = explode('.', $mtr_id);

			$kueri = "DELETE FROM $this->mtr WHERE id = :num";
			$this->db->kueri($kueri);
			$this->db->bind('num', $files[0]);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

	// Presentasi

		function tambah_pre($post, $file)
		{
			$file1 = explode('/', $file['file']['type']);
			$file2 = explode('/', $file['lamp']['type']);
			$kueri = "INSERT INTO $this->pre (id, npm, judul, file, jenis_file, lampiran, jenis_lampiran, tanggal) VALUES (:nomor, :authr, :judul, :files, :tfile, :lamps, :tlamp, :tanggal)";
			$this->db->kueri($kueri);
			$this->db->bind('nomor', $post['id']);
			$this->db->bind('authr', $post['npm']);
			$this->db->bind('judul', $post['judul']);
			$this->db->bind('files', '/aset/upload/presentasi/materi/main_' . $post['id'] . '.' . $file1[1]);
			$this->db->bind('tfile', $file['file']['type']);
			$this->db->bind('lamps', '/aset/upload/presentasi/lampiran/lamp_' . $post['id'] . '.' . $file2[1]);
			$this->db->bind('tlamp', $file['lamp']['type']);
			$this->db->bind('tanggal', date('Y-m-d H:i:s'));
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}

		function nomor_pre_lama()
		{
			$kueri = "SELECT max(id) AS kode FROM $this->pre";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$nlama = $this->db->hasil_tunggal();
			$kupas = (int) substr($nlama['kode'], -4, 4);
			$hasil = $kupas + 1;
			if ( date('m') <= 6 ) {
				$semes = 2;
			} else {
				$semes = 1;
			}
			$tahun = 'PRE' . date('y') . $semes;
			if ( $hasil < 10 ) $nbaru = $tahun . '000' . $hasil;
			else if ( $hasil <= 10 && $hasil < 100 ) $nbaru = $tahun . '00' . $hasil;
			else if ( $hasil <= 100 && $hasil < 1000 ) $nbaru = $tahun . '0' . $hasil;
			else $nbaru = $tahun . '-' . $hasil;
			return $nbaru;
		}

		function daftar_pre()
		{
			$kueri = "SELECT * FROM $this->pre JOIN $this->mhs USING (npm) ORDER BY tanggal DESC";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = array(
				'sum' => $this->db->hitung_baris(),
				'set' => $this->db->hasil_set()
			);
			return $hasil;
		}
	// 	function detil_pre($pre_id);
	// 	function edit_pre($data);
		function hapus_pre($pre_id)
		{
			$files = explode('.', $pre_id);
			$newid = explode('_', $files[0]);
			$kueri = "DELETE FROM $this->pre WHERE id = :nid";
			$this->db->kueri($kueri);
			$this->db->bind('nid', $newid[1]);
			$this->db->eksekusi();
			return $this->db->hitung_baris();
		}
}