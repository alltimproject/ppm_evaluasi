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
      $pdf->Cell(30,5,'Laporan Pelatihan',0,1,'C');
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

      // $pdf->cell(5.0,25.7,'No',1,0,'C');
      $pdf->cell(35.0,25.7,'Aspek',1,0,'C');



      $posisi_x = $pdf->GetX();
      $pdf->cell(140,20.4,'Penilaian',1,0,'C');

      $pdf->cell(10.0,25.7,'Rate',1,0,'C');
      $pdf->cell(10.0,25.7,'%',1,0,'C');
      $pdf->cell(20.5,20.5,'',0,1,'C');

      $pdf->setX($posisi_x);
      $pdf->SetFont('Arial','B',8);
      $pdf->cell(28.0,5.4,'Sangat Setuju',1,0,'C');
      $pdf->cell(28.0,5.4,'Setuju',1,0,'C');
      $pdf->cell(28.0,5.4,'Netral',1,0,'C');
      $pdf->cell(28.0,5.4,'Tidak Setuju',1,0,'C');
      $pdf->cell(28.0,5.4,'Sangat Tidak Setuju',1,1,'C');

      $pdf->SetWidths(array(35.0,14.0,14.0,14.0,14.0,14.0,14.0,14.0,14.0,14.0,14.0,10.0,10.0));
        $pdf->Row(array(
                    // array('1', 'C'),
                    array('Pelatihan ini bermanfaat bagi saya'),
                    array($key->aspek1_1, 'C'),
                    array(round(($key->aspek1_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek1_2, 'C'),
                    array(round(($key->aspek1_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek1_3, 'C'),
                    array(round(($key->aspek1_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek1_4, 'C'),
                    array(round(($key->aspek1_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek1_5, 'C'),
                    array(round(($key->aspek1_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek1_1*5)+($key->aspek1_2*4)+($key->aspek1_3*3)+($key->aspek1_4*2)+($key->aspek1_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('2', 'C'),
                    array('Instruktur menyampaikan materi dengan jelas'),
                    array($key->aspek2_1, 'C'),
                    array(round(($key->aspek2_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek2_2, 'C'),
                    array(round(($key->aspek2_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek2_3, 'C'),
                    array(round(($key->aspek2_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek2_4, 'C'),
                    array(round(($key->aspek2_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek2_5, 'C'),
                    array(round(($key->aspek2_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek2_1*5)+($key->aspek2_2*4)+($key->aspek2_3*3)+($key->aspek2_4*2)+($key->aspek2_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('3', 'C'),
                    array('Metode Pengajaran yang digunakan Menarik'),
                    array($key->aspek3_1, 'C'),
                    array(round(($key->aspek3_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek3_2, 'C'),
                    array(round(($key->aspek3_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek3_3, 'C'),
                    array(round(($key->aspek3_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek3_4, 'C'),
                    array(round(($key->aspek3_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek3_5, 'C'),
                    array(round(($key->aspek3_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek3_1*5)+($key->aspek3_2*4)+($key->aspek3_3*3)+($key->aspek3_4*2)+($key->aspek3_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('4', 'C'),
                    array('Kombinasi teori dan latihan seimbang'),
                    array($key->aspek4_1, 'C'),
                    array(round(($key->aspek4_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek4_2, 'C'),
                    array(round(($key->aspek4_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek4_3, 'C'),
                    array(round(($key->aspek4_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek4_4, 'C'),
                    array(round(($key->aspek4_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek4_5, 'C'),
                    array(round(($key->aspek4_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek4_1*5)+($key->aspek4_2*4)+($key->aspek4_3*3)+($key->aspek4_4*2)+($key->aspek4_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('5', 'C'),
                    array('Jumlah subyek sesuai dengan kebutuhan'),
                    array($key->aspek5_1, 'C'),
                    array(round(($key->aspek5_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek5_2, 'C'),
                    array(round(($key->aspek5_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek5_3, 'C'),
                    array(round(($key->aspek5_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek5_4, 'C'),
                    array(round(($key->aspek5_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek5_5, 'C'),
                    array(round(($key->aspek5_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek5_1*5)+($key->aspek5_2*4)+($key->aspek5_3*3)+($key->aspek5_4*2)+($key->aspek5_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('6', 'C'),
                    array('Bahan bacaan membantu proses belajar'),
                    array($key->aspek6_1, 'C'),
                    array(round(($key->aspek6_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek6_2, 'C'),
                    array(round(($key->aspek6_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek6_3, 'C'),
                    array(round(($key->aspek6_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek6_4, 'C'),
                    array(round(($key->aspek6_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek6_5, 'C'),
                    array(round(($key->aspek6_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek6_1*5)+($key->aspek6_2*4)+($key->aspek6_3*3)+($key->aspek6_4*2)+($key->aspek6_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('7', 'C'),
                    array('Fasilitas mengajar membantu (peralatan dan ruangan)'),
                    array($key->aspek7_1, 'C'),
                    array(round(($key->aspek7_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek7_2, 'C'),
                    array(round(($key->aspek7_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek7_3, 'C'),
                    array(round(($key->aspek7_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek7_4, 'C'),
                    array(round(($key->aspek7_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek7_5, 'C'),
                    array(round(($key->aspek7_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek7_1*5)+($key->aspek7_2*4)+($key->aspek7_3*3)+($key->aspek7_4*2)+($key->aspek7_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('8', 'C'),
                    array('Partisipasi peserta lain sesuai harapan saya'),
                    array($key->aspek8_1, 'C'),
                    array(round(($key->aspek8_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek8_2, 'C'),
                    array(round(($key->aspek8_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek8_3, 'C'),
                    array(round(($key->aspek8_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek8_4, 'C'),
                    array(round(($key->aspek8_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek8_5, 'C'),
                    array(round(($key->aspek8_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek8_1*5)+($key->aspek8_2*4)+($key->aspek8_3*3)+($key->aspek8_4*2)+($key->aspek8_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('9', 'C'),
                    array('Pelayanan lainnya baik (misal: parkir, customer service)'),
                    array($key->aspek9_1, 'C'),
                    array(round(($key->aspek9_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek9_2, 'C'),
                    array(round(($key->aspek9_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek9_3, 'C'),
                    array(round(($key->aspek9_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek9_4, 'C'),
                    array(round(($key->aspek9_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek9_5, 'C'),
                    array(round(($key->aspek9_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek9_1*5)+($key->aspek9_2*4)+($key->aspek9_3*3)+($key->aspek9_4*2)+($key->aspek9_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));

        $pdf->Row(array(
                    // array('10', 'C'),
                    array('Secara keseluruhan saya puas'),
                    array($key->aspek10_1, 'C'),
                    array(round(($key->aspek10_1/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek10_2, 'C'),
                    array(round(($key->aspek10_2/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek10_3, 'C'),
                    array(round(($key->aspek10_3/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek10_4, 'C'),
                    array(round(($key->aspek10_4/$key->jml_responden)*100).'%', 'C'),
                    array($key->aspek10_5, 'C'),
                    array(round(($key->aspek10_5/$key->jml_responden)*100).'%', 'C'),
                    array(round((($key->aspek10_1*5)+($key->aspek10_2*4)+($key->aspek10_3*3)+($key->aspek10_4*2)+($key->aspek10_5*1))/$key->jml_peserta,2), 'C'),
                    array('100%', 'C')

        ));
    }

    $pdf->ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(100,7,'Saran dan Komentar : ',0,1);

    $pdf->SetFont('Arial','',10);
    foreach ($komentar as $key2) {
      $pdf->Cell(100,5,'- '.$key2->komentar,0,1);
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
