<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as Capsule;


class DashboardController extends Admin_Controller {

	public function index()
	{
		$this->load->model('Berita');
		$this->load->model('Photo');
		$this->load->model('HubungiKami');
		$this->vars['count']['berita'] = $this->Berita::count();
		$this->vars['count']['foto'] = $this->Photo::count();
		$this->vars['count']['hubungi_kami'] = $this->HubungiKami::count();
		return view('admin.dashboard', $this->vars);
	}

}

/* End of file DashboardController.php */
/* Location: ./application/controllers/DashboardController.php */