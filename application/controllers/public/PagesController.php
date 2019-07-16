<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagesController extends Public_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pages');
		$this->load->model('DataGuruPegawai');
		$this->load->model('StrukturOrganisasi');


	}
	public function index()
	{
		
	}
	public function sambutan()
	{
		$this->vars['sambutan'] = $this->Pages->where('title', 'sambutan')->first();
		return view('public.page_sambutan', $this->vars);
	}

	public function visi_misi()
	{
		$this->vars['visi_misi'] = $this->Pages->where('title', 'visi_misi')->first();
		return view('public.page_visi_misi', $this->vars);
	}

	public function profil()
	{
		$this->vars['profil'] = $this->Pages->where('title', 'profil')->first();
		return view('public.page_profil', $this->vars);
	}

	public function guru_pegawai()
	{
		$this->vars['dataGuruPegawai'] = $this->DataGuruPegawai->latest()->get();
		return view('public.page_guru_pegawai', $this->vars);
	}

	public function struktur_organisasi()
	{
		$this->vars['dataStrukturOrganisasi'] = $this->StrukturOrganisasi->latest()->get();
		return view('public.page_struktur_organisasi', $this->vars);
	}

	public function ruangan()
	{
		$this->vars['dataRuangan'] = $this->Pages->where('title', 'ruangan')->first();
		return view('public.page_ruangan', $this->vars);
	}

	public function elektronik()
	{
		$this->vars['dataElektronik'] = $this->Pages->where('title', 'elektronik')->first();
		return view('public.page_elektronik', $this->vars);
	}
	public function moubiler()
	{
		$this->vars['dataMoubiler'] = $this->Pages->where('title', 'moubiler')->first();
		return view('public.page_moubiler', $this->vars);
	}
	public function inventaris()
	{
		$this->vars['dataInventaris'] = $this->Pages->where('title', 'inventaris')->first();
		return view('public.page_inventaris', $this->vars);
	}
	public function prestasi()
	{
		$this->vars['dataPrestasi'] = $this->Pages->where('title', 'prestasi')->first();
		return view('public.page_prestasi', $this->vars);
	}

	public function ekstrakulikuler()
	{
		$this->vars['dataEkstrakulikuler'] = $this->Pages->where('title', 'ekstrakulikuler')->first();
		return view('public.page_ekstrakulikuler', $this->vars);
	}

}

/* End of file PagesController.php */
/* Location: ./application/controllers/public/PagesController.php */