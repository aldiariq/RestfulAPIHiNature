<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AutentikasiController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AutentikasiModel');
    }

    public function masuk()
    {
        $email_akun = $this->input->post('email_akun');
        $password_akun = md5($this->input->post('password_akun'));
        $tipe_akun = $this->input->post('tipe_akun');

        if($tipe_akun == 'SUPERADMIN'){
            $datamasuk = array(
                'email_super_admin' => $email_akun,
                'password_super_admin' => $password_akun,
            );

            $hasildatamasuk = $this->AutentikasiModel->masuksuperadmin($datamasuk);

            if($hasildatamasuk->num_rows() > 0){
                $keteranganmasuk = array(
                    'BERHASIL' => true,
                    'KETERANGAN' => 'Berhasil Masuk',
                    'DETAIL_AKUN' => $hasildatamasuk->result()
                );
            }else {
                $keteranganmasuk = array(
                    'BERHASIL' => false,
                    'KETERANGAN' => 'Gagal Masuk'
                );
            }
            
        }else if($tipe_akun == 'ADMIN'){
            $datamasuk = array(
                'email_admin_gunung' => $email_akun,
                'password_admin_gunung' => $password_akun,
            );
            
            $hasildatamasuk = $this->AutentikasiModel->masukadmin($datamasuk);

            if($hasildatamasuk->num_rows() > 0){
                $keteranganmasuk = array(
                    'BERHASIL' => true,
                    'KETERANGAN' => 'Berhasil Masuk',
                    'DETAIL_AKUN' => $hasildatamasuk->result()
                );
            }else {
                $keteranganmasuk = array(
                    'BERHASIL' => false,
                    'KETERANGAN' => 'Gagal Masuk'
                );
            }
        }else if($tipe_akun == 'PENGGUNA'){
            $datamasuk = array(
                'email_pengguna' => $email_akun,
                'password_pengguna' => $password_akun,
            );

            $hasildatamasuk = $this->AutentikasiModel->masukpengguna($datamasuk);

            if($hasildatamasuk->num_rows() > 0){
                $keteranganmasuk = array(
                    'BERHASIL' => true,
                    'KETERANGAN' => 'Berhasil Masuk',
                    'DETAIL_AKUN' => $hasildatamasuk->result()
                );
            }else {
                $keteranganmasuk = array(
                    'BERHASIL' => false,
                    'KETERANGAN' => 'Gagal Masuk'
                );
            }
        }

        echo json_encode($keteranganmasuk);
    }

    public function registrasi()
    {
        $email_pengguna = $this->input->post('email_pengguna');
        $nama_pengguna = $this->input->post('nama_pengguna');
        $nohp_pengguna = $this->input->post('nohp_pengguna');
        $password_pengguna = md5($this->input->post('password_pengguna'));

        $dataregistrasi = array(
            'email_pengguna' => $email_pengguna,
            'nama_pengguna' => $nama_pengguna,
            'nohp_pengguna' => $nohp_pengguna,
            'password_pengguna' => $password_pengguna
        );

        $hasildataregistrasi = $this->AutentikasiModel->registrasi($dataregistrasi);

        if($hasildataregistrasi == true){
            $keteranganregistrasi = array(
                'BERHASIL' => true,
                'KETERANGAN' => 'Berhasil Registrasi'
            );
        }else {
            $keteranganregistrasi = array(
                'BERHASIL' => false,
                'KETERANGAN' => 'Gagal Registrasi'
            );
        }

        echo json_encode($keteranganregistrasi);
    }

}

/* End of file AutentikasiController.php */
