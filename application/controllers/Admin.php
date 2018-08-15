<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin/main');
	}

  function dashboard()
  {
    $this->load->view('admin/dashboard');
  }

  function pelatihan()
  {
    $this->load->view('admin/pelatihan');
  }

  function peserta($id)
  {
    $data['subyek'] = $id;
    $this->load->view('admin/peserta', $data);
  }

  function sesi($id)
  {
    $data['subyek'] = $id;
    $this->load->view('admin/sesi', $data);
  }

  function evaluasi()
  {
    $this->load->view('admin/evaluasi');
  }

  function detail($id)
  {
    $data['sesi'] = $id;
    $this->load->view('admin/detail', $data);
  }

  function user()
  {
    $this->load->view('admin/user');
  }
  function error()
  {
    $this->load->view('admin/error');
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

  function json_user()
  {
    $cari = $this->input->post('cari');

    if(isset($cari)){
      $like = $cari;
    } else {
      $like = null;
    }

    $where = 'level != "Admin"';
    $data['user'] = $this->m_master->show_user($where, $like)->result();
    echo json_encode($data);
  }



  /* ------------------------- AJAX RESPONSE ----------------------- */
  function response_pelatihan($aksi)
  {
    switch ($aksi) {
      case 'tambah':
        $data = array(
          'id_subyek' => $this->m_main->buatKode('t_subyek', 'SY', 'id_subyek', '8'),
          'deskripsi_subyek' => $this->input->post('deskripsi_subyek'),
          'tgl_mulai' => $this->input->post('tgl_mulai'),
          'tgl_selesai' => $this->input->post('tgl_selesai'),
          'kelas' => $this->input->post('kelas')
        );

        $cek = $this->m_main->add_data('t_subyek', $data);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      case 'update':
        $where = array(
          'id_subyek' => $this->input->post('id_subyek')
        );

        $data = array(
          'deskripsi_subyek' => $this->input->post('deskripsi_subyek'),
          'tgl_mulai' => $this->input->post('tgl_mulai'),
          'tgl_selesai' => $this->input->post('tgl_selesai'),
          'kelas' => $this->input->post('kelas')
        );

        $cek = $this->m_main->edit_data('t_subyek', $data, $where);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      case 'hapus':
        $where = array(
          'id_subyek' => $this->input->post('id_subyek')
        );

        $cek = $this->m_main->hapus_data('t_subyek', $where);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      default:
        // code...
      break;
    }
  }

  function response_peserta($aksi)
  {
    switch ($aksi) {
      case 'tambah':
        $data = array(
          'id_peserta' => $this->m_main->buatKode('t_peserta', 'P', 'id_peserta', '9'),
          'nama_peserta' => $this->input->post('nama_peserta'),
          'password' => sha1('ppmevaluasi'),
          'email' => $this->input->post('email'),
          'telepon' => $this->input->post('telepon'),
          'alamat' => $this->input->post('alamat'),
          'id_subyek' => $this->input->post('id_subyek')
        );

        $cek = $this->m_main->add_data('t_peserta', $data);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      case 'update':
        $where = array(
          'id_peserta' => $this->input->post('id_peserta')
        );

        $data = array(
          'nama_peserta' => $this->input->post('nama_peserta'),
          'email' => $this->input->post('email'),
          'telepon' => $this->input->post('telepon'),
          'alamat' => $this->input->post('alamat')
        );

        $cek = $this->m_main->edit_data('t_peserta', $data, $where);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      case 'hapus':
        $where = array(
          'id_peserta' => $this->input->post('id_peserta')
        );

        $cek = $this->m_main->hapus_data('t_peserta', $where);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      default:
        // code...
      break;
    }
  }

  function response_sesi($aksi)
  {
    switch ($aksi) {
      case 'tambah':
        $data = array(
          'id_sesi' => $this->m_main->buatKode('t_sesi', 'SS', 'id_sesi', '8'),
          'id_subyek' => $this->input->post('id_subyek'),
          'deskripsi_sesi' => $this->input->post('deskripsi_sesi'),
          'nip' => $this->input->post('nip'),
          'status' => 'Proses'
        );

        $cek = $this->m_main->add_data('t_sesi', $data);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      case 'update':
        $where = array(
          'id_sesi' => $this->input->post('id_sesi')
        );

        $data = array(
          'deskripsi_sesi' => $this->input->post('deskripsi_sesi'),
          'nip' => $this->input->post('nip')
        );

        $cek = $this->m_main->edit_data('t_sesi', $data, $where);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      case 'hapus':
        $where = array(
          'id_sesi' => $this->input->post('id_sesi')
        );

        $cek = $this->m_main->hapus_data('t_sesi', $where);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      default:
        // code...
      break;
    }
  }

  function response_user($aksi)
  {
    switch ($aksi) {
      case 'tambah':
        $data = array(
          'nip' => $this->input->post('nip'),
          'nama' => $this->input->post('nama'),
          'password' => sha1('admin'),
          'email' => $this->input->post('email'),
          'telepon' => $this->input->post('telepon'),
          'level' => $this->input->post('level')
        );

        $cek = $this->m_main->add_data('t_user', $data);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      case 'update':
        $where = array(
          'nip' => $this->input->post('nip')
        );

        $data = array(
          'nama' => $this->input->post('nama'),
          'email' => $this->input->post('email'),
          'telepon' => $this->input->post('telepon'),
          'level' => $this->input->post('level')
        );

        $cek = $this->m_main->edit_data('t_user', $data, $where);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      case 'hapus':
        $where = array(
          'nip' => $this->input->post('nip')
        );

        $cek = $this->m_main->hapus_data('t_user', $where);

        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      break;

      default:
        // code...
      break;
    }
  }

}

?>
