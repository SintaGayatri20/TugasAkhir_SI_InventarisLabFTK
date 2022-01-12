<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DokumenModel extends CI_Model {
	
	public function upload(){
		$id_peminjam = $this->input->post('id_peminjaman');
		$rand = rand(1,1000000);
		$config['upload_path'] = './bap/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']	= '5048';
		$config['file_name']= 'Form_Peminjaman_'.$rand;
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); 
		if($this->upload->do_upload('evidence')){ 
			
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	
	public function save($upload){
		if($upload['result'] == "success"){

			$nama_file = $upload['file']['file_name'];
			$id_peminjam = $this->input->post('id_peminjaman');
			$opsi = $this->input->post('opsi');
			
		}else{
			redirect('user/daftarpeminjamanalat'); 
		}
		if($opsi == 1){
			$hasil=$this->db->query("UPDATE tb_peminjaman_aset SET evidence_pengembalian='$nama_file' WHERE id_peminjaman='$id_peminjam'");
		}else{
		$hasil=$this->db->query("UPDATE tb_peminjaman_aset SET evidence='$nama_file' WHERE id_peminjaman='$id_peminjam'");
		}
	}



	public function ubah_upload(){
		$id_peminjam = $this->input->post('id_peminjamans');
		$rand = rand(1,1000000);
		$config['upload_path'] = './bap/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']	= '5048';
		$config['file_name']= 'Form_Peminjaman_'.$rand;
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); 
		if($this->upload->do_upload('evidence')){ 
			
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	
	public function ubah($upload){
		if($upload['result'] == "success"){

			$nama_file = $upload['file']['file_name'];
			$id_peminjam = $this->input->post('id_peminjamans');
			$evidence = $this->input->post('evidence');
			$opsi = $this->input->post('opsi');
			
		}else{
			redirect('user/daftarpeminjamanalat'); 
		}
		unlink('./bap/'.$evidence);
		if($opsi == 1){
			$hasil=$this->db->query("UPDATE tb_peminjaman_aset SET evidence_pengembalian='$nama_file' WHERE id_peminjaman='$id_peminjam'");
		}else{
		$hasil=$this->db->query("UPDATE tb_peminjaman_aset SET evidence='$nama_file' WHERE id_peminjaman='$id_peminjam'");
		}
		//$hasil=$this->db->query("UPDATE tb_peminjaman_aset SET evidence='$nama_file' WHERE id_peminjaman='$id_peminjam'");
		//$this->db->insert('gambar', $data);
	}


	public function upload_laporan(){
		$id_peminjam = $this->input->post('id_peminjaman');
		$rand = rand(1,1000000);
		$config['upload_path'] = './laporan/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']	= '5048';
		$config['file_name']= 'Laporan_'.$rand;
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); 
		if($this->upload->do_upload('evidence')){ 
			
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}


	public function save_laporan($upload){
		if($upload['result'] == "success"){

			$nama_file = $upload['file']['file_name'];
			$id_peminjam = $this->input->post('id_peminjaman');
			
			
		}else{
			redirect('user/daftarpeminjamanalat'); 
		}
		
			$hasil=$this->db->query("UPDATE tb_peminjaman_aset SET laporan_pengembalian='$nama_file' WHERE id_peminjaman='$id_peminjam'");
		
	}

	
	public function ubah_upload_laporan(){
		$id_peminjam = $this->input->post('id_peminjamans');
		$rand = rand(1,1000000);
		$config['upload_path'] = './laporan/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']	= '5048';
		$config['file_name']= 'Laporan_'.$rand;
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); 
		if($this->upload->do_upload('evidence')){ 
			
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	
	public function ubah_laporan($upload){
		if($upload['result'] == "success"){

			$nama_file = $upload['file']['file_name'];
			$id_peminjam = $this->input->post('id_peminjamans');
			$evidence = $this->input->post('evidence');
			$opsi = $this->input->post('opsi');
			
		}else{
			redirect('user/daftarpeminjamanalat'); 
		}
		
		
			$hasil=$this->db->query("UPDATE tb_peminjaman_aset SET laporan_pengembalian='$nama_file' WHERE id_peminjaman='$id_peminjam'");
		
	}


}
