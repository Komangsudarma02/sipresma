<?php
defined('BASEPATH') or exit('NO direct script accses allowed');
class Frontend extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_prestasi');
    }

    public function index()
    {
        $data['title'] = "Data Prestasi Mahasiswa";
        $config['base_url'] = site_url('Prestasi/daftarPrestasi');
        $data['prestasi'] = $this->M_prestasi->dataPrestasiFrontend();
        $data['kepesertaan'] = 'individu';
        $data['kepesertaan'] = 'kelompok';
        $this->load->view('templates/header_frontend', $data);
        $this->load->view('frontend/index', $data);
        $this->load->view('templates/footer_frontend', $data);
    }
}
