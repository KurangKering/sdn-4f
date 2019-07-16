<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanController extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan');
	}
	
	public function index()
	{	

		$this->vars['data'] = $this->Pengaturan->pluck('nilai', 'nama');
		$path_image = site_url('media/images/').$this->vars['data']['foto_kepsek'];
		$this->vars['post_image'] = $path_image;
		$this->vars['title'] = 'Halaman Pengaturan Umum';
		return view('admin.pengaturan.index', $this->vars);
	}
	public function delete()
	{

		$id = $this->input->post('id');
		$slider = $this->Pengaturan->findOrFail($id);
		if (!empty($slider->url)) {
			@chmod(FCPATH.'media/sliders/'.$slider->url, 0777);

				// unlink old file
			@unlink(FCPATH.'media/sliders/'.$slider->url);
		}
		$delete = $this->Pengaturan->where('id', $id)->delete();
		return redirect(site_url('admin/image-slider'));

	}
	public function save()
	{


		$fill_data = $this->input->post();
		unset($fill_data['post_image']);
		$error_message = '';
		if ( ! empty($_FILES['post_image']['name']) ) {

			$upload = $this->upload_image($id);

			if ($upload['status'] == 'success') {
				$fill_data['foto_kepsek'] = $upload['file_name'];


			} else {
				$error_message = $upload['message'];
			}
		}

		if ( ! empty( $error_message ) ) {
			$this->vars['status'] = 'error';
			$this->vars['message'] = $error_message;
		} else {

			$arr_keys = array_keys($fill_data);


			foreach ($arr_keys as $key) {

				$save = $this->Pengaturan->updateOrCreate(['nama' => $key], [
					'nama' => $key,
					'nilai' => $fill_data[$key],

				]);

			}

		}

		return redirect(site_url('admin/pengaturan'));
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

			$this->vars['status'] = 'success';
			$this->vars['file_name'] = $file['file_name'];
			if ( _isNaturalNumber($id) ) {
				$query = $this->Pengaturan->where('nama', 'foto_kepsek')->first();
				// chmood old file
				@chmod(FCPATH.'media/images/'.$query->nilai, 0777);

				// unlink old file
				@unlink(FCPATH.'media/images/'.$query->nilai);

			}
		}
		return $this->vars;
	}
	

}

/* End of file PengaturanController.php */
/* Location: ./application/controllers/admin/PengaturanController.php */