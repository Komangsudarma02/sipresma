<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrestasiFakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_fakultas');
        $this->load->model('M_admin');

        is_logged_in();
        is_fakultas();
    }

    public function index()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = 'My Profile';
        $this->db->join('user_role', 'user_role.id_role=user.id_role');
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    function daftarPrestasi()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Prestasi Mahasiswa";
        $config['base_url'] = site_url('PrestasiFakultas/daftarPrestasi');
        $data['prestasi'] = $this->M_fakultas->dataPrestasi();
        $data['prestasi_blmTervalidasi'] = $this->M_fakultas->dataPrestasiBlmTervalidasi();
        $data['kepesertaan'] = 'individu';
        $data['kepesertaan'] = 'kelompok';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fakultas/prestasi', $data);
        $this->load->view('templates/footer');
    }

    public function validasi()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Prestasi Mahasiswa";
        $config['base_url'] = site_url('PrestasiFakultas/validasi');
        $data['prestasi'] = $this->M_fakultas->dataPrestasi();
        $data['prestasi_blmTervalidasi'] = $this->M_fakultas->dataPrestasiBlmTervalidasi();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('id_prestasi[]', '', 'required', array(
            'required' =>   '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                Pilih data prestasi yang akan di validasi!
                            </div>'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('fakultas/prestasi', $data);
            $this->load->view('templates/footer');
        } else {
            //mengirim post ke model
            $this->M_fakultas->validasiPrestasi();
            $this->session->set_flashdata('prestasi', 'Data Tervalidasi');
            redirect('PrestasiFakultas/daftarPrestasi');
        }
    }

    function detail($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Detail Data Prestasi";
        $data['prestasi'] = $this->M_fakultas->getPrestasi($id);
        $data['kepesertaan'] = 'individu';
        $data['kepesertaan'] = 'kelompok';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fakultas/detail_prestasi', $data);
        $this->load->view('templates/footer');
    }

    function registerPrestasi()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Register Data Prestasi Individu";
        $data['kategori'] = 'fakultas/form_individu';
        $data['form'] = 'registerPrestasi';
        $data['nama_jenis'] = $this->M_fakultas->dataJenis();
        $data['nama_tingkat'] = $this->M_fakultas->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_fakultas->dataJenisJuara();
        $data['name'] = $this->M_fakultas->dataUser();
        $data['nama_pembimbing'] = $this->M_fakultas->dataPembimbing();
        $data['nama_fakultas'] = $this->M_fakultas->dataFakultas();
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
            $this->load->view('fakultas/register_prestasi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_fakultas->saveRegisterPrestasi($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Ditambahkan'
            );
            redirect('PrestasiFakultas/daftarPrestasi');
        }
    }

    public function updateRegisterPrestasi($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Registrasi";
        $data['kategori'] = 'fakultas/form_update_individu';
        $data['form'] = 'updateRegisterPrestasi';
        $data['id_prestasi'] = $this->db->get_where('tb_prestasi', ['md5(id_prestasi)' => $id])->row_array();
        $data['nama_jenis'] = $this->M_fakultas->dataJenis();
        $data['nama_tingkat'] = $this->M_fakultas->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_fakultas->dataJenisJuara();
        $data['name'] = $this->M_fakultas->dataUser();
        $data['nama_pembimbing'] = $this->M_fakultas->dataPembimbing();
        $data['nama_fakultas'] = $this->M_fakultas->dataFakultas();
        $data['prestasi'] = $this->M_fakultas->getPrestasi($id);
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
            $this->load->view('fakultas/edit_register_prestasi', $data);
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

            $this->M_fakultas->saveUpdateRegisterPrestasi($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Diubah'
            );
            redirect('PrestasiFakultas/daftarPrestasi');
        }
    }

    public function registerkelompok()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Register Data Kelompok";
        $data['kategori'] = 'fakultas/form_kelompok';
        $data['form'] = 'registerkelompok';
        $data['nama_jenis'] = $this->M_fakultas->dataJenis();
        $data['nama_tingkat'] = $this->M_fakultas->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_fakultas->dataJenisJuara();
        $data['name'] = $this->M_fakultas->dataUser();
        $data['nama_pembimbing'] = $this->M_fakultas->dataPembimbing();
        $data['nama_fakultas'] = $this->M_fakultas->dataFakultas();
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
            $this->load->view('fakultas/register_prestasi', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $_POST['id_user'];
            $last_id = $this->M_fakultas->cekLastId();
            $id_prestasi = $last_id['id_prestasi'] + 1;
            $this->M_fakultas->saveRegisterKelompok($id_prestasi, $_POST);
            foreach ($id_user as $row) {
                $id_fakultas = $this->db->get_where('user', ['id_user' => $row])->row_array();
                $data_input = [
                    'id_prestasi' => $id_prestasi,
                    'id_user' => $row,
                    'id_fakultas' => $id_fakultas['id_fakultas']
                ];
                $this->M_fakultas->saveKelompok($data_input);
            }
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Ditambahkan'
            );
            redirect('PrestasiFakultas/daftarPrestasi');
        }
    }

    public function updateRegisterKelompok($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Registrasi";
        $data['kategori'] = 'fakultas/form_update_kelompok';
        $data['form'] = 'updateRegisterKelompok';
        $data['id_prestasi'] = $this->db->get_where('tb_prestasi', ['md5(id_prestasi)' => $id])->row_array();
        $data['nama_jenis'] = $this->M_fakultas->dataJenis();
        $data['nama_tingkat'] = $this->M_fakultas->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_fakultas->dataJenisJuara();
        $data['name'] = $this->M_fakultas->dataUser();
        $data['nama_pembimbing'] = $this->M_fakultas->dataPembimbing();
        $data['nama_fakultas'] = $this->M_fakultas->dataFakultas();
        $data['prestasi'] = $this->M_fakultas->getKelompok($id);
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
            $this->load->view('fakultas/edit_register_prestasi', $data);
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

            $this->M_fakultas->saveUpdateKelompok($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Diubah'
            );
            redirect('PrestasiFakultas/daftarPrestasi');
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
            $this->M_fakultas->deletePrestasi($key);
        }
        redirect('PrestasiFakultas/daftarPrestasi');
    }

    public function export()
    {
        $data['title'] = "Laporan Data Prestasi Mahasiswa";
        $export = $this->input->post('export');
        $data['exportdata']  = $this->M_fakultas->export($export);
        $this->load->view('fakultas/export', $data);
    }
}
