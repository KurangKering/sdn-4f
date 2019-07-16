<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class AuthController extends CI_Controller {

	public function index()
	{
		
	}


	public function login_page()
	{
		if ($this->session->userdata('user')) {
			return redirect(site_url('admin/dashboard'));
		}
		return view('login');
	}

	public function do_login_admin()
	{
		$this->load->model('Pengguna', 'admin');
		$post = $this->input->post();
		$input_cek = [
			'username' => $post['username'],
			'password' => md5($post['password']),
		];

		$isExist = $this->admin->where($input_cek)->first();
		if ($isExist) {
			$user = array(
				'id' => $isExist->id,
				'role' => $isExist->role,
			);
			
			$this->session->set_userdata( compact('user') );
			return redirect(site_url('admin/dashboard'));
		} else {
			$this->session->set_flashdata('errors', 'username / password salah');
			return redirect(site_url('login'));

		}
		die();
	}

	public function do_logout()
	{
		$this->session->sess_destroy();
		return redirect(site_url('login'));
	}
}

/* End of file AuthController.php */
/* Location: ./application/controllers/admin/AuthController.php */