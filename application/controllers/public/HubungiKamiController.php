<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HubungiKamiController extends Public_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('HubungiKami');
	}

	public function index()
	{
		return view('public.hubungi_kami', $this->vars);
	}

	public function save()
	{	

		$post = $this->input->post();
		$simpan = $this->HubungiKami->create($post);

		return redirect(site_url('pages/hubungi-kami'));
	}

}

/* End of file HubungiKamiConroller.php */
/* Location: ./application/controllers/public/HubungiKamiConroller.php */