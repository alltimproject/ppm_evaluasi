<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_master extends CI_Model
  {

    function show_valid($where = null)
    {
      $this->db->select('a.id_sesi, a.deskripsi_sesi, a.status, b.nama, b.nip, c.deskripsi_subyek');

      $this->db->from('t_sesi a');
      $this->db->join('t_user b', 'b.nip = a.nip', 'left');
      $this->db->join('t_subyek c', 'c.id_subyek = a.id_subyek', 'left');

      if($where != null)
      {
        $this->db->where($where);
      }
      $this->db->limit(10);

      return $this->db->get();
    }

    function show_dashboard()
    {
      $this->db->select('COUNT(id_subyek) as jml_pelatihan');
      $this->db->select('(SELECT COUNT(id_sesi) FROM t_sesi) as jml_sesi');
      $this->db->select('(SELECT COUNT(id_peserta) FROM t_peserta) as jml_peserta');
      $this->db->select('(SELECT COUNT(nip) FROM t_user) as jml_user');
      $this->db->from('t_subyek');

      return $this->db->get();
    }

    function show_pelatihan($where = null, $like = null, $between = null)
    {
      $this->db->select('*');
      $this->db->select('(SELECT COUNT(id_sesi) FROM t_sesi WHERE t_sesi.id_subyek = t_subyek.id_subyek) as jml_sesi');
      $this->db->select('(SELECT COUNT(id_peserta) FROM t_peserta WHERE t_peserta.id_subyek = t_subyek.id_subyek) as jml_peserta');
      $this->db->from('t_subyek');

      if($where != null)
      {
        $this->db->where($where);
      }

      if($between != null){
        $this->db->where($between);
      }

      if($like != null)
      {
        $this->db->like('deskripsi_subyek', $like);
      }

      return $this->db->get();
    }

    function show_sesi($where = null, $like = null)
    {
      $this->db->select('*');
      $this->db->from('t_sesi');
      $this->db->join('t_user', 't_user.nip = t_sesi.nip', 'left');

      if($where != null)
      {
        $this->db->where($where);
      }

      return $this->db->get();
    }

    function show_evaluasi($where = null, $like = null)
    {
      $this->db->select('a.id_sesi, a.deskripsi_sesi, a.status, b.nama, b.nip, c.deskripsi_subyek, c.kelas, c.tgl_mulai, c.tgl_selesai');
      $this->db->from('t_sesi a');
      $this->db->join('t_user b', 'b.nip = a.nip', 'left');
      $this->db->join('t_subyek c', 'c.id_subyek = a.id_subyek', 'left');

      if($where != null)
      {
        $this->db->where($where);
      }

      if($like != null)
      {
        $this->db->like('deskripsi_sesi', $like);
      }

      return $this->db->get();
    }

    function show_penilaian($where = null)
    {
      $this->db->select('a.id_sesi, a.deskripsi_sesi, a.status, b.nama, c.deskripsi_subyek, c.kelas, c.tgl_mulai, c.tgl_selesai');

      $this->db->select('(SELECT COUNT(id_peserta) FROM t_peserta WHERE t_peserta.id_subyek = a.id_subyek) as jml_peserta');
      $this->db->select('(SELECT COUNT(id_peserta) FROM t_penilaian WHERE t_penilaian.id_sesi = a.id_sesi) as jml_responden');

      $this->db->select('(SELECT COUNT(aspek_1) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_1 = "Sangat Setuju") as aspek1_1');
      $this->db->select('(SELECT COUNT(aspek_1) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_1 = "Setuju") as aspek1_2');
      $this->db->select('(SELECT COUNT(aspek_1) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_1 = "Netral") as aspek1_3');
      $this->db->select('(SELECT COUNT(aspek_1) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_1 = "Tidak Setuju") as aspek1_4');
      $this->db->select('(SELECT COUNT(aspek_1) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_1 = "Sangat Tidak Setuju") as aspek1_5');

      $this->db->select('(SELECT COUNT(aspek_2) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_2 = "Sangat Setuju") as aspek2_1');
      $this->db->select('(SELECT COUNT(aspek_2) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_2 = "Setuju") as aspek2_2');
      $this->db->select('(SELECT COUNT(aspek_2) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_2 = "Netral") as aspek2_3');
      $this->db->select('(SELECT COUNT(aspek_2) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_2 = "Tidak Setuju") as aspek2_4');
      $this->db->select('(SELECT COUNT(aspek_2) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_2 = "Sangat Tidak Setuju") as aspek2_5');

      $this->db->select('(SELECT COUNT(aspek_3) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_3 = "Sangat Setuju") as aspek3_1');
      $this->db->select('(SELECT COUNT(aspek_3) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_3 = "Setuju") as aspek3_2');
      $this->db->select('(SELECT COUNT(aspek_3) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_3 = "Netral") as aspek3_3');
      $this->db->select('(SELECT COUNT(aspek_3) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_3 = "Tidak Setuju") as aspek3_4');
      $this->db->select('(SELECT COUNT(aspek_3) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_3 = "Sangat Tidak Setuju") as aspek3_5');

      $this->db->select('(SELECT COUNT(aspek_4) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_4 = "Sangat Setuju") as aspek4_1');
      $this->db->select('(SELECT COUNT(aspek_4) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_4 = "Setuju") as aspek4_2');
      $this->db->select('(SELECT COUNT(aspek_4) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_4 = "Netral") as aspek4_3');
      $this->db->select('(SELECT COUNT(aspek_4) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_4 = "Tidak Setuju") as aspek4_4');
      $this->db->select('(SELECT COUNT(aspek_4) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_4 = "Sangat Tidak Setuju") as aspek4_5');

      $this->db->select('(SELECT COUNT(aspek_5) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_5 = "Sangat Setuju") as aspek5_1');
      $this->db->select('(SELECT COUNT(aspek_5) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_5 = "Setuju") as aspek5_2');
      $this->db->select('(SELECT COUNT(aspek_5) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_5 = "Netral") as aspek5_3');
      $this->db->select('(SELECT COUNT(aspek_5) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_5 = "Tidak Setuju") as aspek5_4');
      $this->db->select('(SELECT COUNT(aspek_5) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_5 = "Sangat Tidak Setuju") as aspek5_5');

      $this->db->select('(SELECT COUNT(aspek_6) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_6 = "Sangat Setuju") as aspek6_1');
      $this->db->select('(SELECT COUNT(aspek_6) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_6 = "Setuju") as aspek6_2');
      $this->db->select('(SELECT COUNT(aspek_6) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_6 = "Netral") as aspek6_3');
      $this->db->select('(SELECT COUNT(aspek_6) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_6 = "Tidak Setuju") as aspek6_4');
      $this->db->select('(SELECT COUNT(aspek_6) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_6 = "Sangat Tidak Setuju") as aspek6_5');

      $this->db->select('(SELECT COUNT(aspek_7) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_7 = "Sangat Setuju") as aspek7_1');
      $this->db->select('(SELECT COUNT(aspek_7) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_7 = "Setuju") as aspek7_2');
      $this->db->select('(SELECT COUNT(aspek_7) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_7 = "Netral") as aspek7_3');
      $this->db->select('(SELECT COUNT(aspek_7) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_7 = "Tidak Setuju") as aspek7_4');
      $this->db->select('(SELECT COUNT(aspek_7) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_7 = "Sangat Tidak Setuju") as aspek7_5');

      $this->db->select('(SELECT COUNT(aspek_8) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_8 = "Sangat Setuju") as aspek8_1');
      $this->db->select('(SELECT COUNT(aspek_8) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_8 = "Setuju") as aspek8_2');
      $this->db->select('(SELECT COUNT(aspek_8) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_8 = "Netral") as aspek8_3');
      $this->db->select('(SELECT COUNT(aspek_8) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_8 = "Tidak Setuju") as aspek8_4');
      $this->db->select('(SELECT COUNT(aspek_8) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_8 = "Sangat Tidak Setuju") as aspek8_5');

      $this->db->select('(SELECT COUNT(aspek_9) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_9 = "Sangat Setuju") as aspek9_1');
      $this->db->select('(SELECT COUNT(aspek_9) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_9 = "Setuju") as aspek9_2');
      $this->db->select('(SELECT COUNT(aspek_9) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_9 = "Netral") as aspek9_3');
      $this->db->select('(SELECT COUNT(aspek_9) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_9 = "Tidak Setuju") as aspek9_4');
      $this->db->select('(SELECT COUNT(aspek_9) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_9 = "Sangat Tidak Setuju") as aspek9_5');

      $this->db->select('(SELECT COUNT(aspek_10) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_10 = "Sangat Setuju") as aspek10_1');
      $this->db->select('(SELECT COUNT(aspek_10) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_10 = "Setuju") as aspek10_2');
      $this->db->select('(SELECT COUNT(aspek_10) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_10 = "Netral") as aspek10_3');
      $this->db->select('(SELECT COUNT(aspek_10) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_10 = "Tidak Setuju") as aspek10_4');
      $this->db->select('(SELECT COUNT(aspek_10) FROM t_penilaian WHERE a.id_sesi = t_penilaian.id_sesi AND t_penilaian.aspek_10 = "Sangat Tidak Setuju") as aspek10_5');

      $this->db->from('t_sesi a');
      $this->db->join('t_user b', 'b.nip = a.nip', 'left');
      $this->db->join('t_subyek c', 'c.id_subyek = a.id_subyek', 'left');

      if($where != null)
      {
        $this->db->where($where);
      }

      return $this->db->get();
    }

    function show_komentar($where = null)
    {
      $this->db->select('a.komentar, b.nama_peserta');
      $this->db->from('t_penilaian a');
      $this->db->join('t_peserta b', 'b.id_peserta = a.id_peserta', 'left');
      $this->db->join('t_sesi c', 'c.id_sesi = a.id_sesi');

      if($where != null)
      {
        $this->db->where($where);
      }

      return $this->db->get();
    }

    function show_dosen()
    {
      $this->db->select('nip, nama');
      $this->db->from('t_user');

      $this->db->where('level', 'Dosen');
      return $this->db->get();
    }

    function evaluasi_peserta($where, $like = null)
    {
      $session = $this->session->userdata('id_peserta');
      $this->db->select('a.id_sesi, a.deskripsi_sesi, b.nip, b.nama');
      $this->db->select('(SELECT COUNT(t_penilaian.id_peserta) FROM t_penilaian  WHERE t_penilaian.id_peserta = "'.$session.'" AND t_penilaian.id_sesi = a.id_sesi) as jml_penilaian');
      $this->db->from('t_sesi a');
      $this->db->join('t_user b', 'b.nip = a.nip', 'left');


      $this->db->where($where);
      return $this->db->get();
    }

    function show_user($where = null, $like = null)
    {
      $this->db->select('nip, nama, email, telepon, level');
      $this->db->from('t_user');

      if($where != null)
      {
        $this->db->where($where);
      }

      if($like != null)
      {
        $this->db->like('nama', $like);
      }

      return $this->db->get();
    }

  }

?>
