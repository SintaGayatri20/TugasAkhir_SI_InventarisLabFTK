<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
ini_set('display_errors', 0);

class Cetakbap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
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
}
