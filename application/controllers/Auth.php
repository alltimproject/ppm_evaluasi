<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');


  }

	function index()
	{
    if($this->session->userdata('login') == true){
      redirect('peserta/');
    }

		$this->load->view('login');
	}

  function admin()
  {
    if($this->session->userdata('login') == true){
      if($this->session->userdata('level') == 'Admin'){
        redirect('admin/');
      } elseif($this->session->userdata('level') == 'Manajer'){
        redirect('manajer/');
      } else {
        redirect('dosen/');
      }
    }

    $this->load->view('login_admin');
  }

  function cekLogin()
  {
    $id_peserta = $this->input->post('id_peserta');
    $password = sha1($this->input->post('password'));

    $where = array(
      'a.id_peserta' =>  $id_peserta,
      'a.password' => $password
    );

    $cek = $this->m_main->select_info($where);
    if($cek->num_rows() == 1){
      foreach($cek->result() as $key){
        $id_peserta = $key->id_peserta;
        $nama_peserta = $key->nama_peserta;
        $email = $key->email;
        $telepon = $key->telepon;
        $alamat = $key->alamat;
        $id_subyek = $key->id_subyek;
        $deskripsi = $key->deskripsi_subyek;
        $tgl_mulai = $key->tgl_mulai;
        $tgl_selesai = $key->tgl_selesai;
        $kelas = $key->kelas;
      }

      $session = array(
        'id_peserta' => $id_peserta,
        'nama_peserta' => $nama_peserta,
        'email' => $email,
        'telepon' => $telepon,
        'alamat' => $alamat,
        'id_subyek' => $id_subyek,
        'deskripsi' => $deskripsi,
        'tgl_mulai' => $tgl_mulai,
        'tgl_selesai' => $tgl_selesai,
        'kelas' => $kelas,
        'login' => true
      );

      $this->session->set_userdata($session);
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function cekLoginAdmin()
  {
    $nip = $this->input->post('nip');
    $password = sha1($this->input->post('password'));

    $where = array(
      'nip' =>  $nip,
      'password' => $password
    );

    $cek = $this->m_main->select('t_user', $where);
    if($cek->num_rows() == 1){
      foreach($cek->result() as $key){
        $nip = $key->nip;
        $nama = $key->nama;
        $level = $key->level;
      }

      $session = array(
        'nip' => $nip,
        'nama' => $nama,
        'level' => $level,
        'login' => true
      );

      $this->session->set_userdata($session);
      echo $level;
    } else {
      echo "gagal";
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url().'');
  }

  function logout_admin()
  {
    $this->session->sess_destroy();
    redirect(base_url().'auth/admin');
  }


}
