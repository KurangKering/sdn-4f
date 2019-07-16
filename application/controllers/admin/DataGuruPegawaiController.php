<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataGuruPegawaiController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Berita');
		$this->load->model('KategoriBerita');
		$this->load->model('KomentarBerita');
		$this->load->model('DataGuruPegawai');
	}
	public function index()
	{
		$this->vars['data'] = $this->DataGuruPegawai->latest()->get();
		return view('admin.data_guru_pegawai.index', $this->vars);
	}

	public function komentar()
	{
		$berita_id = _toInteger($this->uri->segment(4));

		$berita = $this->Berita->with('komentar_berita')->find($berita_id);

		$this->vars['berita'] = $berita;
		return view('admin.berita.komentar', $this->vars); 

	}

	public function create()
	{

		$this->vars['query'] = FALSE;
		$id = _toInteger($this->uri->segment(4));


		if (_isNaturalNumber( $id )) {
			$this->vars['query'] = $this->DataGuruPegawai->findOrFail($id);
			$this->vars['id'] = $id;
		}
		$this->vars['title'] = _isNaturalNumber( $id ) ? 'Edit Data Guru & Pegawai' : 'Tambah Data Guru & Pegawai';
		$this->vars['action'] = site_url('admin/berita/save/'.$id);


		$this->session->set_userdata('referred_from', current_url());


		return view('admin.data_guru_pegawai.create', $this->vars);
	}



	public function save() {

		$id = _toInteger($this->input->post('id'));
		if ($this->validation()) {
			$fill_data = $this->fill_data();

			$createUpdate = $this->DataGuruPegawai->updateOrCreate(['id' => $id], $fill_data);
		
			return redirect(site_url('admin/data_guru_pegawai'));

		} else {
			$this->vars['status'] = 'error';
			$this->vars['message'] = validation_errors();
			$this->session->set_flashdata('validation_errors', $this->form_validation->error_array());
			$referred_from = $this->session->userdata('referred_from');
			redirect($referred_from);
		}


	}		


	private function fill_data() {
		return [
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
		];
	}

	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('nama', 'Nama', 'required');
		$val->set_rules('jabatan', 'Jabatan', 'required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}


	public function delete()
	{
		$id = $this->input->post('id');
		$this->DataGuruPegawai->find($id)->delete();

		return redirect(site_url('admin/data_guru_pegawai'));
	}


}

/* End of file BeritaController.php */
/* Location: ./application/controllers/admin/BeritaController.php */