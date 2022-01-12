<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsetProdi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
    }


    //////////////////////////////////////////////// PRODI MANAJEMEN INFORMATIKA ////////////////////////////////////////////////////////////
    public function prodiMI()
    {
        $data['title'] = 'Data Aset Prodi Manajemen Informatika';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetMI();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetProdiMI', $data);
        $this->load->view('templates/footer_tabel');
    }






    //////////////////////////////////////////////// END PRODI MANAJEMEN INFORMATIKA ///////////////////////////////////////////////////////


    //////////////////////////////////////////////// PRODI ILKOM ///////////////////////////////////////////////////////

    public function prodiIlkom()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetILKOM();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetProdiILKOM', $data);
        $this->load->view('templates/footer_tabel');
    }




    //////////////////////////////////////////////// END PRODI ILKOM ///////////////////////////////////////////////////////

    //////////////////////////////////////////////// PRODI PTI /////////////////////////////////////////////////////////////

    public function prodiPTI()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPTI();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetprodiPTI', $data);
        $this->load->view('templates/footer_tabel');
    }



    //////////////////////////////////////////////// END PRODI PTI /////////////////////////////////////////////////////////

    //////////////////////////////////////////////// PRODI PTI /////////////////////////////////////////////////////////////    

    public function prodiSI()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetSI();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetprodiSI', $data);
        $this->load->view('templates/footer_tabel');
    }


    //////////////////////////////////////////////// END PRODI PTI /////////////////////////////////////////////////////////////

    //////////////////////////////////////////////// PRODI PTM /////////////////////////////////////////////////////////////
    public function prodiPTM()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPTM();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetprodiPTM', $data);
        $this->load->view('templates/footer_tabel');
    }



    //////////////////////////////////////////////// END PRODI PTM /////////////////////////////////////////////////////////////

    //////////////////////////////////////////////// PRODI PKK /////////////////////////////////////////////////////////////

    public function prodiPKK()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPKK();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetprodiPKK', $data);
        $this->load->view('templates/footer_tabel');
    }


    //////////////////////////////////////////////// END PRODI PKK /////////////////////////////////////////////////////////////

    //////////////////////////////////////////////// PRODI TE /////////////////////////////////////////////////////////////
    public function prodiTE()
    {
        $data['title'] = 'Data Aset ';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetprodiTE', $data);
        $this->load->view('templates/footer_tabel');
    }

    //////////////////////////////////////////////// END PRODI TE /////////////////////////////////////////////////////////////

    //////////////////////////////////////////////// PRODI PTE /////////////////////////////////////////////////////////////
    public function prodiPTE()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetprodiPTE', $data);
        $this->load->view('templates/footer_tabel');
    }


    //////////////////////////////////////////////// END PRODI PTE /////////////////////////////////////////////////////////////

    //////////////////////////////////////////////// PRODI PVSK /////////////////////////////////////////////////////////////
    public function prodiPVSK()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPVSK();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/dataAsetprodiPVSK', $data);
        $this->load->view('templates/footer_tabel');
    }


    //////////////////////////////////////////////// END PRODI PVSK /////////////////////////////////////////////////////////////
}
