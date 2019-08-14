<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Video');
		
	}

	public function index()
	{
		
		$daftar_video = $this->Video->get();
		$this->vars['daftar_video'] = $daftar_video;
		return view('admin.video.index', $this->vars);
	}

	public function create()
	{
		$this->vars['title'] = 'Tambah Video';
		
		return view('admin.video.create', $this->vars);
	}

	
	public function save()
	{


		$fill_data = $this->input->post();
		$error_message = '';
		if ( ! empty($_FILES['file']['name']) ) {

			$upload = $this->upload_video($id);

			if ($upload['status'] == 'success') {
				$fill_data['url'] = $upload['file_name'];

			} else {
				$error_message = $upload['message'];
			}
		}

		if ( ! empty( $error_message ) ) {
			$response['status'] = 'error';
			$response['message'] = $error_message;
		} else {

			$query = $this->Video->updateOrCreate(['id' => $id], $fill_data);
			$response['action'] = _isNaturalNumber( $id ) ? 'update' : 'insert';
			$response['status'] = $query ? 'success' : 'error';
			$response['message'] = $query ? 'Data Anda berhasil disimpan.' : 'Terjadi kesalahan dalam menyimpan data';

		}


		$this->output
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_HEX_APOS | JSON_HEX_QUOT))
		->_display();

		exit;



		
	}
	public function update()
	{


		$fill_data = $this->input->post();
		$id = $fill_data['video_id'];
		$error_message = '';
		if ( ! empty($_FILES['file']['name']) ) {

			$upload = $this->upload_video($id);

			if ($upload['status'] == 'success') {
				$fill_data['url'] = $upload['file_name'];

			} else {
				$error_message = $upload['message'];
			}
		}

		if ( ! empty( $error_message ) ) {
			$response['status'] = 'error';
			$response['message'] = $error_message;
		} else {

			$query = $this->Video->updateOrCreate(['id' => $id], $fill_data);
			$response['action'] = _isNaturalNumber( $id ) ? 'update' : 'insert';
			$response['status'] = $query ? 'success' : 'error';
			$response['message'] = $query ? 'Data Anda berhasil disimpan.' : 'Terjadi kesalahan dalam menyimpan data';

		}


		$this->output
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_HEX_APOS | JSON_HEX_QUOT))
		->_display();

		exit;



		
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$this->vars['video'] = $this->Video->findOrFail($id);
		$this->vars['title'] = 'Ubah data Video';
		return view('admin.video.edit', $this->vars);

	}

	public function delete()
	{
		$id = $this->input->post('id');
		$video = $this->Video->findOrFail($id);
		if (!empty($video->url)) {
			@chmod(FCPATH.'media/videos/'.$video->url, 0777);

				// unlink old file
			@unlink(FCPATH.'media/videos/'.$video->url);
		}
		$delete = $this->Video->where('id', $id)->delete();
		return redirect(site_url('admin/video'));
	}

	private function upload_video($id) {

		$config['upload_path'] = './media/videos/';
		$config['allowed_types'] = 'mp4';
		$config['max_size'] = 0;
		$config['encrypt_name'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);


		if (!$this->upload->do_upload('file')) {
			$this->vars['status'] = 'error';
			$this->vars['message'] = $this->upload->display_errors();
		} else {

			
			$file = $this->upload->data();

			// chmood new file
			@chmod(FCPATH.'media/videos/'.$file['file_name'], 0777);
			// resize new image
			$this->image_resize(FCPATH.'media/videos', $file['file_name']);

			$this->vars['status'] = 'success';
			$this->vars['file_name'] = $file['file_name'];
			if ( _isNaturalNumber($id) ) {
				$query = $this->Video->findOrFail($id);
				// chmood old file
				@chmod(FCPATH.'media/videos/'.$query->url, 0777);

				// unlink old file
				@unlink(FCPATH.'media/videos/'.$query->url);

			}
		}
		return $this->vars;
	}

	private function image_resize($path, $file_name) {
		$this->load->library('image_lib');

		// Thumbnail Image
		$thumb['image_library'] = 'gd2';
		$thumb['source_image'] = $path .'/'. $file_name;
		$thumb['new_image'] = './media/photo/thumbnail/'. $file_name;
		$thumb['maintain_ratio'] = false;
		$thumb['width'] = 150;
		$thumb['height'] = 100;
		$this->image_lib->initialize($thumb);
		$this->image_lib->resize();
		$this->image_lib->clear();
		// Medium Image
		$medium['image_library'] = 'gd2';
		$medium['source_image'] = $path .'/'. $file_name;
		$medium['new_image'] = './media/photo/medium/'. $file_name;
		$medium['maintain_ratio'] = false;
		$medium['width'] = 400;
		$medium['height'] = 250;
		$this->image_lib->initialize($medium);
		$this->image_lib->resize();
		$this->image_lib->clear();
		// Large Image
		$large['image_library'] = 'gd2';
		$large['source_image'] = $path .'/'. $file_name;
		$large['new_image'] = './media/photo/large/'. $file_name;
		$large['maintain_ratio'] = false;
		$large['width'] = 840;
		$large['height'] = 450;
		$this->image_lib->initialize($large);
		$this->image_lib->resize();
		$this->image_lib->clear();
		// Remove Original File
			// @unlink($path .'/'. $file_name);
	}

}

/* End of file VideoController.php */
/* Location: ./application/controllers/admin/VideoController.php */