<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('DokumenModel');
	}
	
	
	
	public function tambah(){
		$data = array();
		
		if($this->input->post('submit')){ 
			$upload = $this->DokumenModel->upload();
			
			if($upload['result'] == "success"){ 
				$this->DokumenModel->save($upload);
				
				redirect('user/daftarpeminjamanalat'); 
				$data['message'] = $upload['error']; 
			}
		}
	}

	public function ubah(){
		$data = array();
		
		if($this->input->post('submit')){ 
			$upload = $this->DokumenModel->ubah_upload();
			
			if($upload['result'] == "success"){ 
				$this->DokumenModel->ubah($upload);
				
				redirect('user/daftarpeminjamanalat'); 
				$data['message'] = $upload['error']; 
			}
		}
	}


	public function tambah_laporan(){
		$data = array();
		
		if($this->input->post('submit')){ 
			$upload = $this->DokumenModel->upload_laporan();
			
			if($upload['result'] == "success"){ 
				$this->DokumenModel->save_laporan($upload);
				
				redirect('user/daftarpeminjamanalat'); 
				$data['message'] = $upload['error']; 
			}
		}
	}


	public function ubah_laporan(){
		$data = array();
		
		if($this->input->post('submit')){ 
			$upload = $this->DokumenModel->ubah_upload_laporan();
			
			if($upload['result'] == "success"){ 
				$this->DokumenModel->ubah_laporan($upload);
				
				redirect('user/daftarpeminjamanalat'); 
				$data['message'] = $upload['error']; 
			}
		}
	}


}
