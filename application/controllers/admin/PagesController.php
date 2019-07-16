<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagesController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pages');
	}
	public function index()
	{
		
	}


	public function profil()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'profil')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "Profil Sekolah";
		return view('admin.pages.profil', $this->vars);
	}
	public function sambutan()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'sambutan')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "Kata Sambutan Kepala Sekolah";
		return view('admin.pages.sambutan', $this->vars);
	}
	public function visi_misi()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'visi_misi')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "Visi Misi";
		return view('admin.pages.visi_misi', $this->vars);
	}
	public function ruangan()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'ruangan')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "Ruangan";
		return view('admin.pages.ruangan', $this->vars);
	}
	public function elektronik()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'elektronik')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "Elektronik";
		return view('admin.pages.elektronik', $this->vars);
	}
	public function moubiler()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'moubiler')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "moubiler";
		return view('admin.pages.moubiler', $this->vars);
	}
	public function inventaris()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'inventaris')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "inventaris";
		return view('admin.pages.inventaris', $this->vars);
	}

	public function prestasi()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'prestasi')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "prestasi";
		return view('admin.pages.prestasi', $this->vars);
	}
	public function ekstrakulikuler()
	{	
		$this->vars['query'] = $this->Pages->where('title', 'ekstrakulikuler')->first();
		$this->vars['action'] = site_url('admin/pages/save');
		$this->vars['title'] = "Ekstrakulikuler";
		return view('admin.pages.ekstrakulikuler', $this->vars);
	}

	public function save()
	{
		$post['title'] = $this->input->post('title');
		$post['isi'] = $this->input->post('isi');
		$save = $this->Pages->updateOrCreate(['title' => $post['title']], $post);
		die();
		$this->vars['status'] = $save ? 'success' : 'error';
		$this->vars['message'] = $save ? 'Data Anda berhasil disimpan.' : 'Terjadi kesalahan dalam menyimpan data';
		$this->output
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))
		->_display();
		exit;
	}

	public function images_upload_handler() {
		$config['upload_path'] = './media/pages/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 0;
		$this->vars = [];
		$this->load->library('upload');
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('file')) {
			$this->vars['status'] = 'error';
			$this->vars['message'] = $this->upload->display_errors('', '');
		} else {
			$file = $this->upload->data();
			$this->vars['status'] = 'success';
			$this->vars['location'] = base_url('media/pages/'.$file['file_name']);
		}
		$this->output
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))
		->_display();
		exit;
	}

}

/* End of file PagesController.php */
/* Location: ./application/controllers/admin/PagesController.php */