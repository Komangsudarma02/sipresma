<?php
defined('BASEPATH') or exit('NO direct script accses allowed');
class Mahasiswa extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_mahasiswa');
        $this->load->model('M_admin');
        $this->load->library('form_validation');
        is_logged_in();
        is_member();
    }
    function daftarPrestasi()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Prestasi Mahasiswa";
        $config['base_url'] = site_url('Prestasi/daftarPrestasi');
        $data['prestasi'] = $this->M_mahasiswa->dataPrestasi();
        $data['prestasi_blmTervalidasi'] = $this->M_mahasiswa->dataPrestasiBlmTervalidasi();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/prestasi', $data);
        $this->load->view('templates/footer');
    }
    function detail($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Detail Data Prestasi";
        $data['prestasi'] = $this->M_mahasiswa->getPrestasi($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/detail_prestasi', $data);
        $this->load->view('templates/footer');
    }

    function registerPrestasi()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Register Data Prestasi Individu";
        $data['kategori'] = 'Mahasiswa/form_individu';
        $data['form'] = 'registerPrestasi';
        $data['nama_jenis'] = $this->M_mahasiswa->dataJenis();
        $data['nama_tingkat'] = $this->M_mahasiswa->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_mahasiswa->dataJenisJuara();
        $data['name'] = $this->M_mahasiswa->dataUser();
        $data['nama_pembimbing'] = $this->M_mahasiswa->dataPembimbing();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Kegiatan!'
        ]);
        $this->form_validation->set_rules('kota', 'Kota Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Kota Kegiatan!'
        ]);
        $this->form_validation->set_rules('jml_dana', 'Jumlah Dana', 'required|trim', [
            'required' => 'Silahkan Masukan Jumlah Dana!'
        ]);
        $this->form_validation->set_rules('ket_prestasi', 'Keterangan Prestasi', 'required|trim', [
            'required' => 'Silahkan Masukan Keterangan Prestasi!'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Tahun Kegiatan!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('mahasiswa/register_prestasi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_mahasiswa->saveRegisterPrestasi($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Ditambahkan'
            );
            redirect('mahasiswa/daftarPrestasi');
        }
    }

    public function updateRegisterPrestasi($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Registrasi";
        $data['kategori'] = 'mahasiswa/form_update_individu';
        $data['form'] = 'updateRegisterPrestasi';
        $data['id_prestasi'] = $this->db->get_where('tb_prestasi', ['md5(id_prestasi)' => $id])->row_array();
        $data['nama_jenis'] = $this->M_mahasiswa->dataJenis();
        $data['nama_tingkat'] = $this->M_mahasiswa->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_mahasiswa->dataJenisJuara();
        $data['name'] = $this->M_mahasiswa->dataUser();
        $data['nama_pembimbing'] = $this->M_mahasiswa->dataPembimbing();
        $data['prestasi'] = $this->M_mahasiswa->getPrestasi($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Kegiatan!'
        ]);
        $this->form_validation->set_rules('kota', 'Kota Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Kota Kegiatan!'
        ]);
        $this->form_validation->set_rules('jml_dana', 'Jumlah Dana', 'required|trim', [
            'required' => 'Silahkan Masukan Jumlah Dana!'
        ]);
        $this->form_validation->set_rules('ket_prestasi', 'Keterangan Prestasi', 'required|trim', [
            'required' => 'Silahkan Masukan Keterangan Prestasi!'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Tahun Kegiatan!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('mahasiswa/edit_register_prestasi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $upload_file = $_FILES['prestasi']['name'];
            // print_r($_FILES);
            // die;

            if ($upload_file) {
                $konfigurasi = array(
                    'allowed_types' => 'pdf|doc|docx',
                    'upload_path' => realpath('./upload/prestasi'),
                    'remove_spaces' => true,
                    'mod_mime_fix' => true,
                );
                $this->load->library('upload', $konfigurasi);
                $this->upload->do_upload('prestasi');

                $old_file = $_POST['old_prestasi'];
                unlink(FCPATH . 'upload/prestasi/' . $old_file);

                $fileName = str_replace(" ", "_", $_FILES['prestasi']['name']);
                $this->db->set('file_prestasi', $fileName);
                $this->db->where('id_prestasi', $_POST['id_prestasi']);
                $this->db->update('tb_prestasi');
            }

            $this->M_mahasiswa->saveUpdateRegisterPrestasi($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Diubah'
            );
            redirect('Mahasiswa/daftarPrestasi');
        }
    }

    public function registerkelompok()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Register Data Kelompok";
        $data['kategori'] = 'Mahasiswa/form_kelompok';
        $data['form'] = 'registerkelompok';
        $data['nama_jenis'] = $this->M_mahasiswa->dataJenis();
        $data['nama_tingkat'] = $this->M_mahasiswa->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_mahasiswa->dataJenisJuara();
        $data['name'] = $this->M_mahasiswa->dataUser();
        $data['nama_pembimbing'] = $this->M_mahasiswa->dataPembimbing();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Kegiatan!'
        ]);
        $this->form_validation->set_rules('kota', 'Kota Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Kota Kegiatan!'
        ]);
        $this->form_validation->set_rules('jml_dana', 'Jumlah Dana', 'required|trim', [
            'required' => 'Silahkan Masukan Jumlah Dana!'
        ]);
        $this->form_validation->set_rules('ket_prestasi', 'Keterangan Prestasi', 'required|trim', [
            'required' => 'Silahkan Masukan Keterangan Prestasi!'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Tahun Kegiatan!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('mahasiswa/register_prestasi', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $_POST['id_user'];
            $last_id = $this->M_mahasiswa->cekLastId();
            $id_prestasi = $last_id['id_prestasi'] + 1;
            $this->M_mahasiswa->saveRegisterKelompok($id_prestasi, $_POST);
            foreach ($id_user as $row) {
                $id_fakultas = $this->db->get_where('user', ['id_user' => $row])->row_array();
                $data_input = [
                    'id_prestasi' => $id_prestasi,
                    'id_user' => $row,
                    'id_fakultas' => $id_fakultas['id_fakultas']
                ];
                $this->M_mahasiswa->saveKelompok($data_input);
            }
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Ditambahkan'
            );
            redirect('Mahasiswa/daftarPrestasi');
        }
    }

    public function updateRegisterKelompok($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Registrasi";
        $data['kategori'] = 'Mahasiswa/form_update_kelompok';
        $data['form'] = 'updateRegisterKelompok';
        $data['id_prestasi'] = $this->db->get_where('tb_prestasi', ['md5(id_prestasi)' => $id])->row_array();
        $data['nama_jenis'] = $this->M_mahasiswa->dataJenis();
        $data['nama_tingkat'] = $this->M_mahasiswa->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_mahasiswa->dataJenisJuara();
        $data['name'] = $this->M_mahasiswa->dataUser();
        $data['nama_pembimbing'] = $this->M_mahasiswa->dataPembimbing();
        $data['prestasi'] = $this->M_mahasiswa->getKelompok($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Kegiatan!'
        ]);
        $this->form_validation->set_rules('kota', 'Kota Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Kota Kegiatan!'
        ]);
        $this->form_validation->set_rules('jml_dana', 'Jumlah Dana', 'required|trim', [
            'required' => 'Silahkan Masukan Jumlah Dana!'
        ]);
        $this->form_validation->set_rules('ket_prestasi', 'Keterangan Prestasi', 'required|trim', [
            'required' => 'Silahkan Masukan Keterangan Prestasi!'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun Kegiatan', 'required|trim', [
            'required' => 'Silahkan Masukan Tahun Kegiatan!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('mahasiswa/edit_register_prestasi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // print_r($_POST['id_user']);
            // die;
            $upload_file = $_FILES['prestasi']['name'];
            // print_r($_FILES);
            // die;

            if ($upload_file) {
                $konfigurasi = array(
                    'allowed_types' => 'pdf|doc|docx',
                    'upload_path' => realpath('./upload/prestasi'),
                    'remove_spaces' => true,
                    'mod_mime_fix' => true,
                );
                $this->load->library('upload', $konfigurasi);
                $this->upload->do_upload('prestasi');

                $old_file = $_POST['old_prestasi'];
                unlink(FCPATH . 'upload/prestasi/' . $old_file);

                $fileName = str_replace(" ", "_", $_FILES['prestasi']['name']);
                $this->db->set('file_prestasi', $fileName);
                $this->db->where('id_prestasi', $_POST['id_prestasi']);
                $this->db->update('tb_prestasi');
            }

            $this->M_mahasiswa->saveUpdateKelompok($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Diubah'
            );
            redirect('Mahasiswa/daftarPrestasi');
        }
    }
    public function findMahasiswa()
    {
        $q = $this->input->post("id_user");
        $sql = "select id_user as id,name as text from user where name like '%" . $q . "%' order by id_user asc";
        //die($sql);
        $data_tindakan = $this->db->query($sql)->result_array();

        echo json_encode($data_tindakan);
    }


    public function findPembimbing()
    {
        $q = $this->input->post("id_pembimbing");
        $sql = "select id_pembimbing as id,nama_pembimbing as text from tb_pembimbing where nama_pembimbing like '%" . $q . "%' order by id_pembimbing asc";
        //die($sql);
        $data_tindakan = $this->db->query($sql)->result_array();

        echo json_encode($data_tindakan);
    }

    public function deletePrestasi()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_prestasi', $key);
        $query = $this->db->get('tb_prestasi');
        if ($query->num_rows() > 0) {
            $this->M_mahasiswa->deletePrestasi($key);
        }
        $this->session->set_flashdata(
            'prestasi',
            'Data Berhasil Dihapus'
        );
        redirect('Mahasiswa/daftarPrestasi');
    }
}
