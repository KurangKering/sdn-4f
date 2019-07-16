<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as DB;

class IndexController extends Public_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('Quote');
	}
	public function index()
	{

		$id = 1;
		$this->vars['quotes'] = $this->Quote->latest()->get();
		$this->vars['daftar_berita'] = $this->Berita->latest()->take(8)->get();
		return view('public.index', $this->vars);
	}

}

/* End of file IndexController.php */
/* Location: ./application/controllers/IndexController.php */