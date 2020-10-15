<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SuperadminController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SuperadminModel');
    }

    public function tambahgunungdanadmin()
    {
        $nama_gunung = $this->input->post('nama_gunung');
        $info_gunung = $this->input->post('info_gunung');
        $lokasi_gunung = $this->input->post('lokasi_gunung');
        $email_admin_gunung = $this->input->post('email_admin_gunung');
        $nama_admin_gunung = $this->input->post('nama_admin_gunung');
        $nohp_admin_gunung = $this->input->post('nohp_admin_gunung');
        $password_admin_gunung = md5($this->input->post('password_admin_gunung'));

        $datatambahgunungdanadmin = array(
            'nama_gunung' => $nama_gunung,
            'info_gunung' => $info_gunung,
            'lokasi_gunung' => $lokasi_gunung,
            'email_admin_gunung' => $email_admin_gunung,
            'nama_admin_gunung' => $nama_admin_gunung,
            'nohp_admin_gunung' => $nohp_admin_gunung,
            'password_admin_gunung' => $password_admin_gunung
        );
        
        $hasildatatambahgunungdanadmin = $this->SuperadminModel->tambahgunungdanadmin($datatambahgunungdanadmin);

        if($hasildatatambahgunungdanadmin == true){
            $keterangantambahgunungdanadmin = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Menambahkan Gunung dan Admin'
            );
        }else {
            $keterangantambahgunungdanadmin = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Berhasil Menambahkan Gunung dan Admin'
            );
        }

        echo json_encode($keterangantambahgunungdanadmin);
    }

    public function lihatgunungdanadmin()
    {
        $datagunungdanadmin = array(
            'BERHASIL' => true,
            'DATAGUNUNGDANADMIN' => $this->SuperadminModel->lihatgunungdanadmin()->result()
        );

        echo json_encode($datagunungdanadmin);
    }

    public function ubahgunungdanadmin()
    {
        $id_gunung = $this->input->post('id_gunung');
        $nama_gunung = $this->input->post('nama_gunung');
        $info_gunung = $this->input->post('info_gunung');
        $lokasi_gunung = $this->input->post('lokasi_gunung');
        $id_admin_gunung = $this->input->post('id_admin_gunung');
        $email_admin_gunung = $this->input->post('email_admin_gunung');
        $nama_admin_gunung = $this->input->post('nama_admin_gunung');
        $nohp_admin_gunung = $this->input->post('nohp_admin_gunung');

        $wheregunung = array(
            'id_gunung' => $id_gunung
        );

        $datagunung = array(
            'nama_gunung' => $nama_gunung,
            'info_gunung' => $info_gunung,
            'lokasi_gunung' => $lokasi_gunung
        );

        $whereadmingunung = array(
            'id_admin_gunung' => $id_admin_gunung
        );

        $dataadmingunung = array(
            'email_admin_gunung' => $email_admin_gunung,
            'nama_admin_gunung' => $nama_admin_gunung,
            'nohp_admin_gunung' => $nohp_admin_gunung
        );

        $hasildata = $this->SuperadminModel->ubahgunungdanadmin($wheregunung, $datagunung, $whereadmingunung, $dataadmingunung);

        if($hasildata == true){
            $keteranganubahgunungdanadmin = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Mengubah Gunung dan Admin'
            );
        }else {
            $keteranganubahgunungdanadmin = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Gagal Mengubah Gunung dan Admin'
            );
        }

        echo json_encode($keteranganubahgunungdanadmin);
    }

    public function hapusgunungdanadmin()
    {
        $id_gunung = $this->input->post('id_gunung');

        $wheregunung = array(
            'id_gunung' => $id_gunung
        );

        $hasilwheregunung = $this->SuperadminModel->hapusgunungdanadmin($wheregunung);

        if($hasilwheregunung == true){
            $keteranganhapusgunungdanadmin = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Menghapus Gunung dan Admin'
            );
        }else {
            $keteranganhapusgunungdanadmin = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Gagal Menghapus Gunung dan Admin'
            );
        }

        echo json_encode($keteranganhapusgunungdanadmin);
    }

    public function resetpasswordadmingunung()
    {
        $id_admin_gunung = $this->input->post('id_admin_gunung');

        $whereadmingunung = array(
            'id_admin_gunung' => $id_admin_gunung
        );

        $hasilwhereadmingunung = $this->SuperadminModel->resetpasswordadmingunung($whereadmingunung);

        if($hasilwhereadmingunung == true){
            $keteranganresetpasswordadmingunung = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Mereset Password Admin Gunung'
            );
        }else {
            $keteranganresetpasswordadmingunung = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Gagal Mereset Password Admin Gunung'
            );
        }

        echo json_encode($keteranganresetpasswordadmingunung);
    }

    public function lihatpengguna()
    {
        $datalihatpengguna = array(
            'BERHASIL' => true,
            'DATAPENGGUNA' => $this->SuperadminModel->lihatpengguna()->result()
        );

        echo json_encode($datalihatpengguna);
    }

    public function hapuspengguna()
    {
        $id_pengguna = $this->input->post('id_pengguna');

        $wherepengguna = array(
            'id_pengguna' => $id_pengguna
        );

        $hasilwherepengguna = $this->SuperadminModel->hapuspengguna($wherepengguna);

        if($hasilwherepengguna == true){
            $keteranganhapuspengguna = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Menghapus Pengguna'
            );
        }else {
            $keteranganhapuspengguna = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Gagal Menghapus Pengguna'
            );
        }

        echo json_encode($keteranganhapuspengguna);
    }

    public function resetpasswordpengguna(){
        $id_pengguna = $this->input->post('id_pengguna');

        $wherepengguna = array(
            'id_pengguna' => $id_pengguna
        );

        $hasilwherepengguna = $this->SuperadminModel->resetpasswordpengguna($wherepengguna);

        if($hasilwherepengguna == true){
            $keteranganresetpasswordpengguna = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Mereset Password Pengguna'
            );
        }else {
            $keteranganresetpasswordpengguna = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Gagal Mereset Password Pengguna'
            );
        }

        echo json_encode($keteranganresetpasswordpengguna);
    }

    public function lihatprofil()
    {
        $id_super_admin = $this->input->post('id_super_admin');

        $wheresuperadmin = array(
            'id_super_admin' => $id_super_admin
        );

        $keteranganlihatprofil = array(
            'BERHASIL' => true,
            'DATASUPERADMIN' => $this->SuperadminModel->lihatprofil($wheresuperadmin)->result()
        );

        echo json_encode($keteranganlihatprofil);
    }

    public function ubahprofil()
    {
        $id_super_admin = $this->input->post('id_super_admin');
        $email_super_admin = $this->input->post('email_super_admin');
        $nama_super_admin = $this->input->post('nama_super_admin');
        $nohp_super_admin = $this->input->post('nohp_super_admin');

        $wheresuperadmin = array(
            'id_super_admin' => $id_super_admin
        );

        $datasuperadmin = array(
            'email_super_admin' => $email_super_admin,
            'nama_super_admin' => $nama_super_admin,
            'nohp_super_admin' => $nohp_super_admin
        );

        $hasilwheresuperadmin = $this->SuperadminModel->ubahprofil($wheresuperadmin, $datasuperadmin);

        if($hasilwheresuperadmin == true){
            $keteranganubahprofil = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Mengubah Profil Super Admin'
            );
        }else {
            $keteranganubahprofil = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Gagal Mengubah Profil Super Admin'
            );
        }

        echo json_encode($keteranganubahprofil);
    }

    public function gantipassword()
    {
        $id_super_admin = $this->input->post('id_super_admin');
        $passwordlama_super_admin = md5($this->input->post('passwordlama_super_admin'));
        $passwordbaru_super_admin = md5($this->input->post('passwordbaru_super_admin'));

        $wheresuperadmin = array(
            'id_super_admin' => $id_super_admin,
            'password_super_admin' => $passwordlama_super_admin
        );

        $datagantipassword = array(
            'password_super_admin' => $passwordbaru_super_admin
        );

        $hasilwheresuperadmin = $this->SuperadminModel->gantipassword($wheresuperadmin, $datagantipassword);

        if($hasilwheresuperadmin == true){
            $keterangangantipassword = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Mengubah Password Super Admin'
            );
        }else {
            $keterangangantipassword = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Gagal Mengubah Password Super Admin'
            );
        }

        echo json_encode($keterangangantipassword);
    }

}

/* End of file SuperadminController.php */
