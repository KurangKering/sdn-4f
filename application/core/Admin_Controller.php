<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$sess = $this->session->userdata('user');

		if ($sess['role'] != 'admin' ) {
			return redirect(site_url('login'));
		}
	}
	public function index()
	{
		
	}

}

/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */