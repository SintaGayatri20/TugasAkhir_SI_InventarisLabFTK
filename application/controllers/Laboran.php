<?php
defined('BASEPATH') or exit('No direct script access allowed');

error_reporting(0);
ini_set('display_errors', 0);


class Laboran extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Pelaporan_model');
        $this->load->model('M_kategori');
        $this->load->helper('url');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('Peminjaman_model');

        $role_id = $this->session->userdata('role_id');
        $username = $this->session->userdata('username');
        if ($username == '') {
            redirect('login');
        }

        if ($role_id != 4) {
            redirect('Tanggapan');
        }
    }


    public function index()
    {

        $data['title'] = 'Dashboard';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        //$data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/dashboard_laboran', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/profile_laboran', $data);
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
            $this->load->view('templates/sidebarLaboran', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laboranContent/editProfile_laboran', $data);
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
            redirect('laboran/profile');
        }
    }


    ///=============================== DATA LOKASI ===============================


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
            $this->load->view('templates/sidebarLaboran', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laboranContent/dataLokasi', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $data = [
                'id_prodi'   => $this->input->post('id_prodi'),
                'nama_lab'   => $this->input->post('nama_lab')
            ];

            $this->db->insert('tb_lokasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lokasi Brhasil Ditambahkan</div>');
            redirect('laboran/dataLokasi');
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
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/editDataLokasi', $data);
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lokasi Brhasil Diedit</div>');

        redirect('laboran/dataLokasi');
    }

    public function deleteDataLokasi($id)
    {
        $where = array('id_lokasi' => $id);
        $this->Menu_model->delete($where, 'tb_lokasi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Lokasi Brhasil Dihapus</div>');
        redirect('laboran/dataLokasi');
    }

    //============================== END DATA LOKASI ==============================//

    //============================= Master Data Prodi =============================//


    public function dataProdi()
    {
        $data['title'] = 'Master Data Prodi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarLaboran', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laboranContent/dataProdi', $data);
            $this->load->view('templates/footer_tabel');
        } else {
            $this->db->insert('tb_prodi', [
                'nama_prodi'    => $this->input->post('nama_prodi'),
                'jurusan'       => $this->input->post('jurusan'),
                'fakultas'      => $this->input->post('fakultas'),
                'url'           => $this->input->post('url')

            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prodi Berhasil Ditambahkan</div>');
            redirect('laboran/dataProdi');
        }
    }

    public function deleteDataProdi($id)
    {
        $where = array('id_prodi' => $id);
        $this->Menu_model->delete($where, 'tb_prodi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Prodi Berhasil Didelete</div>');
        redirect('laboran/dataProdi');
    }

    public function editDataProdi($id)
    {
        $dataProdi          = $this->Menu_model;
        $data['dataProdi']  = $dataProdi->getByIdDataProdi($id);
        $data['title']      = 'Edit Data Prodi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/editDataProdi', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataProdi()
    {
        $nama_prodi = $this->input->post('nama_prodi');
        $jurusan    = $this->input->post('jurusan');
        $fakultas   = $this->input->post('fakultas');
        $url        = $this->input->post('url');
        $id         = $this->input->post('id_prodi');


        $data = array(

            'nama_prodi' => $nama_prodi,
            'jurusan'    => $jurusan,
            'fakultas'   => $fakultas,
            'url'        => $url,


        );
        $where = array('id_prodi' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_prodi');

        redirect('laboran/dataProdi');
    }

    //================================= END DATA PRODI=================================/

    //================================ MASTER DATA ASET ================================/
    public function aset()
    {
        $data['title'] = 'Data Aset Prodi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['prodi'] = $this->db->get('tb_prodi_laboran')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/aset', $data);
        $this->load->view('templates/footer');
    }


    public function dataAset()
    {
        $data['title'] = 'Master Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $id_prodi = $this->session->userdata('id_prodi');
        $data['dataAset'] = $this->menu->getDataAset($id_prodi);
        $data['lokasi'] = $this->db->get_where('tb_lokasi', ["id_prodi" => $id_prodi])->result_array();
        $data['prodi'] = $this->db->get_where('tb_prodi', ["id_prodi" => $id_prodi])->row();
        $data['tampilprodi'] = $this->Menu_model->tampilProdiAset();

        $this->form_validation->set_rules('id_lokasi', 'Nama Lab', 'required');
        $this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('editor', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarLaboran', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laboranContent/dataAset', $data);
            $this->load->view('templates/footer_tabel');
        } else {
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

            $this->db->insert('tb_aset', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Berhasil Ditambahkan</div>');
            redirect('laboran/dataAset');
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
        $data['title']       = 'Edit Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/editDataAset', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataAset()
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
        $where = array('kode_aset' => $id);

        $this->Menu_model->newUpdate($where, $data, 'tb_aset');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Berhasil Diedit</div>');

        redirect('laboran/dataAset');
    }

    public function deleteDataAset($id)
    {
        $where = array('kode_aset' => $id);
        $this->Menu_model->delete($where, 'tb_aset');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Aset Berhasil Dihapus</div>');
        redirect('laboran/dataAset');
    }


    public function daftarPeminjamanAlat()
    {
        $data['title'] = 'Daftar Peminjaman Alat';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['pinjam'] = $this->m_kategori->get_peminjaman();
        $data['historypinjam'] = $this->m_kategori->get_history_peminjaman();
        $data['historykembali'] = $this->m_kategori->get_history_pengembalian();
        $data['kembali'] = $this->m_kategori->get_pengembalian();
        $data['laboran'] = $this->m_kategori->get_laboran();
        $data['approval'] = $this->m_kategori->get_approval();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/daftar_peminjaman_alat', $data);
        $this->load->view('templates/footer');
    }

    public function laboranApprove()
    {
        $this->load->model('Peminjaman_model');
        $id_peminjam = $this->input->post('id_peminjaman');
        $approval = $this->input->post('approval');
        $data = array(
            'id_peminjaman' => $id_peminjam,
            'approval' => $approval,
            'approval_status' => 0
        );
        $this->Peminjaman_model->insert_approve($data, 'tb_approval_koorprodi', $id_peminjam);
        redirect('laboran/daftarpeminjamanalat');
        //$upload = $this->Peminjaman_model->lbapprove();
    }

    public function revisiLaboran()
    {
        $this->load->model('Peminjaman_model');
        $id_peminjam = $this->input->post('id_peminjaman');
        $alasan_revisi = $this->input->post('alasan_revisi');
        $this->Peminjaman_model->revlaboran($id_peminjam, $alasan_revisi);
        redirect('laboran/daftarpeminjamanalat');
    }

    public function kembaliLaboran()
    {
        $this->load->model('Peminjaman_model');
        $id_peminjam = $this->input->post('id_peminjaman');
        $catatan = $this->input->post('catatan');
        $this->Peminjaman_model->kmblaboran($id_peminjam, $catatan);
        redirect('laboran/daftarpeminjamanalat');
    }



    //======================================== END DATA ASET========================================//

    //======================================== DATA BARANG HABIS PAKAI ====================================

    // 

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
            $this->load->view('templates/sidebarLaboran', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laboranContent/pengadaanBHP', $data);
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
            redirect('laboran/barangHabisPakai');
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
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/editDataDetailBHP', $data);
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

        redirect('laboran/barangHabisPakai');
    }

    public function deleteDetailBhp($id)
    {
        $where = array('id_detail_bhp' => $id);
        $this->Menu_model->delete($where, 'tb_detail_bhp');
        redirect('laboran/barangHabisPakai');
    }

    public function pengadaanBHP()
    {
        # code...
        $data['title'] = 'Form Pengadaan Bahan Habis Pakai';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['prodi'] = $this->m_kategori->get_prodi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/form_bhp', $data);
        $this->load->view('templates/footer');
    }

    public function formPilihBHP()
    {
        $id = $this->input->post('subkategori');
        $data['title'] = 'Form Peminjaman Alat';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['databhp'] = $this->m_kategori->get_bhp($id);
        $data['nba'] = $this->m_kategori->get_no_ba();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/form_pilih_bhp', $data);
        $this->load->view('templates/footer');
    }

    public function saveBhp()
    {

        $this->load->model('m_kategori');
        $id_bhp = $this->input->post('id_bhp');
        $username = $this->session->userdata('username');
        for ($i = 0; $i < sizeof($id_bhp); $i++) {
            # code...
            $data = array(
                'id_bhp' => $id_bhp[$i],
                'id_user' => $username
            );
            $this->db->insert('tb_pengadaan_bhp', $data);
        }

        $this->session->set_flashdata('msg', "Data Permohonan Bahan Habis Pakai Berhasil Diajukan, Silahkan Hubungi Koordinator Lab Untuk Melakukan Proses Selanjutnya.");

        $this->session->set_flashdata('msg_class', 'alert-success');

        return redirect('laboran/formPilihBHP');
    }

    public function data_pelaporan()
    {
        $data['title'] = 'Data Pelaporan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Pelaporan_model', 'menu');

        $data['dataPelaporan'] = $this->menu->getDataPelaporan();
        $data['lokasi'] = $this->db->query("SELECT * FROM tb_lokasi a, tb_prodi b WHERE a.id_prodi = b.id_prodi")->result_array();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $data['hasil'] = $this->menu->lokasi();

        $this->form_validation->set_rules('aset', 'Aset', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarLaboran', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laboranContent/dataPelaporan', $data);
            $this->load->view('templates/footer_tabel');
        } else {

            $data = [
                'id_user'           => $this->session->userdata('username'),
                'tgl_lapor'         => $this->input->post('tanggal'),
                'kode_aset'         => $this->input->post('aset'),
                'deskripsi_laporan' => $this->input->post('editor'),

            ];

            $this->db->insert('tb_pelaporan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pelaporan Berhasil Ditambahkan</div>');
            redirect('laboran/data_pelaporan');
        }
    }


    public function editDataPelaporan($id)
    {
        $pelaporan            = $this->Pelaporan_model;
        $data['pelaporan']    = $pelaporan->getByIdDataPelaporan($id);
        $data['hasil']        = $this->Pelaporan_model->lokasi();
        $data['title']       = 'Edit Data Pelaporan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/editDataPelaporan', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataPelaporan()
    {
        $id_user   = $this->input->post('id_user');
        $kode_aset   = $this->input->post('aset');
        $tgl_lapor   = $this->input->post('tgl_lapor');
        $editor   = $this->input->post('editor');
        $id         = $this->input->post('id_laporan');


        $data = array(

            'id_user' => $id_user,
            'kode_aset' => $kode_aset,
            'tgl_lapor' => $tgl_lapor,
            'deskripsi_laporan' => $editor


        );
        $where = array('id_laporan' => $id);

        $this->Menu_model->newUpdate($where, $data, ' tb_pelaporan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pelaporan Berhasil Diedit</div>');

        redirect('laboran/data_pelaporan');
    }


    public function deletePelaporan($id)
    {
        $where = array('id_laporan' => $id);
        $this->Menu_model->delete($where, 'tb_pelaporan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Pelaporan Berhasil Dihapus</div>');
        redirect('laboran/data_pelaporan');
    }

    function get_lokasi()
    {
        $this->load->model('Pelaporan_model');
        $id_prodi = $this->input->post('id_prodi');
        $data = $this->Pelaporan_model->lokasi($id_prodi);
        echo json_encode($data);
    }

    function get_aset()
    {
        $this->load->model('Pelaporan_model');
        $id_lokasi = $this->input->post('id_lokasi');
        $data = $this->Pelaporan_model->aset($id_lokasi);
        echo json_encode($data);
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
            $this->load->view('templates/sidebarLaboran', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laboranContent/masterbhp', $data);
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
            redirect('laboran/masterbhp');
        }
    }

    public function editMasterBhp($id)
    {
        $bhpData            = $this->Menu_model;
        $data['dataBhp']    = $bhpData->getByIdDatabhp($id);
        $data['title']       = 'Edit Master Data Bahan Habis Pakai';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/editDataBhp', $data);
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

        redirect('laboran/masterbhp');
    }

    public function deleteMasterBhp($id)
    {
        $where = array('id_master_bhp' => $id);
        $this->Menu_model->delete($where, 'tb_master_bhp');
        redirect('laboran/masterbhp');
    }

    public function cetakSuratBebasLab()
    {
        $data['title'] = 'Cetak Surat Bebas Lab';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();



        $this->load->model('M_kategori', 'menu');

        $data['dataBl'] = $this->menu->getDataBebasLab();



        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/cetakSuratBebasLab', $data);
        $this->load->view('templates/footer_tabel');
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
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/editDataBebasLab', $data);
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

        redirect('laboran/cetakSuratBebasLab');
    }


    public function deleteBebasLab($id)
    {
        $where = array('id_detail_bhp' => $id);
        $this->Menu_model->delete($where, 'tb_detail_bhp');
        redirect('laboran/cetakSuratBebasLab');
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
        $data['prodi'] = $this->m_kategori->get_prodi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarLaboran');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/form_pilih_aset_ruangan', $data);
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
        $this->load->view('templates/sidebarLaboran');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/getdataasetruangan', $data);
        $this->load->view('templates/footer');
    }

    public function cetakPdf()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK"
        );



        $id = $this->input->post('id_lokasi');
        $this->load->model('m_kategori');
        $data['dataAset'] = $this->m_kategori->get_asets($id);
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdi.pdf', array("Attachment" => false));
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
        redirect('Laboran/formdataaset?kategori=' . $k . '&subkategori=' . $lokasi . '&submit=Submit');
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
        $this->load->view('templates/sidebarLaboran', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/editDataAsetRuangan', $data);
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
        redirect('Laboran/formdataaset?kategori=' . $k . '&subkategori=' . $lokasi . '&submit=Submit');
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
        $html = $this->load->view('laboranContent/' . $ctk, $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('laporanku.pdf', array("Attachment" => false));
    }
}
