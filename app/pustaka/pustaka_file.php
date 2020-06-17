<?php 

/**
 * 
 */
class pustaka_file
{
	private $nama_file;
	private $tipe_file;
	private $nama_temp;
	private $direktori;
	private $terunggah;
	
	function unggah_mtr($post, $file)
	{
		$tipe = explode('/', $file['file']['type']);
		$data = array(
			'tn' => $file['file']['tmp_name'], 
			'nf' => $post['id'],
			'tf' => $tipe[1],
			'di' => DIREKTORI . '/aset/upload/materi/'
		);
		$up = move_uploaded_file($data['tn'], $data['di'] . $data['nf'] . '.' . $data['tf']);

		if ( $up ) {
			return 1;
		} else {
			return 0;
		}
	}

	function hapus_mtr($kdmtr)
	{
		$data = DIREKTORI . '/aset/upload/materi/' . $kdmtr;
		if ( file_exists($data) ) {
			unlink($data);
		}

		if ( file_exists($data) ) {
			return 0;
		} else {
			return 1;
		}
	}

	function unggah_pre($post, $file)
	{
		$tipe_main = explode('/', $file['file']['type']);
		$tipe_lamp = explode('/', $file['lamp']['type']);
		$data = array(
			'tn_m' => $file['file']['tmp_name'], 
			'tn_l' => $file['lamp']['tmp_name'],
			'tf_m' => $tipe_main[1],
			'tf_l' => $tipe_lamp[1],
			'di_m' => DIREKTORI . '/aset/upload/presentasi/materi/',
			'di_l' => DIREKTORI . '/aset/upload/presentasi/lampiran/',
			'nf_m' => 'main_' . $post['id'],
			'nf_l' => 'lamp_' . $post['id']
		);

		$up = array(
			'm' => move_uploaded_file($data['tn_m'], $data['di_m'] . $data['nf_m'] . '.' . $data['tf_m']),
			'l' => move_uploaded_file($data['tn_l'], $data['di_l'] . $data['nf_l'] . '.' . $data['tf_l'])
		);

		return $up;
	}

	function hapus_pre($kdprm, $kdprl)
	{
		$data = array(
			'm' => DIREKTORI . '/aset/upload/presentasi/materi/' . $kdprm,
			'l' => DIREKTORI . '/aset/upload/presentasi/lampiran/' . $kdprl
		);

		if ( file_exists($data['m']) ) unlink($data['m']);

		if ( file_exists($data['l']) ) unlink($data['l']);

		if ( file_exists($data['m']) ) {
			return 0;
		} else {
			return 1;
		}
	}
}