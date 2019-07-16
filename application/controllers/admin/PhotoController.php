<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhotoController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('AlbumPhoto');
		$this->load->model('Photo');
		
	}

	public function index()
	{
		
	}

	public function daftar_photo()
	{

		$album_id = $this->input->get('album_id');

		$album = $this->AlbumPhoto->with('photos')->find($album_id);
		$this->vars['album'] = $album;
		$this->vars['daftar_photo'] = $album->photos;
		return view('admin.photo.index', $this->vars);
	}

	public function create()
	{
		
		$album_id = $this->input->get('album_id');
		$photo_id = $this->input->get('photo_id');

		$album = '';
		$photo = '';
		$post_image = '';
		if ($album_id) {
			$album = $this->AlbumPhoto->findOrFail($album_id);
		} else 
		if ($photo_id)
		{
			$photo = $this->Photo->findOrFail($photo_id);
			$album = $photo->album_photo;

			$path = site_url('media/photo/');
			$post_image = $path . $photo->url;

		} else {
			die();
		}

		$this->vars['album_id'] = $album->id;
		$this->vars['photo_id'] = $photo_id;
		$this->vars['album'] = $album;
		$this->vars['photo'] = $photo;
		$this->vars['post_image'] = $post_image;
		$this->vars['title'] = $photo_id ? 'Ubah Photo' : 'Tambah Photo';
		return view('admin.photo.create', $this->vars);
	}

	
	public function save()
	{


		$album_id = _toInteger($this->input->post('album_photo_id'));
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

			$query = $this->Photo->updateOrCreate(['id' => $id], $fill_data);
			$this->vars['action'] = _isNaturalNumber( $id ) ? 'update' : 'insert';
			$this->vars['status'] = $query ? 'success' : 'error';
			$this->vars['message'] = $query ? 'Data Anda berhasil disimpan.' : 'Terjadi kesalahan dalam menyimpan data';

		}

		return redirect(site_url('admin/photo?album_id='.$album_id));




		
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$photo = $this->Photo->findOrFail($id);
		if (!empty($photo->url)) {
			@chmod(FCPATH.'media/photo/thumbnail/'.$photo->url, 0777);
			@chmod(FCPATH.'media/photo/medium/'.$photo->url, 0777);
			@chmod(FCPATH.'media/photo/large/'.$photo->url, 0777);
			@chmod(FCPATH.'media/photo/'.$photo->url, 0777);

				// unlink old file
			@unlink(FCPATH.'media/photo/thumbnail/'.$photo->url);
			@unlink(FCPATH.'media/photo/medium/'.$photo->url);
			@unlink(FCPATH.'media/photo/large/'.$photo->url);
			@unlink(FCPATH.'media/photo/'.$photo->url);
		}
		$delete = $this->Photo->where('id', $id)->delete();
		return redirect(site_url('admin/photo?album_id='.$photo->album_photo->id));
	}

	private function upload_image($id) {

		$config['upload_path'] = './media/photo/';
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
			@chmod(FCPATH.'media/photo/'.$file['file_name'], 0777);
			// resize new image
			$this->image_resize(FCPATH.'media/photo', $file['file_name']);
		
			$this->vars['status'] = 'success';
			$this->vars['file_name'] = $file['file_name'];
			if ( _isNaturalNumber($id) ) {
				$query = $this->Photo->findOrFail($id);
				// chmood old file
				@chmod(FCPATH.'media/photo/thumbnail/'.$query->url, 0777);
				@chmod(FCPATH.'media/photo/medium/'.$query->url, 0777);
				@chmod(FCPATH.'media/photo/large/'.$query->url, 0777);
				@chmod(FCPATH.'media/photo/'.$query->url, 0777);

				// unlink old file
				@unlink(FCPATH.'media/photo/thumbnail/'.$query->url);
				@unlink(FCPATH.'media/photo/medium/'.$query->url);
				@unlink(FCPATH.'media/photo/large/'.$query->url);
				@unlink(FCPATH.'media/photo/'.$query->url);

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

/* End of file PhotoController.php */
/* Location: ./application/controllers/admin/PhotoController.php */