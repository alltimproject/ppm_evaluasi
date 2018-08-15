<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');
    $this->load->model('m_master');

    if($this->session->userdata('login') != true){
      redirect('auth/admin');
    }
  }


  /* ----------------------- LOAD CONTENT ---------------------------- */
	function index()
	{
		$this->load->view('manajer/main');
	}

  function dashboard()
  {
    $this->load->view('manajer/dashboard');
  }

  function pelatihan()
  {
    $this->load->view('manajer/pelatihan');
  }

  function peserta($id)
  {
    $data['subyek'] = $id;
    $this->load->view('manajer/peserta', $data);
  }

  function sesi($id)
  {
    $data['subyek'] = $id;
    $this->load->view('manajer/sesi', $data);
  }

  function evaluasi()
  {
    $this->load->view('manajer/evaluasi');
  }

  function detail($id)
  {
    $data['sesi'] = $id;
    $this->load->view('manajer/detail', $data);
  }

  function error()
  {
    $this->load->view('manajer/error');
  }


  /* ----------------------- JSON DATA ---------------------------- */
  function json_pelatihan()
  {
    $cari = $this->input->post('cari');

    if(isset($cari)){
      $like = $cari;
    } else {
      $like = null;
    }

    $data['pelatihan'] = $this->m_master->show_pelatihan(null, $like)->result();
    echo json_encode($data);
  }

  function json_peserta($id_subyek)
  {
    $where = array(
      'id_subyek' => $id_subyek
    );
    $data['pelatihan'] = $this->m_main->select('t_subyek', $where)->result();
    $data['peserta'] = $this->m_main->select('t_peserta', $where)->result();
    echo json_encode($data);
  }

  function json_sesi($id_subyek)
  {
    $where = array(
      'id_subyek' => $id_subyek
    );
    $data['pelatihan'] = $this->m_main->select('t_subyek', $where)->result();
    $data['sesi'] = $this->m_master->show_sesi($where)->result();
    $data['dosen'] = $this->m_master->show_dosen()->result();
    echo json_encode($data);
  }

  function json_evaluasi()
  {
    $cari = $this->input->post('cari');

    if(isset($cari)){
      $like = $cari;
    } else {
      $like = null;
    }

    $data['evaluasi'] = $this->m_master->show_evaluasi(null, $like)->result();
    echo json_encode($data);
  }

  function json_penilaian($id_sesi)
  {
    $where = array(
      'a.id_sesi' => $id_sesi
    );

    $data['sesi'] = $this->m_master->show_penilaian($where)->result();
    $data['komentar'] = $this->m_master->show_komentar($where)->result();
    echo json_encode($data);
  }

  function json_dashboard()
  {
    $where = array('a.status' => 'Valid');
    $data['dashboard'] = $this->m_master->show_dashboard()->result();
    $data['valid'] = $this->m_master->show_valid($where)->result();
    echo json_encode($data);
  }



  /* ------------------------- AJAX RESPONSE ----------------------- */

}

?>
