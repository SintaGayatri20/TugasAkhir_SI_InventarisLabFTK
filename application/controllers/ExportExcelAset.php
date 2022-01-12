<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportExcelAset extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
    }

    public function excel_asetMI()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI MANAJEMEN INFORMATIKA';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetMI();

        $this->load->view('excel/exportProdiMI', $data);
    }


    public function excel_asetilkom()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI ILMU KOMPUTER';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetILKOM();

        $this->load->view('excel/exportProdiIlkom', $data);
    }
    public function excel_asetPTI()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI PENDIDIKAN TEKNIK INFORMATIKA';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPTI();

        $this->load->view('excel/exportProdiPTI', $data);
    }
    public function excel_asetSI()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI SISTEM INFORMASI';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPTI();

        $this->load->view('excel/exportProdiSI', $data);
    }
    public function excel_asetPTM()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI PENDIDIKAN TEKNIK MESIN';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPTM();

        $this->load->view('excel/exportProdiPTM', $data);
    }
    public function excel_asetPKK()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI PENDIDIKAN KESEJAHTERAAN KELUARGA';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPKK();

        $this->load->view('excel/exportProdiPKK', $data);
    }
    public function excel_asetTE()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI TEKNIK ELEKTRO';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetTE();

        $this->load->view('excel/exportProdiTE', $data);
    }
    public function excel_asetPTE()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI PENDIDIKAN TEKNIK ELEKTRO';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPTE();

        $this->load->view('excel/exportProdiPTE', $data);
    }
    public function excel_asetPVSK()
    {
        $data['title'] = 'DATA ASET PROGRAM STUDI PENDIDIKAN VOKASIONAL SENI KULINER';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetPVSK();

        $this->load->view('excel/exportProdiPVSK', $data);
    }
    public function excel_aset()
    {
        $data['title'] = 'DATA ASET LAB FAKULTAS TEKNIK DAN KEJURUAN';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetexcel();

        $this->load->view('excel/exportAset', $data);
    }
    public function excel_aset_prodi()
    {
        $data['title'] = 'DATA ASET LAB FAKULTAS TEKNIK DAN KEJURUAN';
        $this->load->model('Menu_model', 'menu');

        $data['dataAset'] = $this->menu->getDataAsetexcelProdi();

        $this->load->view('excel/exportAset', $data);
    }
}
