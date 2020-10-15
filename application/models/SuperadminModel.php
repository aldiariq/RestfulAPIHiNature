<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SuperadminModel extends CI_Model {

    public function tambahgunungdanadmin($datatambahgunungdanadmin)
    {
        $datagunung = array(
            'nama_gunung' => $datatambahgunungdanadmin['nama_gunung'],
            'info_gunung' => $datatambahgunungdanadmin['info_gunung'],
            'lokasi_gunung' => $datatambahgunungdanadmin['lokasi_gunung']
        );

        $query = $this->db->insert('tb_gunung', $datagunung);

        $this->db->db_debug = false;

        if (!$query) {
            return false;
        } else {
            $hasildatagunung = $this->db->get_where('tb_gunung', $datagunung);

            foreach ($hasildatagunung->result() as $data) {
                $dataadmingunung = array(
                    'id_gunung' => $data->id_gunung,
                    'email_admin_gunung' => $datatambahgunungdanadmin['email_admin_gunung'],
                    'nama_admin_gunung' => $datatambahgunungdanadmin['nama_admin_gunung'],
                    'nohp_admin_gunung' => $datatambahgunungdanadmin['nohp_admin_gunung'],
                    'password_admin_gunung' => $datatambahgunungdanadmin['password_admin_gunung']
                );

                $query = $this->db->insert('tb_admin_gunung', $dataadmingunung);
                
                $this->db->db_debug = false;

                if(!$query){
                    return false;
                }else {
                    return true;
                }
            }
        }
    }

    public function lihatgunungdanadmin()
    {
        $query = $this->db->select('tb_gunung.*, tb_admin_gunung.id_admin_gunung, tb_admin_gunung.email_admin_gunung, tb_admin_gunung.nama_admin_gunung, tb_admin_gunung.nohp_admin_gunung');
        $query = $this->db->from('tb_gunung');
        $query = $this->db->join('tb_admin_gunung', 'tb_gunung.id_gunung = tb_admin_gunung.id_gunung');
        $query = $this->db->get();
        return $query;
    }

    public function ubahgunungdanadmin($wheregunung, $datagunung, $whereadmingunung, $dataadmingunung)
    {
        $query = $this->db->where($wheregunung);
        $query = $this->db->update('tb_gunung', $datagunung);
        $query = $this->db->where($whereadmingunung);
        $query = $this->db->update('tb_admin_gunung', $dataadmingunung);

        $this->db->db_debug = false;

        if(!$query){
            return false;
        }else {
            return true;
        }
    }

    public function hapusgunungdanadmin($wheregunung)
    {
        $query = $this->db->where($wheregunung);
        $query = $this->db->delete('tb_gunung');

        if($this->db->affected_rows()){
            return true;
        }else {
            return false;
        }
    }

    public function resetpasswordadmingunung($whereadmingunung)
    {
        $query = $this->db->where($whereadmingunung);

        $dataresetpassword = array(
            'password_admin_gunung' => md5('12345678')
        );

        $this->db->update('tb_admin_gunung', $dataresetpassword);
        
        if($this->db->affected_rows()){
            return true;
        }else {
            return false;
        }
    }

    public function lihatpengguna()
    {
        $query = $this->db->select('tb_pengguna.id_pengguna, tb_pengguna.email_pengguna, tb_pengguna.nama_pengguna, tb_pengguna.nohp_pengguna');
        $query = $this->db->from('tb_pengguna');
        $query = $this->db->get();
        return $query;
    }

    public function hapuspengguna($wherepengguna)
    {
        $query = $this->db->where($wherepengguna);
        $query = $this->db->delete('tb_pengguna');

        if($this->db->affected_rows()){
            return true;
        }else {
            return false;
        }
    }

    public function resetpasswordpengguna($wherepengguna)
    {
        $dataresetpassword = array(
            'password_pengguna' => md5('12345678')
        );

        $query = $this->db->where($wherepengguna);
        $query = $this->db->update('tb_pengguna', $dataresetpassword);

        if($this->db->affected_rows()){
            return true;
        }else {
            return false;
        }
    }

    public function lihatprofil($wheresuperadmin)
    {
        $query = $this->db->select('tb_super_admin.id_super_admin, tb_super_admin.email_super_admin, tb_super_admin.nama_super_admin, tb_super_admin.nohp_super_admin');
        $query = $this->db->from('tb_super_admin');
        $query = $this->db->get();
        return $query;
    }

    public function ubahprofil($wheresuperadmin, $datasuperadmin)
    {
        $query = $this->db->where($wheresuperadmin);
        $query = $this->db->update('tb_super_admin', $datasuperadmin);

        if($this->db->affected_rows()){
            return true;
        }else {
            return false;
        }
    }

    public function gantipassword($wheresuperadmin, $datagantipassword)
    {
        $query = $this->db->select('tb_super_admin.password_super_admin');
        $query = $this->db->from('tb_super_admin');
        $query = $this->db->where($wheresuperadmin);
        $query = $this->db->get();

        if($query->result() == 0){
            return false;
        }else {
            foreach ($wheresuperadmin as $data) {
                $wheregantipassword = array(
                    'id_super_admin' => $wheresuperadmin['id_super_admin']
                );

                $query = $this->db->where($wheregantipassword);
                $query = $this->db->update('tb_super_admin', $datagantipassword);

                if($this->db->affected_rows()){
                    return true;
                }else {
                    return false;
                }
            }
        }
        
    }

}

/* End of file SuperadminModel.php */
