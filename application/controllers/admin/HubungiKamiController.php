<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HubungiKamiController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('HubungiKami');
	}
	public function index()
	{
		$this->vars['data_hubungi'] = $this->HubungiKami->latest()->get();
		return view('admin.hubungi_kami.index', $this->vars);
	}

}

/* End of file HubungiKamiController.php */
/* Location: ./application/controllers/admin/HubungiKamiController.php */