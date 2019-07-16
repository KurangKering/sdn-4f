<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBeritaController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriBerita');
	}
	public function index()
	{
		$this->vars['data'] = $this->KategoriBerita->latest()->get();

		$this->vars['title'] = 'Kategori Berita';
		return view('admin.kategori_berita.index', $this->vars);
	}
	public function create()
	{	
		$this->vars['query'] = false;
		$id                  = _toInteger($this->uri->segment(4));

		if (_isNaturalNumber($id)) {
			$this->vars['data'] = $this->KategoriBerita->findOrFail($id);

		}
		$this->vars['title'] = _isNaturalNumber($id) ? 'Edit KategoriBerita' : 'Tambah Kategori Berita';


		return view('admin.kategori_berita.create', $this->vars);
	}

	public function save()
	{
		$id = $this->input->post('id') ?? null;

		$post['kategori'] = $this->input->post('kategori');

		$save = $this->KategoriBerita->updateOrCreate(['id' => $id], $post);
		

		return redirect(site_url('admin/kategori_berita'));
	}


	public function delete()
	{
		$id = $this->input->post('id');
		$message = '';
		try {
			$this->KategoriBerita->find($id)->delete();
			
		} catch (Exception $e) {
			$message = $e->getMessage();
		}

		return redirect(site_url('admin/kategori_berita'));
	}

}

/* End of file KategoriBeritaController.php */
/* Location: ./application/controllers/admin/KategoriBeritaController.php */