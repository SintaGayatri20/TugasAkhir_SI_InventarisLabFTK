<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
ini_set('display_errors', 0);

class User extends CI_Controller
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

        if ($role_id != 5) {
            redirect('Tanggapan');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarUser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/user_dosen_mhs', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'MY PROFILE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarUser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/profile_user', $data);
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
            $this->load->view('templates/sidebarUser', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('content/editProfile_user', $data);
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
            redirect('user/profile');
        }
    }


    public function formPeminjamanAlat()
    {

        $data['title'] = 'Form Peminjaman Alat';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['prodi'] = $this->m_kategori->get_prodi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarUser');
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/form_peminjaman_alat', $data);
        $this->load->view('templates/footer');
    }


    public function formPilihAset()
    {
        $id = $this->input->get('subkategori');
        $data['title'] = 'Form Peminjaman Alat';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['aset'] = $this->m_kategori->get_aset($id);
        $data['approval'] = $this->m_kategori->get_approval();
        $data['count'] = $this->m_kategori->get_jumlah_pinjam();
        $data['nba'] = $this->m_kategori->get_no_ba();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarUser');
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/form_pilih_aset', $data);
        $this->load->view('templates/footer');
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
        $data['pinjam'] = $this->m_kategori->get_peminjaman();
        $data['historypinjam'] = $this->m_kategori->get_history_peminjaman();
        $data['historykembali'] = $this->m_kategori->get_history_pengembalian();
        $data['kembali'] = $this->m_kategori->get_pengembalian();
        $data['laboran'] = $this->m_kategori->get_laboran();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarUser');
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/daftar_peminjaman_alat', $data);
        $this->load->view('templates/footer');
    }

    public function savePinjam()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_kategori');
        $kd_aset = $this->input->post('kode_aset');
        $jumlah_pinjam = $this->input->post('jumlah');
        $laboran = $this->input->post('approval');
        $username = $this->session->userdata('username');
        $tanggal_pinjam = date('Y-m-d H:i:s');
        $status = 0;
        $no_ba = $this->input->post('no_ba');
        $keperluan = $this->input->post('keperluan');
        $id_lokasi = $this->input->post('id_lokasi');

        $data = array(
            'id_user' => $username,
            'laboran' => $laboran,
            'kode_aset' => $kd_aset,
            'jumlah' => $jumlah_pinjam,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => '',
            'status' => $status,
            'no_ba' => $no_ba,
            'keperluan' => $keperluan,
            'id_lokasi' => $id_lokasi


        );
        $this->m_kategori->input_data($data, 'tb_peminjaman_aset');
        redirect('user/daftarpeminjamanalat');
        /*echo "Kode Aset".$kd_aset."<br>";
            echo "Jumlah Pinjam".$jumlah_pinjam."<br>";
            echo "No Induk".$no_induk;*/
    }

    public function updatePengembalian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_kembali = date('Y-m-d H:i:s');
        $id_pinjam = $this->input->post('id_pinjam');

        $this->db->query("UPDATE tb_peminjaman_aset SET tanggal_kembali='$tanggal_kembali' WHERE id_peminjaman='$id_pinjam'");
        redirect('user/daftarpeminjamanalat');
    }

    public function updatePeminjaman()
    {
        $evd =  $this->input->post('evidence');

        echo $evd;
    }


    public function formPeminjaman()
    {
        $data['title'] = 'Isi Form Data Peminjaman';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['aset'] = $this->db->get('tb_aset')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarMhs', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentMhs/formDataPeminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function formPeminjamanRuangan()
    {
        $data['title'] = 'Isi Form Data Peminjaman';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['aset'] = $this->db->get('tb_aset')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarUser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentMhs/formPeminjamanRuangan', $data);
        $this->load->view('templates/footer');
    }

    function fetch()
    {
        $this->load->model('Menu_model');
        echo $this->Menu_model->fetch_data($this->uri->segment(3));
    }
    function fetchR()
    {
        $this->load->model('Menu_model');
        echo $this->Menu_model->fetch_dataR($this->uri->segment(3));
    }

    public function pilihAsetPinjam()
    {
        $data['title'] = 'Isi Form Data Peminjaman';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['aset'] = $this->db->get('tb_aset')->result_array();
        $data['katBAP'] = $this->db->get('tb_kat_beritaacr')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarMhs', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentMhs/pilihAsetPinjam', $data);
        $this->load->view('templates/footer');
    }


    public function cetakBAP()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "Cetak Berita Acara Peminjaman"
        );

        $ba = $this->uri->segment(3);
        $st = $this->uri->segment(4);

        if ($st == 'pnj') {
            $ctk = 'cetak_bap';
        } else {
            $ctk = 'cetak_bap_kmb';
        }

        $this->load->model('m_kategori');
        $data['pinjam'] = $this->m_kategori->get_peminjaman_cetak($ba);
        $html = $this->load->view('content/' . $ctk, $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('laporanku.pdf', array("Attachment" => false));
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



    public function insertPeminjamanBarang()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Menu_model');
        $id_beritaacr       = $this->input->post('id_beritaacr');
        $nama_peminjam      = $this->input->post('nama_peminjam');
        $nip_nim            = $this->input->post('nip_nim');
        $tgl_peminjaman     = $this->input->post('tgl_peminjaman');
        $tgl_pengembalian   = $this->input->post('tgl_pengembalian');
        $search_box         = $this->input->post('search_box');
        $editor             = $this->input->post('editor');
        $datecreated        = date('Y-m-d H:i:s');

        $data = array(

            'id_beritaacr'     => $id_beritaacr,
            'nama_peminjam'    => $nama_peminjam,
            'nip_nim'          => $nip_nim,
            'datecreated'      => $datecreated,
            'aset'             => $search_box,
            'tgl_peminjaman'   => $tgl_peminjaman,
            'tgl_pengembalian' => $tgl_pengembalian,
            'ket_keperluan'    => $editor,

        );

        $sql = $this->Menu_model->inputDataPeminjamanBrg($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengisian Data Berita Acara Peminjaan Berhasil Diinputkan</div>');
        redirect('mahasiswa/pilihAsetPinjam/');
    }

    public function insertSuratBebasLabTest()
    {
        $nama           = $this->input->post('nama');
        $nim            = $this->input->post('nim');
        $id_prodi       = $this->input->post('id_prodi');
        $konsentrasi    = $this->input->post('konsentrasi');
        $editor         = $this->input->post('editor');
        $date           = $this->input->post('tanggal');
        $id_bebas_lab   = $this->input->post('id_bebas_lab');

        $data = array(

            'id_bebas_lab' => $id_bebas_lab,
            'id_prodi'      => $id_prodi,
            'nama'          => $nama,
            'nim'           => $nim,
            'konsentrasi'   => $konsentrasi,
            'judul_skripsi' => $editor,
            'date'          => $date

        );

        $this->db->insert('tb_bebas_lab', $data);
        $this->session->set_flashdata('msg', "Pengisian Data Surat Keterangan Bebas Lab Berhasil Diinputkan.");
        $this->session->set_flashdata('msg_class', 'alert-success');
        redirect('user/isidatabl');
    }

    public function isidatabl()
    {
        $data['title'] = 'Isi Data Surat Keterangan Bebas Lab';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['prodi'] = $this->db->get('tb_prodi')->result_array();
        $this->load->model('M_kategori', 'menu');

        $data['dataBl'] = $this->menu->getDataBebasLab();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarUser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('contentMhs/isidataBL', $data);
        $this->load->view('templates/footer_tabel');
    }

    public function insertSuratBebasLab()
    {


        $this->form_validation->set_rules('konsentrasi', 'Konsentrasi', 'required');
        if ($this->form_validation->run() == false) {

            $nama           = $this->input->post('nama');
            $nim            = $this->input->post('nim');
            $id_prodi       = $this->input->post('id_prodi');
            $konsentrasi    = $this->input->post('konsentrasi');
            $editor         = $this->input->post('editor');
            $date           = $this->input->post('date   ');
            $id_bebas_lab   = $this->input->post('id_bebas_lab');

            $data = array(

                'id_bebas_lab' => $id_bebas_lab,
                'id_prodi'      => $id_prodi,
                'nama'          => $nama,
                'nim'           => $nim,
                'konsentrasi'   => $konsentrasi,
                'judul_skripsi' => $editor,
                'date'          => $date

            );
        }

        // $this->db->set($data);
        // $this->db->insert($this->db->db_silabftk . 'tb_bebas_lab');

        $this->db->insert('tb_bebas_lab', $data);
        $this->session->set_flashdata('msg', "Pengisian Data Surat Keterangan Bebas Lab Berhasil Diinputkan.");

        $this->session->set_flashdata('msg_class', 'alert-success');
        redirect('user/isidatabl');
    }

    public function deleteData($id)
    {
        $where = array('id_bebas_lab' => $id);
        $this->Menu_model->delete($where, 'tb_bebas_lab');
        redirect('user/isidatabl');
    }
}
