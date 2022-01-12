<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('M_kategori');
        $this->load->model('Pelaporan_model');
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

    public function index()
    {
        $data['title'] = 'Dashboard';
        //$data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'MY PROFILE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/profile', $data);
        $this->load->view('templates/footer');
    }
    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'No. Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/editProfile', $data);
            $this->load->view('templates/footer');
        } else {
            # code...
            $nama       = $this->input->post('nama');
            $no_induk   = $this->input->post('no_induk');
            $no_hp      = $this->input->post('no_hp');
            $alamat     = $this->input->post('alamat');
            $email     = $this->input->post('email');
            $jabatan     = $this->input->post('jabatan');

            $upload_image = $_FILES['foto_profile']['name'];
            if ($upload_image) {
                # code...
                $config['allowed_types'] = 'jpg|JPG|jpeg|gif|png|bmp';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_profile')) {
                    # code...
                    $old_image = $data['user']['foto_profile'];
                    if ($old_image != 'default.jpg') {
                        # code...
                        unlink(FCPATH . './assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_profile', $new_image);
                } else {
                    # code...
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('no_hp', $no_hp);
            $this->db->set('alamat', $alamat);
            $this->db->set('email', $email);
            $this->db->set('jabatan', $jabatan);
            $this->db->where('no_induk', $no_induk);
            $this->db->update('tb_personel_ftk');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Berhasil Di Update</div>');
            redirect('admin/profile');
        }
    }

    ////////////////////////////////////// Master Data Prodi ///////////////////////////////////////////////////


    public function dataProdi()
    {
        $data['title'] = 'Master Data Prodi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/dataProdi', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $this->db->insert('tb_prodi', [
                'nama_prodi'    => $this->input->post('nama_prodi'),
                'jurusan'       => $this->input->post('jurusan'),
                'fakultas'      => $this->input->post('fakultas')

            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prodi Berhasil Ditambahkan</div>');
            redirect('admin/dataProdi');
        }
    }

    public function deleteDataProdi($id)
    {
        $where = array('id_prodi' => $id);
        $this->Menu_model->delete($where, 'tb_prodi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Prodi Berhasil Diedit</div>');
        redirect('admin/dataProdi');
    }

    public function editDataProdi($id)
    {
        $dataProdi          = $this->Menu_model;
        $data['dataProdi']  = $dataProdi->getByIdDataProdi($id);
        $data['title']      = 'Edit Data Prodi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('editcontent/editDataProdi', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataProdi()
    {
        $nama_prodi = $this->input->post('nama_prodi');
        $jurusan    = $this->input->post('jurusan');
        $fakultas   = $this->input->post('fakultas');
        $id         = $this->input->post('id_prodi');


        $data = array(

            'nama_prodi' => $nama_prodi,
            'jurusan'    => $jurusan,
            'fakultas'   => $fakultas


        );
        $where = array('id_prodi' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_prodi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prodi Berhasil Diedit</div>');

        redirect('admin/dataProdi');
    }

    ///////////////////////////////////////// MASTER DATA ASET ///////////////////////////////////////////////////
    public function aset()
    {
        $data['title'] = 'Data Aset Prodi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/aset', $data);
        $this->load->view('templates/footer');
    }


    public function dataAset()
    {
        $data['title'] = 'Master Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetMaster();
        $data['lokasi'] = $this->db->get('tb_lokasi')->result_array();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();
        $data['tampilprodi'] = $this->Menu_model->tampilProdiAset();

        $this->form_validation->set_rules('labaset', 'Nama Lab', 'required');
        $this->form_validation->set_rules('prodiaset', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('editor', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('contentAset/dataAset', $data);
            $this->load->view('templates/footer_tabel');
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Berhasil Ditambah</div>');
            redirect('admin/dataAset');
        }
    }

    function get_lokasi_aset()
    {
        $id_prodi = $this->input->post('id_prodi');
        $data = $this->Menu_model->get_lokasi_aset($id_prodi);
        echo json_encode($data);
    }

    public function editDataAset($id)
    {
        $asetData            = $this->Menu_model;
        $dataLokasi          = $this->Menu_model;
        $data['asetData']    = $asetData->getByIdDataAset($id);
        $data['dataLokasi']  = $dataLokasi->getByLokasi();
        $data['dataProdi']   = $dataLokasi->getByProdi();
        $data['tampilprodi'] = $this->Menu_model->tampilProdiAset();
        $data['title']       = 'Edit Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentAset/editDataAset', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataAset()
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Berhasil Diedit</div>');

        redirect('admin/dataAset');
    }

    public function deleteDataAset($id)
    {
        $where = array('kode_aset' => $id);
        $this->Menu_model->delete($where, 'tb_aset');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Aset Berhasil Diedit</div>');
        redirect('admin/dataAset');
    }




    ///////////////////////////////////// END DATA ASET ////////////////////////////////////////////////////////

    ///////////////////////////////////// DATA LOKASI //////////////////////////////////////////////////////////


    public function dataLokasi()
    {
        $data['title'] = 'Master Data Lokasi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['dataLokasi'] = $this->menu->getDataLokasi();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('nama_lab', 'Nama Lab', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/dataLokasi', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $data = [
                'id_prodi'   => $this->input->post('id_prodi'),
                'nama_lab'   => $this->input->post('nama_lab')
            ];

            $this->db->insert('tb_lokasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lokasi Lab Berhasil Ditambahkan.</div>');
            redirect('admin/dataLokasi');
        }
    }

    public function editDataLokasi($id)
    {
        $dataLokasi         = $this->Menu_model;
        $dataProdi          = $this->Menu_model;
        $data['dataLokasi'] = $dataLokasi->getByIdDataLokasi($id);
        $data['dataProdi']  = $dataProdi->getByProdi();
        $data['title']      = 'Edit Data Lokasi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('editcontent/editDataLokasi', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataLokasi()
    {
        $id_prodi   = $this->input->post('id_prodi');
        $nama_lab   = $this->input->post('nama_lab');
        $id         = $this->input->post('id_lokasi');


        $data = array(

            'id_prodi' => $id_prodi,
            'nama_lab' => $nama_lab,


        );
        $where = array('id_lokasi' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_lokasi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lokasi Lab Berhasil Diedit</div>');

        redirect('admin/dataLokasi');
    }

    public function deleteDataLokasi($id)
    {
        $where = array('id_lokasi' => $id);
        $this->Menu_model->delete($where, 'tb_lokasi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Lokasi Lab Berhasil Dihapus</div>');
        redirect('admin/dataLokasi');
    }

    ///////////////////////////////////// END DATA LOKASI ///////////////////////////////////////////////////////

    ///////////////////////////////////// DATA USER ///////////////////////////////////////////////////////
    public function dataUserLogin()
    {
        # code...
        $data['title'] = 'Data User Login';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->model(
            'Menu_model',
            'menu'
        );

        $data['dataUser'] = $this->menu->getDataUserLogin();


        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique'     => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/dataUserLogin', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $data = [
                'username'      => htmlspecialchars($this->input->post('username')),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'       =>  $this->input->post('role_id'),
                'is_active'     =>  $this->input->post('is_active')
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Ditambahkan</div>');
            redirect('admin/dataUserLogin');
        }
    }

    public function editDataUserLogin($id)
    {
        $dataUser           = $this->Menu_model;
        $dataRole           = $this->Menu_model;
        $data['dataUser']   = $dataUser->getByIdDataUserLogin($id);
        $data['userRole']   = $dataRole->getByUserRole();
        $data['title']      = 'Edit Data User Login';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('editcontent/editDataUserLogin', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataUserLogin()
    {

        $username      = $this->input->post('username');
        $password      = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role_id    = $this->input->post('role_id');
        $is_active  = $this->input->post('is_active');
        $id         = $this->input->post('id_user');


        $data = array(


            'username'     => $username,
            'password'     => $password,
            'role_id'      => $role_id,
            'is_active'    => $is_active,


        );
        $where = array('id_user' => $id);

        $this->Menu_model->newUpdate($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil Diedit</div>');

        redirect('admin/dataUserLogin');
    }

    public function deleteDataUserLogin($id)
    {
        $where = array('id_user' => $id);
        $this->Menu_model->delete($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data User Berhasil Dihapus</div>');
        redirect('admin/dataUserLogin');
    }


    public function dataUser()
    {
        $data['title'] = 'Data Detail User';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->model(
            'Menu_model',
            'menu'
        );

        $data['dataUser'] = $this->menu->getDataUser();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['masterUser'] = $this->db->get('user')->result_array();

        $data['hasil'] = $this->menu->prodi();



        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/dataUser', $data);
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data User Berhasil Ditambahkan</div>');
            redirect('admin/dataUser');
        }
    }



    public function editDataUser($id)
    {
        $dataUser           = $this->Menu_model;
        $dataRole           = $this->Menu_model;
        $dataProdi           = $this->Menu_model;
        $data['dataUser']   = $dataUser->getByIdDataUser($id);
        $data['dataProdi']  = $dataProdi->getByProdi();
        $data['userdata']       = $dataUser->getByUser();
        $data['userRole']   = $dataRole->getByUserRole();
        $data['title']      = 'Edit Data User';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('editcontent/editDataUser', $data);
        $this->load->view('templates/footer');
    }


    public function newEditDataUser()
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data User Berhasil Diedit</div>');
        redirect('admin/dataUser');
    }


    public function deleteDataUser($id)
    {
        $where = array('no_induk' => $id);
        $this->Menu_model->delete($where, 'tb_personel_ftk');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Detail Data User Berhasil Dihapus</div>');
        redirect('admin/dataUser');
    }

    ///////////////////////////////////// END DATA USER ///////////////////////////////////////////////////////

    public function data_pelaporan_admin()
    {
        # code...
        $data['title'] = 'Data Pelaporan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Pelaporan_model', 'menu');

        $data['dataPelaporan'] = $this->menu->getDataPelaporanAdmin();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/dataPelaporanAdmin', $data);
        $this->load->view('templates/footer_tabel');
    }
    public function deleteDataPelaporan($id)
    {
        $where = array('id_laporan' => $id);
        $this->Menu_model->delete($where, 'tb_pelaporan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Pelaporan Berhasil Dihapus</div>');
        redirect('admin/data_pelaporan_admin');
    }

    public function formTanggapan($id)
    {
        $dataPelaporan        = $this->Pelaporan_model;
        $data['dataLaporan']  = $dataPelaporan->getByIdDataPelaporan($id);
        $data['title']      = 'Beri Tanggapan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/formTanggapan', $data);
        $this->load->view('templates/footer');
    }

    public function tanggapan()
    {
        $id        = $this->input->post('id_laporan');
        $editor = $this->input->post('editor');


        $data = array(

            'tanggapan' => $editor,


        );
        $where = array('id_laporan' => $id);

        $this->Pelaporan_model->newUpdate($where, $data, 'tb_pelaporan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Data User Berhasil Ditanggapi</div>');

        redirect('admin/data_pelaporan_admin');
    }

    public function daftarPeminjamanAlat()
    {

        $role = $this->session->userdata('role_id');
        $data['title'] = 'Daftar Peminjaman Alat';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['pinjam'] = $this->m_kategori->get_peminjaman_admin();
        $data['kembali'] = $this->m_kategori->get_pengembalian();
        $data['laboran'] = $this->m_kategori->get_laboran();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/daftar_peminjaman_alat_admin', $data);
        $this->load->view('templates/footer');
    }


    public function manajemenDataRuangan()
    {
        $data['title'] = 'Manajemen Data Ruangan';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/manajemenDataRuangan', $data);
        $this->load->view('templates/footer');
    }

    public function kopsurat()
    {
        # code...

        $data['title'] = 'Manajemen Kop Surat';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();

        $this->load->model('m_kategori');
        $data['kopsurat'] = $this->m_kategori->get_kopsurat();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/manajemenKopSurat', $data);
        $this->load->view('templates/footer_tabel');
    }

    public function inputkopsurat()
    {
        $konfigurasi = array(
            'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
            'upload_path'  => realpath('./assets/media')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('image');
        $data = [
            'logo'          => $_FILES['image']['name'],
            'konten_kopsurat'   => $this->input->post('editor'),
            'status'   => $this->input->post('status')

        ];

        $this->db->insert('tb_kopsurat', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Berhasil Ditambahkan</div>');
        redirect('admin/kopsurat');
    }

    public function editKopSurat($id)
    {
        $this->load->model('M_kategori');
        $asetData            = $this->M_kategori;
        $data['kopsurat']    = $asetData->getByIdKopSurat($id);
        $data['title']       = 'Edit Kop Surat';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/editKopSurat', $data);
        $this->load->view('templates/footer');
    }

    public function newEditKopSurat()
    {
        $editor    = $this->input->post('editor');
        $status     = $this->input->post('status');
        $foto           = $_FILES['image']['name'];
        $id             = $this->input->post('id_kopsurat');

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

            'konten_kopsurat'   => $editor,
            'status'    => $status,
            'logo'          => $image_cek,


        );
        $where = array('id_kopsurat' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_kopsurat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kop Surat Diedit</div>');

        redirect('admin/kopsurat');
    }

    public function deleteKopSurat($id)
    {
        $where = array('id_kopsurat' => $id);
        $this->Menu_model->delete($where, 'tb_kopsurat');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Kop Surat Berhasil Dihapus</div>');
        redirect('admin/kopsurat');
    }

    public function masterbhp()
    {
        $data['title'] = 'Master Data Bahan Habis Pakai';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['masterbhp'] = $this->db->get('tb_master_bhp')->result_array();

        $this->form_validation->set_rules('nama_bahan', 'Nama Barang', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/masterbhp', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $konfigurasi = array(
                'allowed_types' => 'jpg|JPG|jpeg|gif|png|bmp',
                'upload_path'  => realpath('./assets/media')
            );
            $this->load->library('upload', $konfigurasi);
            $this->upload->do_upload('foto');
            $data = [
                'nama_bahan'    => $this->input->post('nama_bahan'),
                'satuan'        => $this->input->post('satuan'),
                'foto'          => $_FILES['image']['name']

            ];

            $this->db->insert('tb_master_bhp', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master Data BHP Berhasil Ditambahkan</div>');
            redirect('admin/masterbhp');
        }
    }

    public function editMasterBhp($id)
    {
        $bhpData            = $this->Menu_model;
        $data['dataBhp']    = $bhpData->getByIdDatabhp($id);
        $data['title']       = 'Edit Master Data Bahan Habis Pakai';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/editDataBhp', $data);
        $this->load->view('templates/footer');
    }

    public function neweditdatabhp()
    {

        $nama_bahan     = $this->input->post('nama_bahan');
        $satuan         = $this->input->post('satuan');
        $foto           = $_FILES['image']['name'];
        $id             = $this->input->post('id_master_bhp');

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
            'nama_bahan'    => $nama_bahan,
            'satuan'        => $satuan,
            'foto'          => $image_cek,


        );
        $where = array('id_master_bhp' => $id);

        // $this->db->where($where);
        // $this->db->update('tb_master_bhp', $data);

        $this->Menu_model->newUpdate($where, $data, 'tb_master_bhp');

        redirect('admin/masterbhp');
    }

    public function deleteMasterBhp($id)
    {
        $where = array('id_master_bhp' => $id);
        $this->Menu_model->delete($where, 'tb_master_bhp');
        redirect('admin/masterbhp');
    }

    public function barangHabisPakai()
    {
        $data['title'] = 'Bahan Habis Pakai';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $this->load->model('m_kategori');

        $data['dataBHP'] = $this->menu->getDataBHP();
        //$data['lokasi'] = $this->m_kategori->get_lokasi_bhp();
        //$data['lokasi'] = $this->m_kategori->get_lokasi_bhp();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();
        $data['masterbhp'] = $this->db->get('tb_master_bhp')->result_array();
        $data['noba'] = $this->db->get('tb_no_ba')->result_array();
        $data['nba'] = $this->m_kategori->get_no_ba();
        $data['count'] = $this->m_kategori->get_jumlah_bhp();

        $this->form_validation->set_rules('no_ba', 'No BA', 'required');
        $this->form_validation->set_rules('id_master_bhp', 'Nama Bahan/Satuan', 'required');
        $this->form_validation->set_rules('id_lokasi', 'Nama Lab', 'required');
        $this->form_validation->set_rules('no_ba', 'No BA', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/pengadaanBHP', $data);
            $this->load->view('templates/footer_tabel');
        } else {

            $no_ba      = $this->input->post('no_ba');
            $id_lokasi     = $this->input->post('id_lokasi');
            $id_master_bhp    = $this->input->post('id_master_bhp');
            $jumlah        = $this->input->post('jumlah');
            $username = $this->session->userdata('username');
            $id_prodi = $this->session->userdata('id_prodi');
            $date_time = $this->input->post('date_time');
            $data = [
                'id_user' => $username,
                'no_ba' => $no_ba,
                'id_lokasi' => $id_lokasi,
                'id_master_bhp' => $id_master_bhp,
                'jumlah' => $jumlah,
                'id_prodi' => $id_prodi,
                'date_time' => $date_time


            ];

            $this->db->insert('tb_detail_bhp', $data);
            $this->session->set_flashdata('msg', "Data Permohonan Bahan Habis Pakai berhasil ditambahkan. Silahkan hubungi Koordinator Lab untuk melakukan proses selanjutnya. ");
            $this->session->set_flashdata('msg_class', 'alert-success');
            redirect('admin/barangHabisPakai');
        }
    }

    public function editDataBhp($id)
    {
        $bhpData            = $this->Menu_model;
        $dataMaster         = $this->Menu_model;
        $data['databhp']    = $bhpData->getByIdDetailBhp($id);
        $data['dataMaster']  = $dataMaster->getByIdMasterbhp();
        $data['dataProdi']   = $dataMaster->getByProdi();
        $data['title']       = 'Edit Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/editDataDetailBHP', $data);
        $this->load->view('templates/footer');
    }

    public function neweditdetailbhp()
    {
        $id_master_bhp   = $this->input->post('id_master_bhp');
        $id_lokasi   = $this->input->post('id_lokasi');
        $no_ba   = $this->input->post('no_ba');
        $jumlah   = $this->input->post('jumlah');
        $date_time   = $this->input->post('date_time');
        $id         = $this->input->post('id_detail_bhp');


        $data = array(

            'id_master_bhp' => $id_master_bhp,
            'id_lokasi' => $id_lokasi,
            'no_ba' => $no_ba,
            'jumlah' => $jumlah,
            'date_time' => $date_time


        );
        $where = array('id_detail_bhp' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_detail_bhp');

        redirect('admin/barangHabisPakai');
    }

    public function deleteDetailBhp($id)
    {
        $where = array('id_detail_bhp' => $id);
        $this->Menu_model->delete($where, 'tb_detail_bhp');
        redirect('admin/barangHabisPakai');
    }

    public function cetakSuratBebasLab()
    {
        $data['title'] = 'Cetak Surat Bebas Lab';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();



        $this->load->model('M_kategori', 'menu');

        $data['dataBl'] = $this->menu->getDataBebasLab();

        $this->form_validation->set_rules('id_prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('konsentrasi', 'Konsentrasi', 'required');
        $this->form_validation->set_rules('date', 'Tanggal Permohonan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarAdmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/cetakSuratBebasLab', $data);
            $this->load->view('templates/footer_tabel');
        } else {

            $data = [
                'id_prodi'    => $this->input->post('id_prodi'),
                'nama'        => $this->input->post('nama'),
                'nim'        => $this->input->post('nim'),
                'konsentrasi'        => $this->input->post('konsentrasi'),
                'judul_skripsi'        => $this->input->post('editor'),
                'date'        => $this->input->post('date'),

            ];

            $this->db->insert('tb_bebas_lab', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Bebas Lab Berhasil Ditambahkan</div>');
            redirect('admin/cetakSuratBebasLab');
        }
    }

    public function cetakSurketBebasLab()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "Cetak Surat Permohonan Bebas Lab"
        );

        $ba = $this->uri->segment(3);
        $st = $this->uri->segment(4);

        $st == 'pnj';
        $ctk = 'cetak_surketBebasLab';



        $this->load->model('m_kategori');
        $data['pinjam'] = $this->m_kategori->get_surket_bebasLab($ba);
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $html = $this->load->view('content/' . $ctk, $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('laporanku.pdf', array("Attachment" => false));
    }

    public function editDataBebaslab($id)
    {
        $bhpData            = $this->Menu_model;
        $bhpDatas            = $this->Menu_model;
        $data['dataBl']    = $bhpData->getByIdDataBl($id);
        $data['prodi']  = $bhpDatas->getByProdi();
        $data['title']       = 'Edit Data Permohonan Surat Bebas Lab';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/editDataBebasLab', $data);
        $this->load->view('templates/footer');
    }

    public function neweditbebaslab()
    {
        $id_prodi   = $this->input->post('id_prodi');
        $nama   = $this->input->post('nama');
        $nim   = $this->input->post('nim');
        $konsentrasi   = $this->input->post('konsentrasi');
        $editor   = $this->input->post('editor');
        $id         = $this->input->post('id_bebas_lab');


        $data = array(

            'id_prodi' => $id_prodi,
            'nama' => $nama,
            'nim' => $nim,
            'konsentrasi' => $konsentrasi,
            'judul_skripsi' => $editor


        );
        $where = array('id_bebas_lab' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_bebas_lab');

        redirect('admin/cetakSuratBebasLab');
    }

    public function deleteBebasLab($id)
    {
        $where = array('id_bebas_lab' => $id);
        $this->Menu_model->delete($where, 'tb_bebas_lab');
        redirect('admin/cetakSuratBebasLab');
    }
}
