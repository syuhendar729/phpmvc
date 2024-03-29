<?php 

class About extends Controller{

	public function index($nama = 'Syuhada', $jurusan = 'IPA', $umur = 16)
	{
		$data["nama"] = $nama;
		$data["jurusan"] = $jurusan;
		$data["umur"] = $umur;
		$data["judul"] = "About/index";
		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}

	public function page()
	{
		$data["judul"] = "About/page";
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}
