<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanggapan extends CI_Controller
{

    public function index()
    {
        $data['title'] = ':: ERROR';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header_error', $data);
        $this->load->view('templates/tampil_error', $data);
        $this->load->view('templates/footer_error');
    }

    public function tanggapanBaruPinjam($id)
    {
        # code...
        //$username = $this->session->userdata('username');
        //$id_peminjaman = $id;
        $data['newtgp']    = $this->db->query("SELECT * FROM tb_peminjaman_aset WHERE id_peminjaman ='$id'")->row_array();;
        $data['title']       = 'Tanggapan Belum Mengembalikan Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('content/form_tampil_data_barupinjam', $data);
    }
}
