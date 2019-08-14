<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GaleriVideoController extends Public_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Video');
	}
	public function index()
	{
		$videos = $this->Video->latest()->get();
		$this->vars['videos'] = $videos;
		return view('public.galeri_video.index', $this->vars);
	}

	public function preview() {
		if ($this->input->is_ajax_request()) {
			$id = _toInteger($this->input->post('id', true));

			if (_isNaturalNumber( $id )) {
				$query = $this->Photo->where('album_photo_id', $id)->get();
				$items = [];
				foreach($query as $row) {
					$items[] = [
						'src' => base_url('media/photo/large/'.$row->url)
					];
				}
				$this->vars = [
					'count' => count($items),
					'items' => $items
				];
			}

			$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))
			->_display();
			exit;
		}
	}

}

/* End of file GaleriVideoController.php */
/* Location: ./application/controllers/public/GaleriVideoController.php */