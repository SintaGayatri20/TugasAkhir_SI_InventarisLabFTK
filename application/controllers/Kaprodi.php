<?php
defined('BASEPATH') or exit('No direct script access allowed');

error_reporting(0);
ini_set('display_errors', 0);

class Kaprodi extends CI_Controller
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

        if ($role_id != 3) {
            redirect('Tanggapan');
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/dashboardKaprodi', $data);
        $this->load->view('templates/footer');
    }

    public function daftarPeminjamanAlat()
    {
        $data['title'] = 'Daftar Peminjaman Alat';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['pinjam'] = $this->m_kategori->get_kaprodi_approve();
        $data['kembali'] = $this->m_kategori->get_kaprodi_kembali();
        $data['historypinjam'] = $this->m_kategori->get_history_peminjaman_kaprodi();
        $data['historykembali'] = $this->m_kategori->get_history_pengembalian_kaprodi();
        $data['laboran'] = $this->m_kategori->get_laboran();
        $data['approval'] = $this->m_kategori->get_approval();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/kaprodi_approve_peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function kaprodiApprove()
    {
        $this->load->model('Peminjaman_model');
        $id_peminjam = $this->input->post('id_peminjaman');

        $this->Peminjaman_model->approvekaprodi($id_peminjam);
        redirect('kaprodi/daftarpeminjamanalat');
        //$upload = $this->Peminjaman_model->lbapprove();
    }

    public function revisiKaprodi()
    {
        $this->load->model('Peminjaman_model');
        $id_peminjam = $this->input->post('id_peminjaman');
        $alasan_revisi = $this->input->post('alasan_revisi');
        $this->Peminjaman_model->revkaprodi($id_peminjam, $alasan_revisi);
        redirect('kaprodi/daftarpeminjamanalat');
    }

    public function kaprodiApproveKembali()
    {
        $this->load->model('Peminjaman_model');
        $id_approve = $this->input->post('id_approve');
        $id_peminjam = $this->input->post('id_peminjam');
        $jumlah_pinjam = $this->input->post('jumlah_pinjam');
        $kode_aset = $this->input->post('kode_aset');
        $jumlah_aset = $this->input->post('jumlah_aset');
        $status_kembali = $this->input->post('status_kembali');

        $this->Peminjaman_model->approvekaprodikembali($id_approve, $id_peminjam, $jumlah_pinjam, $kode_aset, $jumlah_aset, $status_kembali);
        //$this->Peminjaman_model->approveasetkembali($id_peminjam, $jumlah_pinjam, $kode_aset, $jumlah_aset);
        redirect('kaprodi/daftarpeminjamanalat');
        //$upload = $this->Peminjaman_model->lbapprove();
    }

    public function profile()
    {
        $data['title'] = 'MY PROFILE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koorprodi/profile', $data);
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
            $this->load->view('templates/sidebarKaprodi', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('koorprodi/editProfile', $data);
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
            redirect('kaprodi/profile');
        }
    }


    public function aset()
    {
        $data['title'] = 'Data Aset Prodi';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/aset', $data);
        $this->load->view('templates/footer');
    }

    public function dataAset()
    {
        $data['title'] = 'Master Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAset();
        $data['lokasi'] = $this->db->get('tb_lokasi')->result_array();
        $data['prodi'] = $this->db->get('tb_prodi')->result_array();

        $this->form_validation->set_rules('id_lokasi', 'Nama Lab', 'required');
        $this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarKaprodi', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('contentKoorprodi/dataAset', $data);
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
                'spesifikasi'   => $this->input->post('spesifikasi'),
                'jumlah'        => $this->input->post('jumlah'),
                'satuan'        => $this->input->post('satuan'),
                'keterangan'    => $this->input->post('keterangan'),
                'foto'          => $_FILES['image']['name']

            ];

            $this->db->insert('tb_aset', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Assets Added!</div>');
            redirect('kaprodi/dataAset');
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
        $data['user']        = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/editDataAset', $data);
        $this->load->view('templates/footer');
    }

    public function newEditDataAset()
    {
        $id_lokasi      = $this->input->post('id_lokasi');
        $id_prodi       = $this->input->post('id_prodi');
        $nama_barang    = $this->input->post('nama_barang');
        $spesifikasi    = $this->input->post('spesifikasi');
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

        redirect('kaprodi/dataAset');
    }

    public function deleteDataAset($id)
    {
        $where = array('kode_aset' => $id);
        $this->Menu_model->delete($where, 'tb_aset');
        redirect('kaprodi/dataAset');
    }

    public function prodiMI()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetMI();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetProdiMI', $data);
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
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetProdiILKOM', $data);
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
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetprodiPTI', $data);
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
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetprodiSI', $data);
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
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetprodiPTM', $data);
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
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetprodiPKK', $data);
        $this->load->view('templates/footer_tabel');
    }


    //////////////////////////////////////////////// END PRODI PKK /////////////////////////////////////////////////////////////

    //////////////////////////////////////////////// PRODI TE /////////////////////////////////////////////////////////////
    public function prodiTE()
    {
        $data['title'] = 'Data Aset';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetTE();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetprodiTE', $data);
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
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetprodiPTE', $data);
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
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/dataAsetprodiPVSK', $data);
        $this->load->view('templates/footer_tabel');
    }


    public function brgRusakRuangan1()
    {
        $data['title'] = 'Barang Rusak Ruangan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getBrgRusakRuangan();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentKoorprodi/brgRusakRuangan', $data);
        $this->load->view('templates/footer_tabel');
    }

    public function brgRusakRuangan()
    {

        $data['title'] = 'Barang Rusak Ruangan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $this->load->model('Pelaporan_model');

        $data['dataAset'] = $this->menu->getBrgRusakRuanganLaboran();
        $id_prodi = $this->session->userdata('id_prodi');
        $data['lokasi'] = $this->db->get_where('tb_lokasi', ["id_prodi" => $id_prodi])->result_array();
        $data['prodi'] = $this->db->get_where('tb_prodi', ["id_prodi" => $id_prodi])->row();
        $data['hasil'] = $this->Pelaporan_model->prodi();

        $this->form_validation->set_rules('id_lokasi', 'Nama Lab', 'required');
        $this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('editor', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarKaprodi', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('koorprodi/brgRusakRuangan', $data);
            $this->load->view('templates/footer');
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

            $this->session->set_flashdata('msg', "Data Aset Rusak Ruangan Berhasil Ditambahkan!");

            $this->session->set_flashdata('msg_class', 'alert-success');
            redirect('kaprodi/brgRusakRuangan');
        }
    }


    public function editDataAsetRusak($id)
    {
        $asetData            = $this->Menu_model;
        $dataLokasi          = $this->Menu_model;
        $data['asetData']    = $asetData->getByIdDataAset($id);
        $data['dataLokasi']  = $dataLokasi->getByLokasiRusakLaboran();
        $data['dataProdi']   = $dataLokasi->getByProdiRusakLaboran();
        $data['title']       = 'Edit Data Aset Rusak';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koorprodi/editDataAsetRusak', $data);
        $this->load->view('templates/footer');
    }


    public function newEditDataAsetRusak()
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
        $this->session->set_flashdata('msg', "Data Aset Rusak Ruangan Berhasil Diedit");

        $this->session->set_flashdata('msg_class', 'alert-success');


        redirect('kaprodi/brgRusakRuangan');
    }

    public function deleteDataAsetRusak($id)
    {
        $where = array('kode_aset' => $id);
        $this->Menu_model->delete($where, 'tb_aset');
        $this->session->set_flashdata('msg_hapus', "Data Aset Rusak Ruangan Berhasil Dihapus!");

        $this->session->set_flashdata('msg_class', 'alert-danger');
        redirect('kaprodi/brgRusakRuangan');
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

        $this->form_validation->set_rules('asetkrp', 'Aset', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_tabel', $data);
            $this->load->view('templates/sidebarKaprodi', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('koorprodi/dataPelaporan', $data);
            $this->load->view('templates/footer_tabel');
        } else {

            $data = [
                'id_user'           => $this->session->userdata('username'),
                'tgl_lapor'         => $this->input->post('tanggal'),
                'kode_aset'         => $this->input->post('asetkrp'),
                'deskripsi_laporan' => $this->input->post('editor'),

            ];

            $this->db->insert('tb_pelaporan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pelaporan Berhasil Ditambahkan</div>');
            redirect('kaprodi/data_pelaporan');
        }
    }

    function get_aset()
    {
        $this->load->model('Pelaporan_model');
        $id_lokasi = $this->input->post('id_lokasi');
        $data = $this->Pelaporan_model->aset($id_lokasi);
        echo json_encode($data);
    }



    public function editDataPelaporan($id)
    {
        $pelaporan            = $this->Pelaporan_model;
        $data['pelaporan']    = $pelaporan->getByIdDataPelaporan($id);
        $data['hasil']        = $this->Pelaporan_model->lokasi();
        $data['title']       = 'Edit Data Pelaporan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koorprodi/editDataPelaporan', $data);
        $this->load->view('templates/footer_tabel');
    }

    public function newEditDataPelaporan()
    {
        $id_user   = $this->input->post('id_user');
        $kode_aset   = $this->input->post('asetkrp');
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

        redirect('kaprodi/data_pelaporan');
    }

    public function deletePelaporan($id)
    {
        $where = array('id_laporan' => $id);
        $this->Menu_model->delete($where, 'tb_pelaporan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Pelaporan Berhasil Dihapus</div>');
        redirect('kaprodi/data_pelaporan');
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
        $this->load->view('templates/sidebarKaprodi');
        $this->load->view('templates/topbar', $data);
        $this->load->view('koorprodi/form_pilih_aset_ruangan', $data);
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
        $this->load->view('templates/sidebarKaprodi');
        $this->load->view('templates/topbar', $data);
        $this->load->view('koorprodi/getdataasetruangan', $data);
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
        //'SCRIPT_URI'];
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Aset Ruangan Berhasil Ditambahkan.</div>');
        redirect('Kaprodi/formdataaset?kategori=' . $k . '&subkategori=' . $lokasi . '&submit=Submit');
        //redirect($link);
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
        $this->load->view('templates/sidebarKaprodi', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koorprodi/editDataAsetRuangan', $data);
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
        redirect('Kaprodi/formdataaset?kategori=' . $k . '&subkategori=' . $lokasi . '&submit=Submit');
    }
}
