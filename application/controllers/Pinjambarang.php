<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjambarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');

        $role_id = $this->session->userdata('role_id');
        $username = $this->session->userdata('username');
        if ($username == '') {
            redirect('login');
        }

        if ($role_id != 5) {
            redirect('Tanggapan');
        }
    }
    public function index()
    {
        $data['title'] = 'List Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAset();

        $data['lokasi'] = $this->menu->getDataLokasi();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarMhs', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentPB/pinjamBarang', $data);
        $this->load->view('templates/footer_tabel');
    }

    public function pinjamAset($id)
    {

        $asetData            = $this->Menu_model;
        $dataLokasi          = $this->Menu_model;
        $data['asetData']    = $asetData->getByIdDataAset($id);
        $data['dataLokasi']  = $dataLokasi->getByLokasi();
        $data['dataProdi']   = $dataLokasi->getByProdi();
        $data['title']       = 'Detail Data Peminjaman';
        $data['user']        = $this->db->get_where('user', ['email' => $this->session->userdata('email', 'nama', 'id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarMhs', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentPB/detailDataAset', $data);
        $this->load->view('templates/footer');
    }

    public function newPinjam()
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
        $sql = $this->Menu_model->inputData($data);
        redirect('pinjambarang');
    }

    ////////////////////////////////////// DATA LAB SESUAI PRODI ///////////////////////////////////////
    public function labMI()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi MI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganMi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganMI', $data);
        $this->load->view('templates/footer');
    }

    public function labIlkom()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi Ilkom';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganIlkom();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganIlkom', $data);
        $this->load->view('templates/footer');
    }

    public function labPTI()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi PTI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganPTI();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganPTI', $data);
        $this->load->view('templates/footer');
    }
    public function labSI()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi SI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganSI();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganSI', $data);
        $this->load->view('templates/footer');
    }
    public function labPTM()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi PTM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganPTM();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganPTM', $data);
        $this->load->view('templates/footer');
    }
    public function labPKK()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi PKK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganPKK();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganPKK', $data);
        $this->load->view('templates/footer');
    }
    public function labTE()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi TE';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganTE();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganTE', $data);
        $this->load->view('templates/footer');
    }
    public function labPTE()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi PTE';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganPTE();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganPTE', $data);
        $this->load->view('templates/footer');
    }
    public function labPVSK()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi PVSK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganPVSK();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganPVSK', $data);
        $this->load->view('templates/footer');
    }

    ////////////////////////////////////// END DATA LAB SESUAI PRODI ///////////////////////////////////////

}
