<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpeminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->helper('url');
        $role_id = $this->session->userdata('role_id');
        $username = $this->session->userdata('username');
        if ($username == '') {
            redirect('login');
        }

        if ($role_id != 4) {
            redirect('Tanggapan');
        }
    }

    public function barang_dipijam()
    {
        $data['title'] = 'Data Barang Dipinjam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Peminjaman_model', 'peminjaman');

        $data['peminjaman'] = $this->peminjaman->getDataPeminjaman();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('monitoring_peminjaman/data_peminjaman', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function kembalikanBarang($id)
    {
        $asetData            = $this->Menu_model;
        $dataAset          = $this->Menu_model;
        $data['dataPinjaman']    = $asetData->getByIdDataKembali($id);
        $data['dataAset']  = $dataAset->getByAsetPeminjaman();
        $data['title'] = 'Data Barang Dipinjam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email', 'nama', 'id')])->row_array();

        $this->load->model('Peminjaman_model', 'peminjaman');

        $data['peminjaman'] = $this->peminjaman->getDataPeminjaman();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('monitoring_peminjaman/kembalikanBarang', $data);
        $this->load->view('templates/footer_tabel');
    }

    public function barang_dikembalikan()
    {
        $data['title'] = 'Data Barang Dikembalikan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Peminjaman_model', 'peminjaman');

        $data['peminjaman'] = $this->peminjaman->getDataDikembalikan();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('monitoring_peminjaman/barang_dikembalikan', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function newKembalikanBrg()
    {
        $this->load->model('Menu_model');
        $kode_aset      = $this->input->post('kode_aset');
        $id_user         = $this->input->post('id_user');
        $jumlah         = $this->input->post('jumlah');
        // $status         = $this->input->post('status');
        $data = array(

            'kode_aset'     => $kode_aset,
            'id_user'       => $id_user . $this->session->userdata('id'),
            'jumlah'        => $jumlah,
            // 'status'        => $status
        );
        $sql = $this->Menu_model->inputDataPengembalian($data);
        redirect('peminjaman/barang_dipijam');
    }
}
