<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InfoaplikasiController extends CI_Controller {

    public function index()
    {
        $infoaplikasi = array(
            'nama_aplikasi' => 'HiNature',
            'deskripsi_aplikasi' => 'Aplikasi Untuk Pendakian Gunung'
        );

        echo json_encode($infoaplikasi);
    }

}

/* End of file InfoaplikasiController.php */
