<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlbumPhotoController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AlbumPhoto');

	}
	public function index()
	{
		$this->vars['data_album'] = $this->AlbumPhoto->latest()->get();
		return view('admin.album_foto.index', $this->vars);
	}

	public function create()
	{
		$id = $this->uri->segment(4);
		if ($id) {
			$album = $this->AlbumPhoto->findOrFail($id);
			$this->vars['data'] =$album;
			$path = site_url('media/album/');
			$this->vars['post_image'] = $album->cover ? $path . $album->cover : '';
		}
		$this->vars['title'] = _isNaturalNumber($id) ? 'Ubah Album' : 'Tambah Album';
		return view('admin.album_foto.create', $this->vars);
	}

	public function save()
	{


		$id = _toInteger($this->input->post('id'));

		$fill_data = $this->input->post();
		$error_message = '';
		if ( ! empty($_FILES['post_image']['name']) ) {
			$upload = $this->upload_image($id);

			if ($upload['status'] == 'success') {
				$fill_data['cover'] = $upload['file_name'];

			} else {
				$error_message = $upload['message'];
			}
		}

		if ( ! empty( $error_message ) ) {
			$this->vars['status'] = 'error';
			$this->vars['message'] = $error_message;
		} else {

			$query = $this->AlbumPhoto->updateOrCreate(['id' => $id], $fill_data);
			$this->vars['action'] = _isNaturalNumber( $id ) ? 'update' : 'insert';
			$this->vars['status'] = $query ? 'success' : 'error';
			$this->vars['message'] = $query ? 'Data Anda berhasil disimpan.' : 'Terjadi kesalahan dalam menyimpan data';

		}

		return redirect(site_url('admin/album-photo'));




		
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$album = $this->AlbumPhoto->findOrFail($id);
		try {
			$delete = $this->AlbumPhoto->where('id', $id)->delete();

			if (!empty($album->cover)) {
				@chmod(FCPATH.'media/album/thumbnail/'.$album->cover, 0777);
				@chmod(FCPATH.'media/album/medium/'.$album->cover, 0777);
				@chmod(FCPATH.'media/album/large/'.$album->cover, 0777);
				@chmod(FCPATH.'media/album/'.$album->cover, 0777);

				// unlink old file
				@unlink(FCPATH.'media/album/thumbnail/'.$album->cover);
				@unlink(FCPATH.'media/album/medium/'.$album->cover);
				@unlink(FCPATH.'media/album/large/'.$album->cover);
				@unlink(FCPATH.'media/album/'.$album->cover);
			}
		} catch (Exception $e) {
			
			
		}
		return redirect(site_url('admin/album-photo'));
	}

	private function upload_image($id) {
		$config['upload_path'] = './media/album/';
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
			@chmod(FCPATH.'media/album/'.$file['file_name'], 0777);
			// resize new image
			$this->image_resize(FCPATH.'media/album', $file['file_name']);

			$this->vars['status'] = 'success';
			$this->vars['file_name'] = $file['file_name'];
			if ( _isNaturalNumber($id) ) {
				$query = $this->AlbumPhoto->findOrFail($id);
				// chmood old file
				@chmod(FCPATH.'media/album/thumbnail/'.$query->cover, 0777);
				@chmod(FCPATH.'media/album/medium/'.$query->cover, 0777);
				@chmod(FCPATH.'media/album/large/'.$query->cover, 0777);
				@chmod(FCPATH.'media/album/'.$query->cover, 0777);

				// unlink old file
				@unlink(FCPATH.'media/album/thumbnail/'.$query->cover);
				@unlink(FCPATH.'media/album/medium/'.$query->cover);
				@unlink(FCPATH.'media/album/large/'.$query->cover);
				@unlink(FCPATH.'media/album/'.$query->cover);

			}
		}
		return $this->vars;
	}

	private function image_resize($path, $file_name) {
		$this->load->library('image_lib');

		// Thumbnail Image
		$thumb['image_library'] = 'gd2';
		$thumb['source_image'] = $path .'/'. $file_name;
		$thumb['new_image'] = './media/album/thumbnail/'. $file_name;
		$thumb['maintain_ratio'] = false;
		$thumb['width'] = 150;
		$thumb['height'] = 100;
		$this->image_lib->initialize($thumb);
		$this->image_lib->resize();
		$this->image_lib->clear();
		// Medium Image
		$medium['image_library'] = 'gd2';
		$medium['source_image'] = $path .'/'. $file_name;
		$medium['new_image'] = './media/album/medium/'. $file_name;
		$medium['maintain_ratio'] = false;
		$medium['width'] = 400;
		$medium['height'] = 250;
		$this->image_lib->initialize($medium);
		$this->image_lib->resize();
		$this->image_lib->clear();
		// Large Image
		$large['image_library'] = 'gd2';
		$large['source_image'] = $path .'/'. $file_name;
		$large['new_image'] = './media/album/large/'. $file_name;
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

/* End of file AlbumPhotoController.php */
/* Location: ./application/controllers/admin/AlbumPhotoController.php */