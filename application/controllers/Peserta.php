<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');
    $this->load->model('m_master');

    if($this->session->userdata('login') != true){
      redirect('auth');
    }
  }

  function index()
  {
    $this->load->view('peserta/main');
  }

  function home()
  {
    $this->load->view('peserta/home');
  }

  function evaluasi()
  {
    $this->load->view('peserta/evaluasi');
  }

  function error()
  {
    $this->load->view('peserta/error');
  }

  function json_sesi()
  {
    $where = array(
      'a.id_subyek' => $this->session->userdata('id_subyek')
    );

    $data['sesi'] = $this->m_master->evaluasi_peserta($where)->result();
    echo json_encode($data);
  }

  function response_evaluasi()
  {
    $data = array(
      'id_sesi' => $this->input->post('id_sesi'),
      'id_peserta' => $this->session->userdata('id_peserta'),
      'aspek_1' => $this->input->post('aspek_1'),
      'aspek_2' => $this->input->post('aspek_2'),
      'aspek_3' => $this->input->post('aspek_3'),
      'aspek_4' => $this->input->post('aspek_4'),
      'aspek_5' => $this->input->post('aspek_5'),
      'aspek_6' => $this->input->post('aspek_6'),
      'aspek_7' => $this->input->post('aspek_7'),
      'aspek_8' => $this->input->post('aspek_8'),
      'aspek_9' => $this->input->post('aspek_9'),
      'aspek_10' => $this->input->post('aspek_10'),
      'komentar' => $this->input->post('komentar')
    );

    $cek = $this->m_main->add_data('t_penilaian', $data);

    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

}
?>
