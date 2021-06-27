<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
        $this->load->model('M_admin');

        is_logged_in();
        is_fakultas();
    }

    public function index()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = 'Dashboard';
        $data['data_user'] = $this->M_dashboard->countUser();
        $data['data_prestasi'] = $this->M_dashboard->countPrestasi();
        $data['prestasi'] = $this->M_dashboard->countPrestasiMahasiswa();
        $data['kelompok'] = $this->M_dashboard->countPrestasiMahasiswaKelompok();
        $data['jenis_juara'] = $this->M_dashboard->countJenisJuara();
        $data['jenis_juara_kelompok'] = $this->M_dashboard->countJenisJuaraKelompok();
        $data['tingkat'] = $this->M_dashboard->countTingkat();
        $data['tingkat_kelompok'] = $this->M_dashboard->countTingkatKelompok();
        $data['jenis'] = $this->M_dashboard->countJenis();
        $data['jenis_kelompok'] = $this->M_dashboard->countJenisKelompok();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
