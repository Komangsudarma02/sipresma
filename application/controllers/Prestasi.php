<?php
defined('BASEPATH') or exit('NO direct script accses allowed');
class Prestasi extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_prestasi');
        $this->load->model('M_admin');
        $this->load->library('form_validation');
        is_logged_in();
        is_admin();
    }

    function daftarBidang()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Bidang Prestasi";
        $config['base_url'] = site_url('Prestasi/daftarBidang');
        $data['bidang'] = $this->M_prestasi->dataBidang();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required|trim|is_unique[tb_bidang.nama_bidang]', [
            'required' => 'Silahkan Masukan Nama Bidang!',
            'is_unique' => 'Nama Bidang Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prestasi/bidang', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->saveRegisterBidang($_POST);
            $this->session->set_flashdata(
                'bidang',
                'Data Berhasil Ditambahkan'
            );
            redirect('Prestasi/daftarBidang');
        }
    }
    public function getUbahBidang()
    {
        echo json_encode($this->M_prestasi->getBidang($_POST['id_bidang']));
    }
    public function deleteBidang()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_bidang', $key);
        $query = $this->db->get('tb_bidang');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->deleteBidang($key);
        }
        $this->session->set_flashdata(
            'bidang',
            'Data Berhasil Dihapus'
        );
        redirect('Prestasi/daftarBidang');
    }
    public function saveUpdateBidang()
    {
        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Bidang!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftarBidang();
        } else {
            $this->M_prestasi->saveUpdateRegisterBidang($_POST);
            $this->session->set_flashdata(
                'bidang',
                'Data Berhasil Diubah'
            );
            redirect('Prestasi/daftarBidang');
        }
    }

    function daftarJenis()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Jenis Prestasi";
        $config['base_url'] = site_url('Prestasi/daftarJenis');
        $data['jenis'] = $this->M_prestasi->dataJenis();
        $data['nama_bidang'] = $this->M_prestasi->dataBidang();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim|is_unique[tb_jenis_prestasi.nama_jenis]', [
            'required' => 'Silahkan Masukan Nama Jenis!',
            'is_unique' => 'Nama Jenis Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prestasi/jenis', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->saveRegisterJenis($_POST);
            $this->session->set_flashdata(
                'jenis',
                'Data Berhasil Ditambahkan'
            );
            redirect('Prestasi/daftarJenis');
        }
    }
    public function getUbahJenis()
    {
        echo json_encode($this->M_prestasi->getJenis($_POST['id_jenis']));
    }

    public function deleteJenis()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_jenis', $key);
        $query = $this->db->get('tb_jenis_prestasi');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->deleteJenis($key);
        }
        $this->session->set_flashdata(
            'jenis',
            'Data Berhasil Dihapus'
        );
        redirect('Prestasi/daftarJenis');
    }

    public function saveUpdateJenis()
    {
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Jenis!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftarJenis();
        } else {
            $this->M_prestasi->saveUpdateRegisterJenis($_POST);
            $this->session->set_flashdata(
                'jenis',
                'Data Berhasil Diubah'
            );
            redirect('Prestasi/daftarJenis');
        }
    }

    function daftarTingkat()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Tingkat Prestasi";
        $config['base_url'] = site_url('Prestasi/daftarTingkat');
        $data['tingkat'] = $this->M_prestasi->dataTingkat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_tingkat', 'Nama Tingkat', 'required|trim|is_unique[tb_tingkat.nama_tingkat]', [
            'required' => 'Silahkan Masukan Nama Tingkat!',
            'is_unique' => 'Nama Tingkat Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prestasi/tingkat', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->saveRegisterTingkat($_POST);
            $this->session->set_flashdata(
                'tingkat',
                'Data Berhasil Ditambahkan'
            );
            redirect('Prestasi/daftarTingkat');
        }
    }

    public function getUbahTingkat()
    {
        echo json_encode($this->M_prestasi->getTingkat($_POST['id_tingkat']));
    }


    public function deleteTingkat()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_tingkat', $key);
        $query = $this->db->get('tb_tingkat');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->deleteTingkat($key);
        }
        $this->session->set_flashdata(
            'tingkat',
            'Data Berhasil Dihapus'
        );
        redirect('Prestasi/daftarTingkat');
    }
    public function saveUpdateTingkat()
    {
        $this->form_validation->set_rules('nama_tingkat', 'Nama Tingkat', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Tingkat!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftarTingkat();
        } else {
            $this->M_prestasi->saveUpdateRegisterTingkat($_POST);
            $this->session->set_flashdata(
                'tingkat',
                'Data Berhasil Diubah'
            );
            redirect('Prestasi/daftarTingkat');
        }
    }

    function daftarJenisJuara()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Jenis Juara";
        $config['base_url'] = site_url('Prestasi/daftarJenisJuara');
        $data['jenis_juara'] = $this->M_prestasi->dataJenisJuara();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_jenis_juara', 'Nama Jenis Juara', 'required|trim|is_unique[tb_jenis_juara.nama_jenis_juara]', [
            'required' => 'Silahkan Masukan Nama Jenis Juara!',
            'is_unique' => 'Nama Jenis Juara Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prestasi/jenis_juara', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->saveRegisterJenisJuara($_POST);
            $this->session->set_flashdata(
                'juara',
                'Data Berhasil Ditambahkan'
            );
            redirect('Prestasi/daftarJenisJuara');
        }
    }


    public function getUbahJuara()
    {
        echo json_encode($this->M_prestasi->getJuara($_POST['id_jenis_juara']));
    }

    public function deleteJenisJuara()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_jenis_juara', $key);
        $query = $this->db->get('tb_jenis_juara');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->deleteJenisJuara($key);
        }
        $this->session->set_flashdata(
            'juara',
            'Data Berhasil Dihapus'
        );
        redirect('Prestasi/daftarJenisJuara');
    }
    public function saveUpdateJenisJuara()
    {
        $this->form_validation->set_rules('nama_jenis_juara', 'Nama Jenis Juara', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Jenis Juara!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftarJenisJuara();
        } else {
            $this->M_prestasi->saveUpdateRegisterJenisJuara($_POST);
            $this->session->set_flashdata(
                'juara',
                'Data Berhasil Diubah'
            );
            redirect('Prestasi/daftarJenisJuara');
        }
    }

    function daftarPrestasi()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Prestasi Mahasiswa";
        $config['base_url'] = site_url('Prestasi/daftarPrestasi');
        $data['prestasi'] = $this->M_prestasi->dataPrestasi();
        $data['kepesertaan'] = 'individu';
        $data['kepesertaan'] = 'kelompok';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prestasi/prestasi', $data);
        $this->load->view('templates/footer');
    }

    function detail($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Detail Data Prestasi";
        $data['prestasi'] = $this->M_prestasi->getPrestasi($id);
        $data['kepesertaan'] = 'individu';
        $data['kepesertaan'] = 'kelompok';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prestasi/detail_prestasi', $data);
        $this->load->view('templates/footer');
    }

    function registerPrestasi()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Register Data Prestasi Individu";
        $data['kategori'] = 'prestasi/form_individu';
        $data['form'] = 'registerPrestasi';
        $data['nama_jenis'] = $this->M_prestasi->dataJenis();
        $data['nama_tingkat'] = $this->M_prestasi->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_prestasi->dataJenisJuara();
        $data['name'] = $this->M_prestasi->dataUser();
        $data['nama_pembimbing'] = $this->M_prestasi->dataPembimbing();
        $data['nama_fakultas'] = $this->M_prestasi->dataFakultas();
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
            $this->load->view('prestasi/register_prestasi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_prestasi->saveRegisterPrestasi($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Ditambahkan'
            );
            redirect('Prestasi/daftarPrestasi');
        }
    }

    public function updateRegisterPrestasi($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Registrasi";
        $data['kategori'] = 'prestasi/form_update_individu';
        $data['form'] = 'updateRegisterPrestasi';
        $data['id_prestasi'] = $this->db->get_where('tb_prestasi', ['md5(id_prestasi)' => $id])->row_array();
        $data['nama_jenis'] = $this->M_prestasi->dataJenis();
        $data['nama_tingkat'] = $this->M_prestasi->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_prestasi->dataJenisJuara();
        $data['name'] = $this->M_prestasi->dataUser();
        $data['nama_pembimbing'] = $this->M_prestasi->dataPembimbing();
        $data['nama_fakultas'] = $this->M_prestasi->dataFakultas();
        $data['prestasi'] = $this->M_prestasi->getPrestasi($id);
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
            $this->load->view('prestasi/edit_register_prestasi', $data);
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

            $this->M_prestasi->saveUpdateRegisterPrestasi($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Diubah'
            );
            redirect('Prestasi/daftarPrestasi');
        }
    }

    public function registerkelompok()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Register Data Kelompok";
        $data['kategori'] = 'Prestasi/form_kelompok';
        $data['form'] = 'registerkelompok';
        $data['nama_jenis'] = $this->M_prestasi->dataJenis();
        $data['nama_tingkat'] = $this->M_prestasi->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_prestasi->dataJenisJuara();
        $data['name'] = $this->M_prestasi->dataUser();
        $data['nama_pembimbing'] = $this->M_prestasi->dataPembimbing();
        $data['nama_fakultas'] = $this->M_prestasi->dataFakultas();
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
            $this->load->view('prestasi/register_prestasi', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $_POST['id_user'];
            $last_id = $this->M_prestasi->cekLastId();
            $id_prestasi = $last_id['id_prestasi'] + 1;
            $this->M_prestasi->saveRegisterKelompok($id_prestasi, $_POST);
            foreach ($id_user as $row) {
                $id_fakultas = $this->db->get_where('user', ['id_user' => $row])->row_array();
                $data_input = [
                    'id_prestasi' => $id_prestasi,
                    'id_user' => $row,
                    'id_fakultas' => $id_fakultas['id_fakultas']
                ];
                $this->M_prestasi->saveKelompok($data_input);
            }
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Ditambahkan'
            );
            redirect('Prestasi/daftarPrestasi');
        }
    }
    public function updateRegisterKelompok($id)
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Registrasi";
        $data['kategori'] = 'prestasi/form_update_kelompok';
        $data['form'] = 'updateRegisterKelompok';
        $data['id_prestasi'] = $this->db->get_where('tb_prestasi', ['md5(id_prestasi)' => $id])->row_array();
        $data['nama_jenis'] = $this->M_prestasi->dataJenis();
        $data['nama_tingkat'] = $this->M_prestasi->dataTingkat();
        $data['nama_jenis_juara'] = $this->M_prestasi->dataJenisJuara();
        $data['name'] = $this->M_prestasi->dataUser();
        $data['nama_pembimbing'] = $this->M_prestasi->dataPembimbing();
        $data['nama_fakultas'] = $this->M_prestasi->dataFakultas();
        $data['prestasi'] = $this->M_prestasi->getKelompok($id);
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
            $this->load->view('prestasi/edit_register_prestasi', $data);
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

            $this->M_prestasi->saveUpdateKelompok($_POST);
            $this->session->set_flashdata(
                'prestasi',
                'Data Berhasil Diubah'
            );
            redirect('Prestasi/daftarPrestasi');
        }
    }

    public function deletePrestasi()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_prestasi', $key);
        $query = $this->db->get('tb_prestasi');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->deletePrestasi($key);
        }
        $this->session->set_flashdata(
            'prestasi',
            'Data Berhasil Dihapus'
        );
        redirect('Prestasi/daftarPrestasi');
    }
    public function findMahasiswa()
    {
        $q = $this->input->post("id_user");
        $sql = "select id_user as id, name as text from user where name like '%"  . $q . "%' order by id_user asc";
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



    public function deleteKelompok()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_prestasi', $key);
        $query = $this->db->get('tb_prestasi');
        if ($query->num_rows() > 0) {
            $this->M_prestasi->deletePrestasi($key);
        }
        $this->session->set_flashdata(
            'prestasi',
            'Data Berhasil Dihapus'
        );
        redirect('Prestasi/prestasiKelompok');
    }




    public function export()
    {
        $data['title'] = "Laporan Data Prestasi Mahasiswa";
        $export = $this->input->post('export');
        $data['exportdata']  = $this->M_prestasi->export($export);
        $this->load->view('prestasi/export', $data);
    }
}
