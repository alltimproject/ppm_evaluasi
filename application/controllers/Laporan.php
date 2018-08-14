<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');
    $this->load->model('m_master');
    $this->load->library('pdf');
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

    $pdf = new FPDF('p','mm','A4');
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

      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(10,14,'No',1,0,'C');
      $pdf->Cell(50,14,'Aspek',1,0,'C');
      $pdf->Cell(90,7,'Penilaian',1,0,'C');

      $pdf->Cell(20,14,'Rate',1,0,'C');
      $pdf->Cell(15,14,'%',1,0,'C');

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
