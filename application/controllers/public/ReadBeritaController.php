<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class ReadBeritaController extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		
	}

	public function read()
	{
		$id = $this->uri->segment(3);
		$this->vars['berita'] = $this->Berita->findOrFail($id);
		return view('public.berita.read', $this->vars);
	}

	public function post_komen()
	{	
		$post = $this->input->post();
		$save = $this->KomentarBerita->create($post);

		return redirect(($post['current_url']));
	}

	public function list()
	{	
		$this->load->model('Berita');

		$offset = $this->uri->segment(3) ? $this->uri->segment(3) : 1;
		$offset = $offset - 1;
		$limit = 5;
		$offset = $offset * $limit;
		
		$daftarBerita = $this->Berita->latest()->take($limit)->skip($offset)->get();

		$totalRow = $this->Berita->get()->count();


		$this->vars['daftarBerita'] = $daftarBerita;

		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'berita/page/';
		$config['total_rows'] = $totalRow;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		// $config['num_links'] = 3;

		  // Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);


		return view('public.berita.list', $this->vars);
		
	}


}

/* End of file ReadBeritaController.php */
/* Location: ./application/controllers/public/ReadBeritaController.php */