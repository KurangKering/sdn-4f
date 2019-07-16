<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SambutanController extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{	

		return view('public.sambutan.index', $this->vars);
	}

}

/* End of file SambutanKepalaSekolahController.php */
/* Location: ./application/controllers/public/SambutanKepalaSekolahController.php */