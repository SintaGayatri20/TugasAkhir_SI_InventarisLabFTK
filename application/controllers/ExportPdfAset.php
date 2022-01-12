<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require __DIR__ . '/vendor/autoload.php';
error_reporting(0);
ini_set('display_errors', 0);


class ExportPdfAset extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
    }

    public function pdf_asetmi()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabMIilkom();
        $html = $this->load->view('pdf/pdfAsetMiilkom', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_MI.pdf', array("Attachment" => false));
    }
    public function pdf_labIlkom()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabIlkom();
        $html = $this->load->view('pdf/pdfAsetIlkom', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_ILKOM.pdf', array("Attachment" => false));
    }
    public function pdf_asetPTI()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabPTI();
        $html = $this->load->view('pdf/pdfAsetPTI', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_PTI.pdf', array("Attachment" => false));
    }
    public function pdf_aseetSI()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabSI();
        $html = $this->load->view('pdf/pdfAsetSI', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_SI.pdf', array("Attachment" => false));
    }
    public function pdf_manufakturPTM()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabManufakturPTM();
        $html = $this->load->view('pdf/pdfdataLabManufakturPTM', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_manufakturPTM.pdf', array("Attachment" => false));
    }
    public function pdf_labOtomotifPTM()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabOtomotifPTM();
        $html = $this->load->view('pdf/pdf_labOtomotifPTM', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_OtomotifPTM.pdf', array("Attachment" => false));
    }
    public function pdf_asetLabPendinginPTM()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetPendinginPTM();
        $html = $this->load->view('pdf/pdf_asetLabPendinginPTM', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_PendinginPTM.pdf', array("Attachment" => false));
    }
    public function pdf_labrobotika()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabRobotika();
        $html = $this->load->view('pdf/pdf_asetLabRobotika', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_Robotika.pdf', array("Attachment" => false));
    }
    public function pdf_asetLabTenagaListrik()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabTenagaListrik();
        $html = $this->load->view('pdf/pdf_asetLabTenagaListrik', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_TenagaListrik.pdf', array("Attachment" => false));
    }
    public function pdf_asetLabKomputer()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabKomputer();
        $html = $this->load->view('pdf/pdf_asetLabKomputer', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_lab_Komputer.pdf', array("Attachment" => false));
    }
    public function pdf_asetTenagaListrik()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabBengkel();
        $html = $this->load->view('pdf/pdf_asetLabBengkel', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_LabBengkel.pdf', array("Attachment" => false));
    }
    public function pdf_asetRuangLaboran()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabLaboran();
        $html = $this->load->view('pdf/pdf_asetRuangLaboran', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_RuangLaboran.pdf', array("Attachment" => false));
    }
    public function pdf_ruangTataCahaya()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabTataCahaya();
        $html = $this->load->view('pdf/pdf_ruangTataCahaya', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_ruangTataCahaya.pdf', array("Attachment" => false));
    }
    public function pdf_asetlabMultimedia()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabMultimedia();
        $html = $this->load->view('pdf/pdf_asetlabMultimedia', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetlabMultimedia.pdf', array("Attachment" => false));
    }
    public function pdf_asetRuangProdiPTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabRuangProdiPTE();
        $html = $this->load->view('pdf/pdf_asetRuangProdiPTE', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetRuangProdiPTE.pdf', array("Attachment" => false));
    }
    public function pdf_asetLabWorkshop1()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabWorkshop1();
        $html = $this->load->view('pdf/pdf_asetLabWorkshop1', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetLabWorkshop1.pdf', array("Attachment" => false));
    }
    public function pdf_asetLabWorkshop2()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabWorkshop2();
        $html = $this->load->view('pdf/pdf_asetLabWorkshop2', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetLabWorkshop2.pdf', array("Attachment" => false));
    }
    public function pdf_asetlab1()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabLab1();
        $html = $this->load->view('pdf/pdf_asetlab1', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetlab1.pdf', array("Attachment" => false));
    }

    public function pdf_instalasiPTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabInstalasiPTE();
        $html = $this->load->view('pdf/pdf_instalasiPTE', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_instalasiPTE.pdf', array("Attachment" => false));
    }
    public function pdf_asetPengukuranPTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabPengukuranPTE();
        $html = $this->load->view('pdf/pdf_asetPengukuranPTE', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetPengukuranPTE.pdf', array("Attachment" => false));
    }
    public function pdf_dataLabELDA()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabElda();
        $html = $this->load->view('pdf/pdf_dataLabELDA', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_dataLabELDA.pdf', array("Attachment" => false));
    }
    public function pdf_dataLabRL()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabRL();
        $html = $this->load->view('pdf/pdf_dataLabRL', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_dataLabRL.pdf', array("Attachment" => false));
    }
    public function pdf_asetLabElektronikaPTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabElektonikaPTE();
        $html = $this->load->view('pdf/pdf_asetLabElektronikaPTE', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetLabElektronikaPTE.pdf', array("Attachment" => false));
    }
    public function pdf_dataLabMesinPTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabMesinPTE();
        $html = $this->load->view('pdf/pdf_dataLabMesinPTE', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetLabMesinPTE.pdf', array("Attachment" => false));
    }
    public function pdf_dataWorkshopPTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabWorkshopPTE();
        $html = $this->load->view('pdf/pdf_dataWorkshopPTE', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetWorkshopPTE.pdf', array("Attachment" => false));
    }
    public function pdf_dataLabPendinginPTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabPendinginPTE();
        $html = $this->load->view('pdf/pdf_asetLabPendinginPTE', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetLabPendinginPTE.pdf', array("Attachment" => false));
    }
    public function pdf_asetLabBusanaPKK()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabPKK();
        $html = $this->load->view('pdf/pdf_asetLabBusanaPKK', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetLabBusanaPKK.pdf', array("Attachment" => false));
    }
    public function pdf_labBogaPKK()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabBogaPKK();
        $html = $this->load->view('pdf/pdf_labBogaPKK', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetlabBogaPKK.pdf', array("Attachment" => false));
    }
    public function pdf_labKePaPKK()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DAFTAR INVENTARIS LAB"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetLabKecantikanaPKK();
        $html = $this->load->view('pdf/pdf_labKePaPKK', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetlabKePaPKK.pdf', array("Attachment" => false));
    }
    public function pdf_asetMii()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PROGRAM STUDI MANAJEMEN INFORMATIKA"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetMI();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiMi.pdf', array("Attachment" => false));
    }
    public function pdf_asetilkom()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PROGRAM STUDI ILMU KOMPUTER"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetILKOM();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiIlkom.pdf', array("Attachment" => false));
    }
    public function pdf_asetPKK()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PROGRAM STUDI PENDIDIKAN KESEJAHTERAAN KELUARGA"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetPKK();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiPKK.pdf', array("Attachment" => false));
    }
    public function pdf_asetPTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PRODI PTE"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetPTE();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiPTE.pdf', array("Attachment" => false));
    }
    public function pdf_asetPTII()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PROGRAM STUDI PENDIDIKAN TEKNIK INFORMATIKA"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetPTI();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiPTI.pdf', array("Attachment" => false));
    }
    public function pdf_asetPTM()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PROGRAM STUDI PENDIDIKAN TEKNIK INFORMATIKA"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetPTM();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiPTI.pdf', array("Attachment" => false));
    }

    public function pdf_asetPVSK()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PROGRAM STUDI PENDIDIKAN PVSK"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetPVSK();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiPVSK.pdf', array("Attachment" => false));
    }
    public function pdf_asetSI()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PROGRAM STUDI SISTEM INFORMASI"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetSI();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiPVSK.pdf', array("Attachment" => false));
    }
    public function pdf_asetTE()
    {
        $dompdf = new Dompdf();

        $data = array(
            "nama" => "SILAB FTK",
            "title" => "DATA ASET PROGRAM STUDI TEKNIK ELEKTRO"
        );



        $this->load->model('Menu_model', 'menu');
        $data['dataAset'] = $this->menu->getDataAsetTE();
        $html = $this->load->view('pdf/pdf_asetProdi', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        //Output the generated PDF to Browser
        $dompdf->stream('data_asetProdiTE.pdf', array("Attachment" => false));
    }
}
