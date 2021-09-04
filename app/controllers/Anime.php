<?php 

class Anime extends Controller{
	
	public function index()
	{
		$data["judul"] = "Daftar Anime";
		$data["anm"] = $this->model('Anime_model')->getAllAnime();
		$this->view('templates/header', $data);	
		$this->view('anime/index', $data);	
		$this->view('templates/footer');	
	}

	public function detail($id)
	{
		$data["judul"] = "Detail Anime";
		$data["anm"] = $this->model('Anime_model')->getAnimeById($id);
		$this->view('templates/header', $data);	
		$this->view('anime/detail', $data);	
		$this->view('templates/footer');	
	}

	public function tambah()
	{
		if ( $_POST == NULL ) {
			header('Location: ' . BASEURL . '/Anime');
			exit;
		}

		if ( $this->model('Anime_model')->tambahDataAnime($_POST) > 0 ) {
			Flasher::setFlash("berhasil ", "ditambahkan", "success");
			header('Location: ' . BASEURL . '/Anime');
			exit;
		} else {
			Flasher::setFlash("gagal ", "ditambahkan", "danger");
			header('Location: ' . BASEURL . '/Anime');
			exit;
		}
	}

	public function hapus($id)
	{
		
		if ( $this->model('Anime_model')->hapusDataAnime($id) > 0 ) {
			Flasher::setFlash("berhasil ", "dihapus", "success");
			header('Location: ' . BASEURL . '/Anime');
			exit;
		} else {
			Flasher::setFlash("gagal ", "dihapus", "danger");
			header('Location: ' . BASEURL . '/Anime');
			exit;
		}
	}

	public function getubah()
	{
		echo json_encode( $this->model('Anime_model')->getAnimeById($_POST["id"]) );
	}

	public function ubah()
	{
		if ( $_POST == NULL ) {
			header('Location: ' . BASEURL . '/Anime');
			exit;
		}

		if ( $this->model('Anime_model')->ubahDataAnime($_POST) > 0 ) {
			Flasher::setFlash("berhasil ", "diubah", "success");
			header('Location: ' . BASEURL . '/Anime');
			exit;
		} else {
			Flasher::setFlash("gagal ", "diubah", "danger");
			header('Location: ' . BASEURL . '/Anime');
			exit;
		}
	}

	public function cari()
	{
		$data["judul"] = "Daftar Anime yang dicari";
		$data["anm"] = $this->model('Anime_model')->cariDataAnime();
		$this->view('templates/header', $data);	
		$this->view('anime/index', $data);	
		$this->view('templates/footer');
	}
}
