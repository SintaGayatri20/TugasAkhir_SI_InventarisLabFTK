<?php
defined('BASEPATH') or exit('No direct script access allowed');

error_reporting(0);
ini_set('display_errors', 0);

class Koorlab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';

        /*$link_awal = $this->uri->segment(1);
        $data1 = [
            'link_awl'  => $link_awal
        ];
        $this->session->set_userdata($data1);*/

        $role_id = $this->session->userdata('role_id');
        $username = $this->session->userdata('username');
        if ($username == '') {
            redirect('login');
        }


        if ($role_id != 6) {
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
        $this->load->view('templates/sidebarKoorlab', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('content/dashboardKoorlab', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'MY PROFILE';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKoorlab', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/profile_koorlab', $data);
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
            $this->load->view('templates/sidebarKoorlab', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laboranContent/editProfile_koorlab', $data);
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
            redirect('koorlab/profile');
        }
    }

    public function barangHabisPakai()
    {
        $id = $this->input->post('subkategori');
        $data['title'] = 'Data Permohonan Barang Habis Pakai';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['databhp'] = $this->m_kategori->get_bhp_koorlab_data();
        $data['show'] = $this->m_kategori->tanggapanKoorlab($id);
        // $data['approval'] = $this->m_kategori->get_approval();
        // $data['count'] = $this->m_kategori->get_jumlah_pinjam();
        $data['nba'] = $this->m_kategori->get_no_ba();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKoorlab', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/koorlabBHP', $data);
        $this->load->view('templates/footer');
    }

    public function deleteBHP($id)
    {
        $where = array('id_detail_bhp' => $id);
        $this->Menu_model->delete($where, 'tb_detail_bhp');
        $this->session->set_flashdata('msg', "Data Permohonan Bahan Habis Pakai berhasil dihapus ");
        $this->session->set_flashdata('msg_class', 'alert-success');
        redirect('koorlab/barangHabisPakai');
    }

    public function perbaikanAsetRusak()
    {

        $data['title'] = 'Data Permohonan Perbaikan Sarana dan Prasarana Aset Rusak';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['dataAsr'] = $this->m_kategori->get_asr();
        $data['nba'] = $this->m_kategori->get_no_ba();

        $this->load->view('templates/header_tabel', $data);
        $this->load->view('templates/sidebarKoorlab', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/perbaikanAsetRusak', $data);
        $this->load->view('templates/footer_tabel');
    }

    public function cetakSuratAsetRusak()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "Cetak Surat Permohonan Aset Rusak"
        );

        $ba = $this->uri->segment(3);
        $st = $this->uri->segment(4);

        $st == 'pnj';
        $ctk = 'cetak_suratAsetRusak';



        $this->load->model('m_kategori');
        $data['asetrusak'] = $this->m_kategori->get_surket_asetrusak($ba);
        $data['noba'] = $this->m_kategori->get_no_ba();
        $data['nba'] = $this->m_kategori->get_no_ba();
        $data['count'] = $this->m_kategori->get_jumlah_asetrusak();
        $data['role_id'] = $this->m_kategori->get_kaprod();
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $html = $this->load->view('laboranContent/' . $ctk, $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('laporanku.pdf', array("Attachment" => false));
    }

    public function perbaikanAset()
    {
        # code...
        $data['title'] = 'Form Permohonan Perbaikan Sarana dan Prasarana';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='$username'")->row_array();
        $this->load->model('m_kategori');
        $data['prodi'] = $this->m_kategori->get_prodi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKoorlab');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/form_bhp_koorlab', $data);
        $this->load->view('templates/footer');
    }



    public function cetakBHP()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "Cetak Surat Permohonan Surat Habis Pakai"
        );

        /*$ba = $this->uri->segment(3);
        $st = $this->uri->segment(4);

        $st == 'pnj';
        $ctk = 'cetak_bhp';
        */



        //$this->load->model('m_kategori');
        //$data['pinjam'] = $this->m_kategori->get_BHP_cetak();
        //$html = $this->load->view('laboranContent/' . $ctk, $data, true);
        $html = $this->load->view('laboranContent/cetak_bhp', true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('laporanku.pdf', array("Attachment" => false));
    }


    public function cetakBHPS()
    {
        $dompdf = new Dompdf();



        $data = array(
            "nama" => "SILAB FTK",
            "title" => "Cetak Surat Permohonan Surat Habis Pakai"
        );

        $this->load->model('m_kategori');
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['bhp'] = $this->m_kategori->get_BHP_cetak();
        $data['klb'] = $this->m_kategori->getKalab();
        $html = $this->load->view('laboranContent/cetak_bhp', $data, true);

        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('laporankus.pdf', array("Attachment" => false));
        //$this->load->view('laboranContent/cetak_bhp');
    }

    public function tanggapan()
    {
        $dataPelaporan      = $this->Pelaporan_model;
        $data['title']      = 'Beri Tanggapan';
        $data['user'] = $this->db->get_where('tb_personel_ftk', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarKoorlab', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laboranContent/formTanggapanKoorlab', $data);
        $this->load->view('templates/footer');
    }

    public function saveTanggapan()
    {

        $id_detail_bhp = $this->input->post('id_detail_bhp');
        $id_lokasi = $this->input->post('id_lokasi');
        $editor = $this->input->post('editor');
        $data = array(
            'tanggapan' => $editor
        );
        //$where = array('id_detail_bhp' => $id_detail_bhp);
        //$this->db->update('tb_detail_bhp', $data);

        $this->db->where('id_detail_bhp', $id_detail_bhp);
        $this->db->update('tb_detail_bhp', $data);


        $this->session->set_flashdata('msg', "Data Permohonan Bahan Habis Pakai Berhasil Ditanggapi.");
        $this->session->set_flashdata('msg_class', 'alert-success');

        redirect('Koorlab/barangHabisPakai/id/' . $id_detail_bhp . '/' . $id_lokasi);
    }

    public function deleteDataBHP($id)
    {
        $where = array('id_detail_bhp' => $id);
        $this->Menu_model->delete($where, 'tb_detail_bhp');
        redirect('koorlab/barangHabisPakai');
    }

    public function deleteDataAsetRusak($id)
    {
        $where = array('id_brg_rusak' => $id);
        $this->Menu_model->delete($where, 'tb_brg_rusak');
        $this->session->set_flashdata('msg_hapus', "Data Permohonan Aset Rusak Ruangan Berhasil Dihapus!");

        $this->session->set_flashdata('msg_class', 'alert-danger');
        redirect('koorlab/perbaikanAsetRusak');
    }
}
