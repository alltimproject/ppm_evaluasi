<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');
    $this->load->model('m_master');
    $this->load->library('pdf');
    $this->load->library('MC_TABLE');
  }

  function export_subyek()
  {
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');
    $pdf = $this->input->post('pdf');
    $excel = $this->input->post('excel');

    $between = "tgl_mulai BETWEEN '$tgl_awal' AND '$tgl_akhir'";

    if(isset($pdf))
    {
      $data = $this->m_master->show_pelatihan(null, null, $between)->result();
      $pdf = new FPDF('p','mm','A4');
      $pdf->AddPage();

      $pdf->Image('images/index.png',150,10,50,10);
      $pdf->ln(20);

      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(80);
      $pdf->Cell(30,5,'Laporan Evaluasi',0,1,'C');
      $pdf->ln(10);

			$pdf->SetFont('Arial','',10);
			$pdf->Cell(30,7,'Divisi',0,0);
			$pdf->Cell(50,7,': Pemasaran',0,0);
			$pdf->ln(5);
			$pdf->Cell(30,7,'Admin',0,0);
			$pdf->Cell(50,7,': '.$this->session->userdata('nama'),0,0);
			$pdf->ln(5);
			$pdf->Cell(30,7,'Periode',0,0);
			$pdf->Cell(50,7,': '.date('d M Y', strtotime($tgl_awal)).' s/d '.date('d M Y', strtotime($tgl_akhir)),0,0);
      $pdf->ln(15);

      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(10,7,'No',1,0,'C');
      $pdf->Cell(80,7,'Nama Pelatihan',1,0,'C');
      $pdf->Cell(50,7,'Tanggal',1,0,'C');
      $pdf->Cell(30,7,'Jumlah Peserta',1,0,'C');
      $pdf->Cell(20,7,'Ruangan',1,0,'C');

      $pdf->SetFont('Arial','',8);
      $no = 1;
      foreach ($data as $key) {
        $pdf->ln();
        $pdf->Cell(10,7,$no++,1,0,'C');
        $pdf->Cell(80,7,$key->deskripsi_subyek,1,0);
        $pdf->Cell(50,7,date('d M Y', strtotime($key->tgl_mulai)).' s/d '.date('d M Y', strtotime($key->tgl_selesai)),1,0,'C');
        $pdf->Cell(30,7,$key->jml_peserta,1,0,'C');
        $pdf->Cell(20,7,$key->kelas,1,0,'C');
    }

      $pdf->Output();
    } elseif(isset($excel))
    {
      $data['tgl_awal'] = $tgl_awal;
      $data['tgl_akhir'] = $tgl_akhir;
      $data['pelatihan'] = $this->m_master->show_pelatihan(null, null, $between)->result();
      $this->load->view('laporan/excel_subyek', $data);
    }
  }

  function detail_pdf($id_sesi)
  {
    $where = array(
      'a.id_sesi' => $id_sesi
    );

    $data = $this->m_master->show_penilaian($where)->result();
    $komentar = $this->m_master->show_komentar($where)->result();

    $pdf = new MC_TABLE('p','mm','A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(80, 7, 'PROGRAM PENGEMBANGAN EKSEKUTIF', 0, 0);
    $pdf->Image('images/index.png',150,10,50,10);
    $pdf->ln();
    $pdf->Cell(80, 7, 'EVALUASI AKHIR', 0, 0);
    $pdf->ln(10);

    foreach($data as $key){
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(30,7,'Judul Subyek',0,0);
      $pdf->Cell(50,7,': '.$key->deskripsi_subyek,0,0);
      $pdf->ln(5);
      $pdf->Cell(30,7,'Tanggal',0,0);
      $pdf->Cell(50,7,': '.date('d M Y', strtotime($key->tgl_mulai)).' - '.date('d M Y', strtotime($key->tgl_selesai)),0,0);
      $pdf->ln(5);
      $pdf->Cell(30,7,'Dosen',0,0);
      $pdf->Cell(50,7,': '.$key->nama,0,0);
      $pdf->ln(5);
      $pdf->Cell(30,7,'Kelas',0,0);
      $pdf->Cell(50,7,': '.$key->kelas,0,0);
      $pdf->Cell(50);
      $pdf->Cell(40,7,'Jumlah Peserta',0,0);
      $pdf->Cell(50,7,': '.$key->jml_peserta,0,0);
      $pdf->ln(5);
      $pdf->Cell(30,7,'Sesi',0,0);
      $pdf->Cell(50,7,': '.$key->deskripsi_sesi,0,0);
      $pdf->Cell(50);
      $pdf->Cell(40,7,'Jumlah Responden',0,0);
      $pdf->Cell(50,7,': '.$key->jml_responden,0,0);
      $pdf->ln(15);

      $pdf->cell(10.0,25.7,'No',1,0,'C');
      $pdf->cell(45.0,25.7,'Aspek',1,0,'C');
      // $posisi_2 = $pdf->GetX();
      // $pdf->cell(85.0,10.4,'Penilaian',1,0,'C');



      $posisi_x = $pdf->GetX();
      $pdf->cell(99.4,20.4,'Penilaian',1,0,'C');

    //  $posisi_5 = $pdf->GetX();
      $pdf->cell(23.5,25.7,'Rata Rata',1,0,'C');
      $pdf->cell(20.5,25.7,'%',1,0,'C');
      $pdf->cell(20.5,20.5,'',0,1,'C');

      $pdf->setX($posisi_x);
      //$posisi_2 = $pdf->GetX();
      $pdf->SetFont('Arial','B',8);
      $pdf->cell(20.0,5.4,'sangat setuju',1,0,'C');
      $pdf->cell(15.0,5.4,'setuju',1,0,'C');
      $pdf->cell(15.0,5.4,'netral',1,0,'C');
      $pdf->cell(22.0,5.4,'tidak setuju',1,0,'C');
      $pdf->cell(27.3,5.4,'sangat tidak setuju',1,1,'C');

      $pdf->SetWidths(array(10.0,45.0,20.0,15.0,15.0,22.0,27.3,23.7,20.5));
        $pdf->Row(array(
                    array('1'),
                    array('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
                    array('SHJSH'),
                    array('SKJSK'),
                    array('SKJSKJS'),
                    array('SHSJS'),
                    array('SJHSJ'),
                    array('SHJSHS'),
                    array('SJHSJ')

        ));

        $pdf->Row(array(
                    array('1'),
                    array('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
                    array('SHJSH'),
                    array('SKJSK'),
                    array('SKJSKJS'),
                    array('SHSJS'),
                    array('SJHSJ'),
                    array('SHJSHS'),
                    array('SJHSJ')

        ));

        $pdf->Row(array(
                    array('1'),
                    array('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
                    array('SHJSH'),
                    array('SKJSK'),
                    array('SKJSKJS'),
                    array('SHSJS'),
                    array('SJHSJ'),
                    array('SHJSHS'),
                    array('SJHSJ')

        ));


      // $pdf->setX($posisi_5);
      // $pdf->cell(23.5,5.4,'','LR',0,'C');
      // $pdf->cell(20.5,5.4,'','LR',1,'C');



    //   $posisi_x = $pdf->GetX();
    // $pdf->cell(224.2,3.5,'Spesifikasi Komputer',1,0,'C');
    //
    // $pdf->cell(23.5,3.5,'Tanda Tangan',1,1,'C',1);
    //
    // $pdf->setX($posisi_x);
    // $posisi_2 = $pdf->GetX();
    // $pdf->cell(80.0,5.4,'CPU',1,0,'C');
    // $posisi_monitor = $pdf->GetX();
    // $pdf->cell(20.4,5.4,'Monitor',1,0,'C');
    // $posisi_printer = $pdf->GetX();
    // $pdf->cell(65.3,5.4,'Printer',1,0,'C');
    // $posisi_scanner = $pdf->GetX();
    // $pdf->cell(58.6,5.4,'Scanner',1,0,'C');
    //
    // $posisi_ttd = $pdf->GetX();
    // $pdf->cell(23.5,5.4,'User','LR',1,'C');
    //
    // $pdf->setFillColor(230, 242, 85);
    // $pdf->setX($posisi_2);
    // $pdf->Cell(22.5, 6.8, 'Type/Merk', 1, 0, 'C');
    // $pdf->Cell(25.7, 6.8, 'Inventaris', 1, 0, 'C');
    // $pdf->Cell(10.9, 6.8, 'Thn', 1, 0, 'C');
    // $pdf->Cell(10.9, 6.8, 'Ram', 1, 0, 'C');
    // $pdf->Cell(10.9, 6.8, 'HDD', 1, 0, 'C');
    //
    // $pdf->setX($posisi_monitor);
    // $pdf->Cell(20.4, 6.8, 'Type/Merk', 1, 0, 'C',1);
    // //$pdf->Cell(2.7, 0.8, 'Inventaris', 1, 0, 'C');
    // //$pdf->Cell(0.9, 0.8, 'Thn', 1, 0, 'C');
    //
    // //printer
    // $pdf->setX($posisi_printer);
    // $pdf->Cell(30.7, 6.8, 'Type/Merk', 1, 0, 'C',1);
    // $pdf->Cell(25.7, 6.8, 'Inventaris', 1, 0, 'C',1);
    // $pdf->Cell(9.9, 6.8, 'Thn', 1, 0, 'C',1);
    //
    // //scanner
    // $pdf->setX($posisi_scanner);
    // $pdf->Cell(22.0, 6.8, 'Type/Merk', 1, 0, 'C',1);
    // $pdf->Cell(25.7, 6.8, 'Inventaris', 1, 0, 'C',1);
    // $pdf->Cell(10.9, 6.8, 'Thn', 1, 0, 'C',1);
    //
    // $pdf->setX($posisi_ttd);
    // $pdf->cell(23.5,6.8,' ',1,1,'C', 1);
    // $pdf->SetFont('Arial','B',7);


    // $pdf->setFillColor(230, 242, 85);
    // $pdf->setX($posisi_2);
    // $pdf->Cell(22.5, 6.8, 'Type/Merk', 1, 0, 'C',1);
    // $pdf->Cell(25.7, 6.8, 'Inventaris', 1, 0, 'C',1);
    // $pdf->Cell(10.9, 6.8, 'Thn', 1, 0, 'C',1);
    // $pdf->Cell(10.9, 6.8, 'Ram', 1, 0, 'C',1);
    // $pdf->Cell(10.9, 6.8, 'HDD', 1, 0, 'C',1);



      // $pdf->setX($posisi_2);
      // $posisi_3 = $pdf->GetX();
      // $pdf->Cell(30.5, 6.8, 'Type/Merk', 1, 0, 'C');
      //
      // $pdf->setX($posisi_3);
      // $pdf->Cell(30.5, 6.8, 'Type/Merk', 1, 0, 'C');

      // $pdf->setFillColor(230, 242, 85);
      // $pdf->setX($posisi_2);
      // $pdf->Cell(22.5, 20.4, 'sangat setuju', 1, 0, 'C',1);
      // $pdf->Cell(25.7, 6.8, 'setuju', 1, 0, 'C',1);
      // $pdf->Cell(10.9, 6.8, 'netral', 1, 0, 'C',1);
      // $pdf->Cell(10.9, 6.8, 'tidak setuju', 1, 0, 'C',1);
      // $pdf->Cell(10.9, 6.8, 'sangat tidak setuju', 1, 0, 'C',1);

    }

    $pdf->Output();

  }

  function detail_excel($id_sesi)
  {
    $where = array(
      'a.id_sesi' => $id_sesi
    );

    $data['penilaian'] = $this->m_master->show_penilaian($where)->result();
    $data['komentar'] = $this->m_master->show_komentar($where)->result();

    $this->load->view('laporan/excel_evaluasi', $data);
  }

}
