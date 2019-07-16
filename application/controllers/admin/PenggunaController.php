<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaController extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengguna');
	}
	public function index()
	{

		$users = $this->Pengguna->get();
		return view('admin.pengguna.index', compact('users'));
	}

	public function create()
	{
		$this->load->helper('form');
		$this->vars['query'] = false;
		$id                  = _toInteger($this->uri->segment(4));

		if (_isNaturalNumber($id)) {
			$this->vars['data'] = $this->Pengguna->findOrFail($id);

		}
		$this->vars['title'] = _isNaturalNumber($id) ? 'Edit Pengguna' : 'Tambah Pengguna';

		return view('admin.pengguna.create', $this->vars);
	}
	public function save()
	{
		$id = $this->input->post('id') ?? null;
		$post = $this->input->post();
		$input_data = [
			'nama' => $post['nama'],
			'username' => $post['username'],
			'email' => $post['email'],
			'role' => $post['role'],
		];	

		if ($post['password']) {
			$input_data['password'] = md5($post['password']);
		}

		if ($id) {


			$d = $this->Pengguna->find($id)->update($input_data);
		} else {
			$this->Pengguna->create($input_data);
		}
		return redirect(site_url('admin/pengguna'));

	}
	public function delete()
	{
		$id = $this->input->post('id');
		$this->Pengguna->find($id)->delete();
		
		return redirect(site_url('admin/pengguna'));

	}

	public function _cek_email($email)
	{
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
		} else {
			$id = '';
		}

		$result = $this->Pengguna->where();
		if ($result == 0) {
			$response = true;
		} else {
			$this->form_validation->set_message('check_user_email', 'Email must be unique');
			$response = false;
		}
		return $response;
	}
}

/* End of file PenggunaController.php */
/* Location: ./application/controllers/PenggunaController.php */
