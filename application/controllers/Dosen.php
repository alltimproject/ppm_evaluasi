<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');
    $this->load->model('m_master');
  }


  /* ----------------------- LOAD CONTENT ---------------------------- */
	function index()
	{
		$this->load->view('dosen/main');
	}

  function dashboard()
  {
    $this->load->view('dosen/dashboard');
  }

  function evaluasi()
  {
    $this->load->view('dosen/evaluasi');
  }

  function detail($id)
  {
    $data['sesi'] = $id;
    $this->load->view('dosen/detail', $data);
  }

  function error()
  {
    $this->load->view('dosen/error');
  }


  /* ----------------------- JSON DATA ---------------------------- */

  function json_evaluasi()
  {
    $where = array(
      'b.nip' => $this->session->userdata('nip')
    );

    $data['evaluasi'] = $this->m_master->show_evaluasi($where)->result();
    echo json_encode($data);
  }

  function json_penilaian($id_sesi)
  {
    $where = array(
      'a.id_sesi' => $id_sesi,
      'a.nip' => $this->session->userdata('nip')
    );

    $where2 = array(
      'a.id_sesi' => $id_sesi,
      'c.nip' => $this->session->userdata('nip')
    );

    $data['sesi'] = $this->m_master->show_penilaian($where)->result();
    $data['komentar'] = $this->m_master->show_komentar($where2)->result();
    echo json_encode($data);
  }

  function response_validasi()
  {
    $id_sesi = $this->input->post('id_sesi');

    $where = array('id_sesi' => $id_sesi);
    $data = array('status' => 'Valid');

    $cek = $this->m_main->edit_data('t_sesi', $data, $where);

    if($cek){
      echo 'berhasil';
    } else {
      echo 'gagal';
    }
  }

}

?>
