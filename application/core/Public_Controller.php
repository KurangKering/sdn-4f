<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_Controller extends MY_Controller {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('Pengaturan');
		$this->load->model('Berita');
		$this->load->model('ImageSlider');
		$this->load->model('KomentarBerita');

		$this->getPengaturan();
		$this->getBerita();
		$this->getImageSliders();




	}

	private function getPengaturan() 
	{
		$this->vars['pengaturan'] = $this->Pengaturan->pluck('nilai', 'nama');
	}
	private function getImageSliders() 
	{
		$this->vars['image_sliders'] = $this->ImageSlider->get();
	}
	private function getBerita()
	{
		$this->load->model('Berita');
		$berita = $this->Berita->withCount('komentar_berita')->orderBy('komentar_berita_count', 'desc')->first();
		$this->vars['komen_terbanyak'] = $berita;

	}
	public function index()
	{
		
	}

}

/* End of file PublicController.php */
/* Location: ./application/core/PublicController.php */