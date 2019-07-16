<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StrukturOrganisasiController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('StrukturOrganisasi');
	}
	public function index()
	{
		$this->vars['data'] = $this->StrukturOrganisasi->latest()->get();
		return view('admin.struktur_organisasi.index', $this->vars);
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
			$this->vars['query'] = $this->StrukturOrganisasi->findOrFail($id);
			$this->vars['id'] = $id;
		}
		$this->vars['title'] = _isNaturalNumber( $id ) ? 'Edit Data Struktur Organisasi' : 'Tambah Data Struktur Organisasi';
		$this->vars['action'] = site_url('admin/struktur_organisasi/save/'.$id);


		$this->session->set_userdata('referred_from', current_url());


		return view('admin.struktur_organisasi.create', $this->vars);
	}



	public function save() {

		$id = _toInteger($this->input->post('id'));
		if ($this->validation()) {
			$fill_data = $this->fill_data();

			$createUpdate = $this->StrukturOrganisasi->updateOrCreate(['id' => $id], $fill_data);
		
			return redirect(site_url('admin/struktur_organisasi'));

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
		$this->StrukturOrganisasi->find($id)->delete();

		return redirect(site_url('admin/struktur_organisasi'));
	}


}

/* End of file BeritaController.php */
/* Location: ./application/controllers/admin/struktur_organisasiController.php */