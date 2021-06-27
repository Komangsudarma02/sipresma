<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        is_logged_in();
        is_admin();
    }

    public function daftarDashboard()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = 'Dashboard';
        $data['ftk'] = $this->M_admin->countFTK();
        $data['fmipa'] = $this->M_admin->countFMIPA();
        $data['fe'] = $this->M_admin->countFE();
        $data['fip'] = $this->M_admin->countFIP();
        $data['fbs'] = $this->M_admin->countFBS();
        $data['fok'] = $this->M_admin->countFOK();
        $data['fhis'] = $this->M_admin->countFHIS();
        $data['fk'] = $this->M_admin->countFK();

        $prestasi = [];
        $fakultas = $this->db->get('tb_fakultas')->result_array();
        foreach ($fakultas as $fak) {
            $jumlah = $this->M_admin->countPrestasi($fak['id_fakultas']);
            $data_fakultas = [
                'jumlah' => $jumlah,
                'nama_fakultas' => $fak['nama_fakultas']
            ];
            array_push($prestasi, $data_fakultas);
        }

        $data['prestasi'] = $prestasi;
        // print_r($data['prestasi']);
        // die;
        $data['jenis_juara'] = $this->M_admin->countJenisJuara();
        $data['tingkat'] = $this->M_admin->countTingkat();
        $data['jenis'] = $this->M_admin->countJenis();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
