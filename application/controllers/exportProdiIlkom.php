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
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'LOKASI');
        $sheet->setCellValue('C1', 'PRODI');
        $sheet->setCellValue('D1', 'NAMA BARANG');
        $sheet->setCellValue('E1', 'SPESIFIKASI');
        $sheet->setCellValue('F1', 'JUMLAH');
        $sheet->setCellValue('G1', 'SATUAN');
        $sheet->setCellValue('H1', 'KETERANGAN');
        $sheet->setCellValue('I1', 'FOTO');

        $dataaset = $this->Menu_model->getDataAsetMi2();
        $no = 1;
        $x = 2;
        foreach ($dataaset as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->nama_lab);
            $sheet->setCellValue('C' . $x, $row->nama_prodi);
            $sheet->setCellValue('D' . $x, $row->nama_barang);
            $sheet->setCellValue('E' . $x, $row->spesifikasi);
            $sheet->setCellValue('F' . $x, $row->jumlah);
            $sheet->setCellValue('G' . $x, $row->satuan);
            $sheet->setCellValue('H' . $x, $row->keterangan);
            $sheet->setCellValue('I' . $x, $row->foto);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Aset-ProdiMI';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        // include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        // $excel = new PHPExcel();
        // $excel->getProperties()->setCreator('My Notes Code')
        //     ->setLastModifiedBy('My Notes Code')
        //     ->setTitle("Data Aset Prodi MI")->setSubject("Siswa")
        //     ->setDescription("Laporan Data Aset MI")
        //     ->setKeywords("Data Aset MI");
        // $style_col = array(
        //     'font' => array('bold' => true),
        //     'alignment' => array(
        //         'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        //         'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        //     ),
        //     'borders' => array(
        //         'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        //         'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        //         'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        //         'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
        //     )
        // );

        // $style_row = array(
        //     'alignment' => array(
        //         'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        //     ),
        //     'borders' => array(
        //         'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        //         'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        //         'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        //         'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
        //     )
        // );

        // $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA ASET PRODI ILKOM");
        // $excel->getActiveSheet()->mergeCells('A1:I1');
        // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);

        // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
        // $excel->setActiveSheetIndex(0)->setCellValue('B3', "LOKASI");
        // $excel->setActiveSheetIndex(0)->setCellValue('C3', "PRODI");
        // $excel->setActiveSheetIndex(0)->setCellValue('D3', "NAMA BARANG");
        // $excel->setActiveSheetIndex(0)->setCellValue('E3', "SPESIFIKASI");
        // $excel->setActiveSheetIndex(0)->setCellValue('F3', "JUMLAH");
        // $excel->setActiveSheetIndex(0)->setCellValue('G3', "SATUAN");
        // $excel->setActiveSheetIndex(0)->setCellValue('H3', "KETERANGAN");
        // $excel->setActiveSheetIndex(0)->setCellValue('I3', "FOTO");

        // $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);

        // $dataaset = $this->Menu_model->getDataAsetMi2();

        // $no = 1;
        // $numrow = 4;

        // foreach ($dataaset as $ds) {
        //     $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
        //     $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $ds->nama_lab);
        //     $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $ds->nama_prodi);
        //     $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $ds->nama_barang);
        //     $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $ds->spesifikasi);
        //     $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $ds->jumlah);
        //     $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $ds->satuan);
        //     $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $ds->keterangan);
        //     $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $ds->foto);


        //     $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
        //     $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
        //     $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
        //     $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
        //     $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
        //     $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
        //     $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
        //     $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
        //     $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);

        //     $no++;
        //     $numrow++;
        // }

        // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        // $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        // $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        // $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        // $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        // $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

        // $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // $excel->getActiveSheet(0)->setTitle("Laporan Data Aset MI");
        // $excel->setActiveSheetIndex(0);

        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="Data Aset MI.xlsx"');
        // header('Cache-Control: max-age=0');

        // $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        // $write->save('php://output');
    }
}
