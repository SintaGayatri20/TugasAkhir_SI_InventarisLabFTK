<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminBR extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';

        $role_id = $this->session->userdata('role_id');
        $username = $this->session->userdata('username');
        if ($username == '') {
            redirect('login');
        }

        if ($role_id != 2) {
            redirect('Tanggapan');
        }
    }

    public function editDataAset($id)
    {
        $asetData            = $this->Menu_model;
        $dataLokasi          = $this->Menu_model;
        $data['asetData']    = $asetData->getByIdDataAset($id);
        $data['dataLokasi']  = $dataLokasi->getByLokasi();
        $data['dataProdi']   = $dataLokasi->getByProdi();
        $data['title']       = 'Edit Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/editDataAset', $data);
        $this->load->view('templates/footer');
    }



    public function dataBarangRuangan()
    {
        $data['title'] = 'Data Barang Ruangan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getDataLokasi();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuangan', $data);
        $this->load->view('templates/footer');
    }


    ////////////////////////////////////// DATA LAB SESUAI PRODI ///////////////////////////////////////
    public function labMI()
    {

        $data['title'] = 'Data Barang Ruangan Lab Prodi MI';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

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
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

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
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

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
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

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
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

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
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

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
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

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
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

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
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['lokasi'] = $this->menu->getBarangRuanganPVSK();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/barangRuanganPVSK', $data);
        $this->load->view('templates/footer');
    }

    ////////////////////////////////////// END DATA LAB SESUAI PRODI ///////////////////////////////////////

    ////////////////////////////////////// DATA LAB SESUAI RUANGAN LAB ///////////////////////////////////////

    public function dataLabBusanaPKK()
    {
        $data['title'] = 'Data Barang Ruangan Lab Busana PKK';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabPKK();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataBarangRuanganPKK', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabilkom()
    {
        $data['title'] = 'Data Barang Ruangan Lab Busana PKK';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabIlkom();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataBarangLabIlkom', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabBogaPKK()
    {
        $data['title'] = 'Data Barang Ruangan Lab Boga PKK';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabBogaPKK();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataBarangBogaPKK', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabKePaPKK()
    {
        $data['title'] = 'Data Barang Ruangan Lab Kecantikan dan Pariwisata PKK';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabKecantikanaPKK();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabKePaPKK', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabInstalasiPTE()
    {
        $data['title'] = 'Data Barang Ruangan Lab Lab Instalasi TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabInstalasiPTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabInstalasiPTE', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabPengukuranPTE()
    {
        $data['title'] = 'Data Barang Ruangan Lab Lab Pengukuran TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabPengukuranPTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabPengukuranPTE', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabELDA()
    {
        $data['title'] = 'Data Barang Ruangan Lab Elda (Elektronik Daya) TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabElda();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabELDA', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabRL()
    {
        $data['title'] = 'Data Barang Ruangan Lab RL (Rangkaian Listrik) TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabRL();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabRL', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabPTI()
    {
        $data['title'] = 'Data Barang Ruangan Lab PTI';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabPTI();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabPTI', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataSI()
    {
        $data['title'] = 'Data Barang Ruangan Lab Sistem Informasi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabSI();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataSI', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabMIilkom()
    {
        $data['title'] = 'Data Barang Ruangan Lab MI/ILKOM';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabMIilkom();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabMIilkom', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabManufakturPTM()
    {
        $data['title'] = 'Data Barang Ruangan Lab. Manufaktur Eks Lab. /PTM';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabManufakturPTM();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabManufakturPTM', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabPendinginPTM()
    {
        $data['title'] = 'Data Barang Ruangan Lab. Pendingin Gedung PTM';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPendinginPTM();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabPendinginPTM', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataOtomotifPTM()
    {
        $data['title'] = 'Data Barang Ruangan Lab. Otomotif Gedung PTM';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabOtomotifPTM();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataOtomotifPTM', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabElektronikaPTE()
    {
        $data['title'] = 'Data Barang Ruangan Lab Elektronika TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabElektonikaPTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabElektronikaPTE', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabMesinPTE()
    {
        $data['title'] = 'Data Barang Ruangan Lab Mesin TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabMesinPTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabMesinPTE', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataWorkshopPTE()
    {
        $data['title'] = 'Data Barang Ruangan Workshop TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabWorkshopPTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataWorkshopPTE', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabPendinginPTE()
    {
        $data['title'] = 'Data Barang Ruangan Lab Pendingin TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabPendinginPTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabPendinginPTE', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabRobotika()
    {
        $data['title'] = 'Data Barang Ruangan Lab Robotika';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabRobotika();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabRobotika', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabKomputer()
    {
        $data['title'] = 'Data Barang Ruangan Lab Komputer';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabKomputer();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabKomputer', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabTenagaListrik()
    {
        $data['title'] = 'Data Barang Ruangan Lab Tenaga Listrik';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabTenagaListrik();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabTenagaListrik', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabBengkel()
    {
        $data['title'] = 'Data Barang Ruangan Lab Bengkel';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabBengkel();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabBengkel', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataRuangLaboran()
    {
        $data['title'] = 'Data Barang Ruangan Ruang Laboran';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabLaboran();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataRuangLaboran', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataRuangTataCahaya()
    {
        $data['title'] = 'Data Barang Ruangan Ruang Tata Cahaya';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabTataCahaya();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataRuangTataCahaya', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLabMultimedia()
    {
        $data['title'] = 'Data Barang Ruangan Lab Multimedia';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabMultimedia();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLabMultimedia', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataRuangProdiPTE()
    {
        $data['title'] = 'Data Barang Ruangan Ruang Prodi TE/PTE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabRuangProdiPTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataRuangProdiPTE', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataWorkshop1()
    {
        $data['title'] = 'Data Barang Ruangan Workshop 1';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabWorkshop1();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataWorkshop1', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataWorkshop2()
    {
        $data['title'] = 'Data Barang Ruangan Workshop 2';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabWorkshop2();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataWorkshop2', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function dataLab1()
    {
        $data['title'] = 'Data Barang Ruangan Lab 1';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetLabLab1();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentBarangRuangan/dataLab1', $data);
        $this->load->view('templates/footer_tabel');
    }

    ////////////////////////////////////// END DATA LAB SESUAI RUANGAN LAB ///////////////////////////////////////

    //==================================== DATA BARANG RUSAK RUANGAN ==================================

    public function brgRusakRuangan()
    {

        $data['title'] = 'Barang Rusak Ruangan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $this->load->model('Pelaporan_model');

        $data['dataAset'] = $this->menu->getBrgRusakRuangan();
        $data['lokasi'] = $this->db->get_where('tb_lokasi')->result_array();
        $data['prodi'] = $this->db->get_where('tb_prodi')->result_array();
        $data['hasil'] = $this->Pelaporan_model->prodi();
        $data['tampilprodi'] = $this->Menu_model->tampilProdiAset();

        $this->form_validation->set_rules('labaset', 'Nama Lab', 'required');
        $this->form_validation->set_rules('prodiaset', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('editor', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/brgRusakRuangan', $data);
            $this->load->view('templates/footer');
        } else {
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/media')
            );
            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
            $data = [
                'id_lokasi'     => $this->input->post('labaset'),
                'id_prodi'      => $this->input->post('prodiaset'),
                'nama_barang'   => $this->input->post('nama_barang'),
                'spesifikasi'   => $this->input->post('editor'),
                'jumlah'        => $this->input->post('jumlah'),
                'satuan'        => $this->input->post('satuan'),
                'keterangan'    => $this->input->post('keterangan'),
                'foto'          => $_FILES['image']['name']

            ];

            $this->db->insert('tb_aset', $data);

            $this->session->set_flashdata('msg', "Data Aset Rusak Ruangan Berhasil Ditambahkan!");

            $this->session->set_flashdata('msg_class', 'alert-success');
            redirect('AdminBR/brgRusakRuangan');
        }
    }




    public function editDataAsetRusak($id)
    {
        $asetData            = $this->Menu_model;
        $dataLokasi          = $this->Menu_model;
        $data['asetData']    = $asetData->getByIdDataAset($id);
        $data['dataLokasi']  = $dataLokasi->getByLokasi();
        $data['dataProdi']   = $dataLokasi->getByProdi();
        $data['tampilprodi'] = $this->Menu_model->tampilProdiAset();
        $data['title']       = 'Edit Data Aset Rusak';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/editDataAsetRusak', $data);

        $this->load->view('templates/footer');
    }



    public function newEditDataAsetRusak()
    {
        $id_lokasi      = $this->input->post('labaset');
        $id_prodi       = $this->input->post('prodiaset');
        $nama_barang    = $this->input->post('nama_barang');
        $spesifikasi    = $this->input->post('editor');
        $jumlah         = $this->input->post('jumlah');
        $satuan         = $this->input->post('satuan');
        $keterangan     = $this->input->post('keterangan');
        $foto           = $_FILES['image']['name'];
        $id             = $this->input->post('kode_aset');

        $gambar         = $this->input->post('gambar');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/media')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(

            'id_lokasi'     => $id_lokasi,
            'id_prodi'      => $id_prodi,
            'nama_barang'   => $nama_barang,
            'spesifikasi'   => $spesifikasi,
            'jumlah'        => $jumlah,
            'satuan'        => $satuan,
            'keterangan'    => $keterangan,
            'foto'          => $image_cek,


        );
        $where = array('kode_aset' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_aset');
        $this->session->set_flashdata('msg', "Data Aset Rusak Ruangan Berhasil Diedit");

        $this->session->set_flashdata('msg_class', 'alert-success');


        redirect('AdminBR/brgRusakRuangan');
    }


    public function deleteDataAsetRusak($id)
    {
        $where = array('kode_aset' => $id);
        $this->Menu_model->delete($where, 'tb_aset');
        $this->session->set_flashdata('msg_hapus', "Data Aset Rusak Ruangan Berhasil Dihapus!");

        $this->session->set_flashdata('msg_class', 'alert-danger');
        redirect('AdminBR/brgRusakRuangan');
    }

    public function savebrgRusak()
    {

        $this->load->model('m_kategori');
        $kode_aset = $this->input->post('kode_aset');
        $username = $this->session->userdata('username');
        for ($i = 0; $i < sizeof($kode_aset); $i++) {
            # code...
            $data = array(
                'kode_aset' => $kode_aset[$i],
                'id_user' => $username
            );
            $this->db->insert('tb_brg_rusak', $data);
        }

        $this->session->set_flashdata('msg', "Data Permohonan Perbaikan Sarana dan Prasarana berhasil diajukan, Silahkan Hubungi Koordinator Lab Untuk Melakukan Proses Selanjutnya.");

        $this->session->set_flashdata('msg_class', 'alert-success');

        return redirect('AdminBR/brgRusakRuangan');
    }

    function get_lokasi()
    {
        $this->load->model('Menu_model');
        $id_prodi = $this->input->post('id_prodi');
        $data = $this->Menu_model->lokasi($id_prodi);
        echo json_encode($data);
    }

    function get_aset()
    {
        $this->load->model('Menu_model');
        $id_lokasi = $this->input->post('id_lokasi');
        $data = $this->Menu_model->aset($id_lokasi);
        echo json_encode($data);
    }


    public function formPilihAsetRuangan()
    {

        $data['title'] = 'Form Pilih Aset Ruangan';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['prodi'] = $this->m_kategori->get_prodi_admin();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/form_pilih_aset_ruangan', $data);
        $this->load->view('templates/footer');
    }

    public function formdataaset()
    {

        $id = $this->input->get('subkategori');
        $data['title'] = 'Data Aset Ruangan';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['aset'] = $this->m_kategori->get_aset($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/getdataasetruangan', $data);
        $this->load->view('templates/footer');
    }

    public function cetakPdf()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK"
        );



        $id = $this->input->post('id_lokasi');
        //$id = $this->input->get('subkategori');
        $this->load->model('m_kategori');
        $data['dataAset'] = $this->m_kategori->get_asets($id);
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetRuangan.pdf', array("Attachment" => false));
    }

    public function tambahDataAsetRuangan()
    {

        $konfigurasi = array(
            'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
            'upload_path'  => realpath('./assets/media')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('image');
        $data = [
            'id_lokasi'     => $this->input->post('id_lokasi'),
            'id_prodi'      => $this->input->post('id_prodi'),
            'nama_barang'   => $this->input->post('nama_barang'),
            'spesifikasi'   => $this->input->post('editor'),
            'jumlah'        => $this->input->post('jumlah'),
            'satuan'        => $this->input->post('satuan'),
            'keterangan'    => $this->input->post('keterangan'),
            'foto'          => $_FILES['image']['name']

        ];
        $lokasi = $this->input->post('id_lokasi');
        $k = $this->input->post('id_prodi');
        $this->db->insert('tb_aset', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Ruangan Berhasil Ditambahkan.</div>');
        redirect('AdminBR/formdataaset?kategori=' . $k . '&subkategori=' . $lokasi . '&submit=Submit');
    }

    public function deleteDataAsetRuangan($id)
    {

        $where = array('kode_aset' => $id);
        $this->Menu_model->delete($where, 'tb_aset');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Aset Ruangan Dihapus</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function editDataAsetRuangan($id)
    {
        $asetData            = $this->Menu_model;
        $dataLokasi          = $this->Menu_model;
        $data['asetData']    = $asetData->getByIdDataAset($id);
        $data['dataLokasi']  = $dataLokasi->getByLokasi();
        $data['dataProdi']   = $dataLokasi->getByProdi();
        $data['title']       = 'Edit Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/editDataAsetRuangan', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataAsetRuangan()
    {
        $id_lokasi      = $this->input->post('id_lokasi');
        $id_prodi       = $this->input->post('id_prodi');
        $nama_barang    = $this->input->post('nama_barang');
        $spesifikasi    = $this->input->post('editor');
        $jumlah         = $this->input->post('jumlah');
        $satuan         = $this->input->post('satuan');
        $keterangan     = $this->input->post('keterangan');
        $foto           = $_FILES['image']['name'];
        $id             = $this->input->post('kode_aset');

        $gambar         = $this->input->post('gambar');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/media')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(

            'id_lokasi'     => $id_lokasi,
            'id_prodi'      => $id_prodi,
            'nama_barang'   => $nama_barang,
            'spesifikasi'   => $spesifikasi,
            'jumlah'        => $jumlah,
            'satuan'        => $satuan,
            'keterangan'    => $keterangan,
            'foto'          => $image_cek,


        );
        $lokasi = $this->input->post('id_lokasi');
        $k = $this->input->post('id_prodi');
        $where = array('kode_aset' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_aset');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Ruangan Diedit</div>');
        redirect('AdminBR/formdataaset?kategori=' . $k . '&subkategori=' . $lokasi . '&submit=Submit');
    }
}
