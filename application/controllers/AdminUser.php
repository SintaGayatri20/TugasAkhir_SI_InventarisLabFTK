<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminUser extends CI_Controller
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

        if ($role_id != 2) {
            redirect('Tanggapan');
        }
    }

    public $detailUser = 'tb_personel_ftk';

    public function user_mahasiswa()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->model(
            'Menu_model',
            'menu'
        );

        $data['dataUser'] = $this->menu->getDataUserMahasiswa();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['masterUser'] = $this->menu->masterUserMahasiswa();

        $data['hasil'] = $this->menu->prodi();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/user_mahasiswa', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $data = [
                'no_induk'      => $this->input->post('no_induk'),
                'nama'          => $this->input->post('nama'),
                'email'         => $this->input->post('email'),
                'no_hp'         => $this->input->post('no_hp'),
                'alamat'        => $this->input->post('alamat'),
                'jabatan'       => $this->input->post('jabatan'),
                'foto_profile'  => 'default.png',
                'id_prodi'      => $this->input->post('id_prodi'),
                'date_created'  => $this->input->post('date_created'),
            ];
            $this->db->insert('tb_personel_ftk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data Koorprodi Berhasil Ditambahkan.</div>');
            redirect('AdminUser/user_mahasiswa');
        }
    }

    public function editUserMhs($id)
    {
        $dataUser           = $this->Menu_model;
        $dataRole           = $this->Menu_model;
        $dataProdi           = $this->Menu_model;
        $data['dataUser']   = $dataUser->getByIdDataUser($id);
        $data['dataProdi']  = $dataProdi->getByProdi();
        $data['userdata']       = $dataUser->getByUserMahasiswa();
        $data['userRole']   = $dataRole->getByUserRole();
        $data['title']      = 'Edit Data User Mahasiswa';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('editcontent/editUserMhs', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataUserMhs()
    {
        $nama       = $this->input->post('nama');
        $email   = $this->input->post('email');
        $no_hp    = $this->input->post('no_hp');
        $alamat    = $this->input->post('alamat');
        $jabatan  = $this->input->post('jabatan');
        $id_prodi  = $this->input->post('id_prodi');
        $date_created  = $this->input->post('date_created');

        $foto           = $_FILES['image']['name'];
        $no_induk             = $this->input->post('no_induk');

        $gambar         = $this->input->post('gambar');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/img/profile')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(


            'nama'      => $nama,
            'email'      => $email,
            'no_hp'      => $no_hp,
            'alamat'      => $alamat,
            'jabatan'      => $jabatan,
            'foto_profile'  => $image_cek,
            'id_prodi'  => $id_prodi,
            'date_created'  => $date_created,

        );
        $where = array('no_induk' => $no_induk);

        $this->Menu_model->newUpdate($where, $data, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data Mahasiswa Berhasil Diedit.</div>');
        redirect('AdminUser/user_mahasiswa');
    }


    public function deleteDataUser($id)
    {
        $where = array('no_induk' => $id);
        $this->Menu_model->delete($where, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Detail Data Mahasiswa Berhasil Dihapus.</div>');
        redirect('AdminUser/user_mahasiswa');
    }

    //================================================================= END DATA USER MAHASISWA ===================================================//


    public function user_laboran()
    {
        $data['title'] = 'Data Laboran';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->model(
            'Menu_model',
            'menu'
        );

        $data['dataUser'] = $this->menu->getDataUserLaboran();
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['masterUser'] = $this->menu->masterUserLaboran();

        $data['hasil'] = $this->menu->prodi();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/user_laboran', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $data = [
                'no_induk'      => $this->input->post('no_induk'),
                'nama'          => $this->input->post('nama'),
                'email'         => $this->input->post('email'),
                'no_hp'         => $this->input->post('no_hp'),
                'alamat'        => $this->input->post('alamat'),
                'jabatan'       => $this->input->post('jabatan'),
                'foto_profile'  => 'default.png',
                'id_prodi'      => $this->input->post('id_prodi'),
                'date_created'  => $this->input->post('date_created'),
            ];
            $this->db->insert('tb_personel_ftk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data Laboran Berhasil Ditambahkan.</div>');
            redirect('AdminUser/user_laboran');
        }
    }

    public function editUserLaboran($id)
    {
        $dataUser           = $this->Menu_model;
        $dataRole           = $this->Menu_model;
        $dataProdi           = $this->Menu_model;
        $data['dataUser']   = $dataUser->getByIdDataUser($id);
        $data['dataProdi']  = $dataProdi->getByProdi();
        $data['userdata']       = $dataUser->getByUserLaboran();
        $data['userRole']   = $dataRole->getByUserRole();
        $data['title']      = 'Edit Data User Laboran';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('editcontent/editUserLaboran', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataUserLaboran()
    {
        $nama       = $this->input->post('nama');
        $email   = $this->input->post('email');
        $no_hp    = $this->input->post('no_hp');
        $alamat    = $this->input->post('alamat');
        $jabatan  = $this->input->post('jabatan');
        $id_prodi  = $this->input->post('id_prodi');
        $date_created  = $this->input->post('date_created');

        $foto           = $_FILES['image']['name'];
        $no_induk             = $this->input->post('no_induk');

        $gambar         = $this->input->post('gambar');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/img/profile')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(


            'nama'      => $nama,
            'email'      => $email,
            'no_hp'      => $no_hp,
            'alamat'      => $alamat,
            'jabatan'      => $jabatan,
            'foto_profile'  => $image_cek,
            'id_prodi'  => $id_prodi,
            'date_created'  => $date_created,

        );
        $where = array('no_induk' => $no_induk);

        $this->Menu_model->newUpdate($where, $data, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data Laboran Berhasil Diedit.</div>');

        redirect('AdminUser/user_laboran');
    }

    public function deleteDataLaboran($id)
    {
        $where = array('no_induk' => $id);
        $this->Menu_model->delete($where, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Detail Data Laboran Berhasil Dihapus.</div>');
        redirect('AdminUser/user_laboran');
    }

    //================================================================= END DATA USER LABORAN ===========================================================\\


    public function user_kalab()
    {
        $data['title'] = 'Data Koordinator Laboratorium';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->model(
            'Menu_model',
            'menu'
        );

        $data['dataUser'] = $this->menu->getDataUserKalab();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['masterUser'] = $this->menu->masterUserKoorlab();

        $data['hasil'] = $this->menu->prodi();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/user_kalab', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $data = [
                'no_induk'      => $this->input->post('no_induk'),
                'nama'          => $this->input->post('nama'),
                'email'         => $this->input->post('email'),
                'no_hp'         => $this->input->post('no_hp'),
                'alamat'        => $this->input->post('alamat'),
                'jabatan'       => $this->input->post('jabatan'),
                'foto_profile'  => 'default.png',
                'id_prodi'      => $this->input->post('id_prodi'),
                'date_created'  => $this->input->post('date_created'),
            ];
            $this->db->insert('tb_personel_ftk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data Koorprodi Berhasil Ditambahkan.</div>');

            redirect('AdminUser/user_kalab');
        }
    }

    public function editUserKoorlab($id)
    {
        $dataUser           = $this->Menu_model;
        $dataRole           = $this->Menu_model;
        $dataProdi           = $this->Menu_model;
        $data['dataUser']   = $dataUser->getByIdDataUser($id);
        $data['dataProdi']  = $dataProdi->getByProdi();
        $data['userdata']       = $dataUser->getByUserKoorlab();
        $data['userRole']   = $dataRole->getByUserRole();
        $data['title']      = 'Edit Data User Koordinator Laboratorium';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('editcontent/editUserKoorlab', $data);
        $this->load->view('templates/footer');
    }


    public function newEditDataUserkoorlab()
    {
        $nama       = $this->input->post('nama');
        $email   = $this->input->post('email');
        $no_hp    = $this->input->post('no_hp');
        $alamat    = $this->input->post('alamat');
        $jabatan  = $this->input->post('jabatan');
        $id_prodi  = $this->input->post('id_prodi');
        $date_created  = $this->input->post('date_created');

        $foto           = $_FILES['image']['name'];
        $no_induk             = $this->input->post('no_induk');

        $gambar         = $this->input->post('gambar');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/img/profile')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(


            'nama'      => $nama,
            'email'      => $email,
            'no_hp'      => $no_hp,
            'alamat'      => $alamat,
            'jabatan'      => $jabatan,
            'foto_profile'  => $image_cek,
            'id_prodi'  => $id_prodi,
            'date_created'  => $date_created,

        );
        $where = array('no_induk' => $no_induk);

        $this->Menu_model->newUpdate($where, $data, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data Koorprodi Berhasil Diedit.</div>');

        redirect('AdminUser/user_laboran');
    }

    public function deleteDataKoorlab($id)
    {
        $where = array('no_induk' => $id);
        $this->Menu_model->delete($where, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Detail Data Koorlab Berhasil Dihapus.</div>');
        redirect('AdminUser/user_kalab');
    }

    //====================================================== END DATA KOORLAB =============================================\\



    public function user_kaprodi()
    {
        $data['title'] = 'Data Koordinator Prodi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->model(
            'Menu_model',
            'menu'
        );

        $data['dataUser'] = $this->menu->getDataUserKaprodi();
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['masterUser'] = $this->menu->masterUserKoorprodi();

        $data['hasil'] = $this->menu->prodi();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/user_kaprodi', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $data = [
                'no_induk'      => $this->input->post('no_induk'),
                'nama'          => $this->input->post('nama'),
                'email'         => $this->input->post('email'),
                'no_hp'         => $this->input->post('no_hp'),
                'alamat'        => $this->input->post('alamat'),
                'jabatan'       => $this->input->post('jabatan'),
                'foto_profile'  => 'default.png',
                'id_prodi'      => $this->input->post('id_prodi'),
                'date_created'  => $this->input->post('date_created'),
            ];
            $this->db->insert('tb_personel_ftk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data Koorprodi Berhasil Ditambahkan.</div>');
            redirect('AdminUser/user_kaprodi');
        }
    }


    public function editUserKoorprodi($id)
    {
        $dataUser           = $this->Menu_model;
        $dataRole           = $this->Menu_model;
        $dataProdi           = $this->Menu_model;

        $data['dataUser']   = $dataUser->getByIdDataUser($id);
        $data['dataProdi']  = $dataProdi->getByProdi();
        $data['userdata']       = $dataUser->getByUserKoorprodi();
        $data['userRole']   = $dataRole->getByUserRole();
        $data['title']      = 'Edit Data User Koordinator Laboratorium';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('editcontent/editUserKoorprodi', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataUserkoorprodi()
    {
        $nama       = $this->input->post('nama');
        $email   = $this->input->post('email');
        $no_hp    = $this->input->post('no_hp');
        $alamat    = $this->input->post('alamat');
        $jabatan  = $this->input->post('jabatan');
        $id_prodi  = $this->input->post('id_prodi');
        $date_created  = $this->input->post('date_created');

        $foto           = $_FILES['image']['name'];
        $no_induk             = $this->input->post('no_induk');

        $gambar         = $this->input->post('gambar');

        if ($foto == '') {
            $image_cek = $gambar;
        } else {
            $image_cek = $foto;
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/img/profile')
            );

            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('image');
        }
        $data = array(


            'nama'      => $nama,
            'email'      => $email,
            'no_hp'      => $no_hp,
            'alamat'      => $alamat,
            'jabatan'      => $jabatan,
            'foto_profile'  => $image_cek,
            'id_prodi'  => $id_prodi,
            'date_created'  => $date_created,

        );
        $where = array('no_induk' => $no_induk);

        $this->Menu_model->newUpdate($where, $data, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data Koorprodi Berhasil Diedit.</div>');

        redirect('AdminUser/user_kaprodi');
    }

    public function deleteDataKoorprodi($id)
    {
        $where = array('no_induk' => $id);
        $this->Menu_model->delete($where, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Detail Data Koorprodi Berhasil Dihapus.</div>');
        redirect('AdminUser/user_kaprodi');
    }
}
