<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AutentikasiModel extends CI_Model {

    public function masuksuperadmin($datamasuk)
    {
        $query = $this->db->select("id_super_admin, email_super_admin, nama_super_admin, nohp_super_admin");
        $query = $this->db->where($datamasuk);
        $query = $this->db->get('tb_super_admin');
        return $query;
    }

    public function masukadmin($datamasuk)
    {
        $query = $this->db->select("id_admin_gunung, id_gunung, email_admin_gunung, nama_admin_gunung, nohp_admin_gunung");
        $query = $this->db->where($datamasuk);
        $query = $this->db->get('tb_admin_gunung');
        return $query;
    }

    public function masukpengguna($datamasuk)
    {
        $query = $this->db->select("id_pengguna, email_pengguna, nama_pengguna, nohp_pengguna, password_pengguna");
        $query = $this->db->where($datamasuk);
        $query = $this->db->get('tb_pengguna');
        return $query;
    }

    public function registrasi($dataregistrasi)
    {
        $query = $this->db->insert('tb_pengguna', $dataregistrasi);
        
        $this->db->db_debug = false;

        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

}

/* End of file AutentikasiModel.php */
