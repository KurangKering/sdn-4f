<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Berita');
		$this->load->model('KategoriBerita');
		$this->load->model('KomentarBerita');
	}
	public function index()
	{
		$this->vars['data'] = $this->Berita->latest()->get();
		$this->vars['data_kategori'] = $this->KategoriBerita->pluck('kategori', 'id');
		return view('admin.berita.index', $this->vars);
	}

	public function komentar()
	{
		$berita_id = _toInteger($this->uri->segment(4));

		$berita = $this->Berita->with('komentar_berita')->find($berita_id);

		$this->vars['berita'] = $berita;
		return view('admin.berita.komentar', $this->vars); 

	}

	public function create()
	{

		$this->vars['query'] = FALSE;
		$id = _toInteger($this->uri->segment(4));


		if (_isNaturalNumber( $id )) {
			$this->vars['query'] = $this->Berita->findOrFail($id);
			$post_image = 'media/berita/medium/'.$this->vars['query']->berita_image;
			$this->vars['post_image'] = file_exists(FCPATH . $post_image) ? base_url($post_image) : '';
			$this->vars['id'] = $id;
		}
		$this->vars['data_kategori'] = $this->KategoriBerita->pluck('kategori', 'id');
		$this->vars['title'] = _isNaturalNumber( $id ) ? 'Edit Berita' : 'Tambah Berita';
		$this->vars['action'] = site_url('admin/berita/save/'.$id);

		return view('admin.berita.create', $this->vars);
	}

		/**
	 * Insert image in tinyMCE Editor
	 */
		public function images_upload_handler() {
			$config['upload_path'] = './media/berita/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 0;
			$this->vars = [];
			$this->load->library('upload');
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('file')) {
				$this->vars['status'] = 'error';
				$this->vars['message'] = $this->upload->display_errors('', '');
			} else {
				$file = $this->upload->data();
				$this->vars['status'] = 'success';
				$this->vars['location'] = base_url('media/berita/'.$file['file_name']);
			}
			$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))
			->_display();
			exit;
		}


		public function save() {
			if ($this->input->is_ajax_request()) {
				$id = _toInteger($this->uri->segment(4));
				if ($this->validation()) {
					$fill_data = $this->fill_data();
					$error_message = '';
					if ( ! empty($_FILES['post_image']) ) {
						$upload = $this->upload_image($id);
						
						if ($upload['status'] == 'success') {
							$fill_data['berita_image'] = $upload['file_name'];

						} else {
							$error_message = $upload['message'];
						}
					}
					if ( ! empty( $error_message ) ) {
						$this->vars['status'] = 'error';
						$this->vars['message'] = $error_message;
					} else {
						// $fill_data[(_isNaturalNumber( $id ) ? 'updated_by' : 'created_by')] = __session('user_id');
						// if (!_isNaturalNumber( $id )) $fill_data['created_at'] = date('Y-m-d H:i:s');
						// if (_isNaturalNumber( $id )) unset($fill_data['post_author']);
						$query = $this->Berita->updateOrCreate(['id' => $id], $fill_data);
						$this->vars['action'] = _isNaturalNumber( $id ) ? 'update' : 'insert';
						$this->vars['status'] = $query ? 'success' : 'error';
						$this->vars['message'] = $query ? 'Data Anda berhasil disimpan.' : 'Terjadi kesalahan dalam menyimpan data';
					// Create tags from posts
						if ( ! empty( $fill_data['post_tags'] )) {
							$this->load->model('m_tags');
							$this->m_tags->insert($fill_data['post_tags']);
						}
					}
				} else {
					$this->vars['status'] = 'error';
					$this->vars['message'] = validation_errors();
				}
				$this->output
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))
				->_display();
				exit;
			}
		}		

		private function upload_image($id) {
			$config['upload_path'] = './media/images/';
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
				@chmod(FCPATH.'media/images/'.$file['file_name'], 0777);
			// resize new image
				$this->image_resize(FCPATH.'media/images', $file['file_name']);

				$this->vars['status'] = 'success';
				$this->vars['file_name'] = $file['file_name'];
				if ( _isNaturalNumber($id) ) {
					$query = $this->Berita->findOrFail($id);
				// chmood old file
					@chmod(FCPATH.'media/images/thumbnail/'.$query->post_image, 0777);
					@chmod(FCPATH.'media/images/medium/'.$query->post_image, 0777);
					@chmod(FCPATH.'media/images/large/'.$query->post_image, 0777);
				// unlink old file
					@unlink(FCPATH.'media/images/thumbnail/'.$query->post_image);
					@unlink(FCPATH.'media/images/medium/'.$query->post_image);
					@unlink(FCPATH.'media/images/large/'.$query->post_image);
				}
			}
			return $this->vars;
		}

		private function fill_data() {
			return [
				'kategori_berita_id' => $this->input->post('kategori_berita_id'),
				'judul' => $this->input->post('post_title'),
				'konten' => $this->input->post('post_content'),
				'author_user_id' => '6',
			];
		}

		private function validation() {
			$this->load->library('form_validation');
			$val = $this->form_validation;
			$val->set_rules('post_title', 'Judul', 'trim|required');
			$val->set_rules('post_content', 'Isi', 'trim|required');
			$val->set_rules('kategori_berita_id', 'Kategori Berita', 'required');
			$val->set_error_delimiters('<div>&sdot; ', '</div>');
			return $val->run();
		}

		private function image_resize($path, $file_name) {
			$this->load->library('image_lib');

		// Thumbnail Image
			$thumb['image_library'] = 'gd2';
			$thumb['source_image'] = $path .'/'. $file_name;
			$thumb['new_image'] = './media/berita/thumbnail/'. $file_name;
			$thumb['maintain_ratio'] = false;
			$thumb['width'] = 150;
			$thumb['height'] = 100;
			$this->image_lib->initialize($thumb);
			$this->image_lib->resize();
			$this->image_lib->clear();
		// Medium Image
			$medium['image_library'] = 'gd2';
			$medium['source_image'] = $path .'/'. $file_name;
			$medium['new_image'] = './media/berita/medium/'. $file_name;
			$medium['maintain_ratio'] = false;
			$medium['width'] = 400;
			$medium['height'] = 250;
			$this->image_lib->initialize($medium);
			$this->image_lib->resize();
			$this->image_lib->clear();
		// Large Image
			$large['image_library'] = 'gd2';
			$large['source_image'] = $path .'/'. $file_name;
			$large['new_image'] = './media/berita/large/'. $file_name;
			$large['maintain_ratio'] = false;
			$large['width'] = 840;
			$large['height'] = 450;
			$this->image_lib->initialize($large);
			$this->image_lib->resize();
			$this->image_lib->clear();
		// Remove Original File
			@unlink($path .'/'. $file_name);
		}

		public function delete()
		{
			$id = $this->input->post('id');
			$this->Berita->find($id)->delete();

			return redirect(site_url('admin/berita'));
		}

		public function hapus_komentar_berita()
		{
			$id = $this->input->post('id');
			$current_url = $this->input->post('current_url');
			$this->KomentarBerita->find($id)->delete();

			return redirect($current_url);
		}
	}

	/* End of file BeritaController.php */
/* Location: ./application/controllers/admin/BeritaController.php */