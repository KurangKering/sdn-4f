<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuoteController extends Admin_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Quote');
	}
	public function index()
	{
		$quotes = $this->Quote->get();
		$this->vars['data'] = $quotes;
		$this->vars['title'] = 'Data Kata Bijak';
		return view('admin.quote.index', $this->vars);
	}

	public function create()
	{
		$this->load->helper('form');
		$this->vars['query'] = false;
		$id                  = _toInteger($this->uri->segment(4));

		if (_isNaturalNumber($id)) {
			$this->vars['data'] = $this->Quote->findOrFail($id);

		}
		$this->vars['title'] = _isNaturalNumber($id) ? 'Edit Quote' : 'Tambah Quote';

		return view('admin.quote.create', $this->vars);
	}

	public function save()
	{
		$id = $this->input->post('id') ?? null;
		$post = $this->input->post();
		$input_data = [
			'quote' => $post['quote'],
			'oleh' => $post['oleh'],
		];	

		$save = $this->Quote->updateOrCreate(['id' => $id], $input_data);
		return redirect(site_url('admin/quote'));

	}
	public function delete()
	{
		$id = $this->input->post('id');
		$this->Quote->find($id)->delete();
		
		return redirect(site_url('admin/quote'));

	}

}

/* End of file QuoteController.php */
/* Location: ./application/controllers/admin/QuoteController.php */