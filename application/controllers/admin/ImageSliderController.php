<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageSliderController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ImageSlider');
		
	}
	public function index()
	{
		$sliders = $this->ImageSlider->get();
		$this->vars['data'] = $sliders;
		$this->vars['title'] = 'Daftar Image Slider';
		return view('admin.image_slider.index', $this->vars);
	}


	public function delete()
	{
		$id = $this->input->post('id');
		$slider = $this->ImageSlider->findOrFail($id);
		if (!empty($slider->url)) {
			@chmod(FCPATH.'media/sliders/'.$slider->url, 0777);

				// unlink old file
			@unlink(FCPATH.'media/sliders/'.$slider->url);
		}
		$delete = $this->ImageSlider->where('id', $id)->delete();
		return redirect(site_url('admin/image-slider'));
	}

	public function create()
	{

		$id = $this->uri->segment(4);
		if ($id) {
			$slider = $this->ImageSlider->findOrFail($id);
			$this->vars['data'] =$slider;
			$path = site_url('media/sliders/');
			$this->vars['post_image'] = $slider->url ? $path . $slider->url : '';
		}
		$this->vars['title'] = 'Tambah Image Slider';
		return view('admin.image_slider.create', $this->vars);
	}

	public function save()
	{


		$id = _toInteger($this->input->post('id'));

		$fill_data = $this->input->post();
		$error_message = '';
		if ( ! empty($_FILES['post_image']['name']) ) {
			$upload = $this->upload_image($id);

			if ($upload['status'] == 'success') {
				$fill_data['url'] = $upload['file_name'];

			} else {
				$error_message = $upload['message'];
			}
		}

		if ( ! empty( $error_message ) ) {
			$this->vars['status'] = 'error';
			$this->vars['message'] = $error_message;
		} else {

			$query = $this->ImageSlider->updateOrCreate(['id' => $id], $fill_data);
			$this->vars['action'] = _isNaturalNumber( $id ) ? 'update' : 'insert';
			$this->vars['status'] = $query ? 'success' : 'error';
			$this->vars['message'] = $query ? 'Data Anda berhasil disimpan.' : 'Terjadi kesalahan dalam menyimpan data';

		}

		return redirect(site_url('admin/image-slider'));




		
	}

	private function upload_image($id) {
		$config['upload_path'] = './media/sliders/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = 0;
		$config['encrypt_name'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('post_image')) {
			$this->vars['status'] = 'error';
			$this->vars['message'] = $this->upload->display_errors();
		} else {
			$file = $this->upload->data();

			// chmood new file
			@chmod(FCPATH.'media/sliders/'.$file['file_name'], 0777);
			// resize new image

			$this->vars['status'] = 'success';
			$this->vars['file_name'] = $file['file_name'];
			if ( _isNaturalNumber($id) ) {
				$query = $this->ImageSlider->findOrFail($id);
				// chmood old file
				@chmod(FCPATH.'media/sliders/'.$query->url, 0777);

				// unlink old file
				@unlink(FCPATH.'media/sliders/'.$query->url);

			}
		}
		return $this->vars;
	}
	


}

/* End of file ImageSliderController.php */
/* Location: ./application/controllers/admin/ImageSliderController.php */