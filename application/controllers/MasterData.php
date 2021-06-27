<?php
defined('BASEPATH') or exit('NO direct script accses allowed');
class MasterData extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->model('M_admin');
        $this->load->library('form_validation');
        is_logged_in();
        is_admin();
    }

    function daftarFakultas()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Fakultas";
        $config['base_url'] = site_url('MasterData/daftarFakultas');
        $data['fakultas'] = $this->M_data->dataFakultas();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required|trim|is_unique[tb_fakultas.nama_fakultas]', [
            'required' => 'Silahkan Masukan Nama Fakultas!',
            'is_unique' => 'Nama Fakuktas Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/fakultas', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->saveRegisterFakultas($_POST);
            $this->session->set_flashdata(
                'fakultas',
                'Data Berhasil Ditambahkan'
            );
            redirect('MasterData/daftarFakultas');
        }
    }

    public function getUbahFakultas()
    {
        echo json_encode($this->M_data->getFakultas($_POST['id_fakultas']));
    }

    public function deleteFakultas()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_fakultas', $key);
        $query = $this->db->get('tb_fakultas');
        if ($query->num_rows() > 0) {
            $this->M_data->deleteFakultas($key);
        }
        $this->session->set_flashdata(
            'fakultas',
            'Data Berhasil Dihapus'
        );
        redirect('MasterData/daftarFakultas');
    }

    public function saveUpdateFakultas()
    {
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Fakultas!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftarFakultas();
        } else {

            $this->M_data->saveUpdateRegisterFakultas($_POST);
            $this->session->set_flashdata(
                'fakultas',
                'Data Berhasil Diubah'
            );
            redirect('MasterData/daftarFakultas');
        }
    }

    function daftarJurusan()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Jurusan";
        $config['base_url'] = site_url('MasterData/daftarJurusan');
        $data['jurusan'] = $this->M_data->dataJurusan();
        $data['nama_fakultas'] = $this->M_data->dataFakultas();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|trim|is_unique[tb_jurusan.nama_jurusan]', [
            'required' => 'Silahkan Masukan Nama Jurusan!',
            'is_unique' => 'Nama Jurusan Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/jurusan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->saveRegisterJurusan($_POST);
            $this->session->set_flashdata(
                'jurusan',
                'Data Berhasil Ditambahkan'
            );
            redirect('MasterData/daftarJurusan');
        }
    }

    public function getUbahJurusan()
    {
        echo json_encode($this->M_data->getJurusan($_POST['id_jurusan']));
    }

    public function deleteJurusan()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_jurusan', $key);
        $query = $this->db->get('tb_jurusan');
        if ($query->num_rows() > 0) {
            $this->M_data->deleteJurusan($key);
        }
        $this->session->set_flashdata(
            'jurusan',
            'Data Berhasil Dihapus'
        );
        redirect('MasterData/daftarJurusan');
    }

    public function saveUpdateJurusan()
    {
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Jurusan!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftarJurusan();
        } else {

            $this->M_data->saveUpdateRegisterJurusan($_POST);
            $this->session->set_flashdata(
                'jurusan',
                'Data Berhasil Diubah'
            );
            redirect('MasterData/daftarJurusan');
        }
    }

    function daftarProdi()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Prodi";
        $config['base_url'] = site_url('MasterData/daftarProdi');
        $data['prodi'] = $this->M_data->dataProdi();
        $data['nama_jurusan'] = $this->M_data->dataJurusan();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim|is_unique[tb_prodi.nama_prodi]', [
            'required' => 'Silahkan Masukan Nama Prodi!',
            'is_unique' => 'Nama Prodi Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->saveRegisterProdi($_POST);
            $this->session->set_flashdata(
                'prodi',
                'Data Berhasil Ditambahkan'
            );
            redirect('MasterData/daftarProdi');
        }
    }

    public function getUbahProdi()
    {
        echo json_encode($this->M_data->getProdi($_POST['id_prodi']));
    }

    public function deleteProdi()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_prodi', $key);
        $query = $this->db->get('tb_prodi');
        if ($query->num_rows() > 0) {
            $this->M_data->deleteProdi($key);
        }
        $this->session->set_flashdata(
            'prodi',
            'Data Berhasil Dihapus'
        );
        redirect('MasterData/daftarProdi');
    }

    public function saveUpdateProdi()
    {
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Prodi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftarProdi();
        } else {
            $this->M_data->saveUpdateRegisterProdi($_POST);
            $this->session->set_flashdata(
                'prodi',
                'Data Berhasil Diubah'
            );
            redirect('MasterData/daftarProdi');
        }
    }

    function daftarPembimbing()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data Pembimbing";
        $config['base_url'] = site_url('MasterData/daftarPembimbing');
        $data['pembimbing'] = $this->M_data->dataPembimbing();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_pembimbing', 'Nama Pembimbing', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Pembimbing!'
        ]);
        $this->form_validation->set_rules('nip_pembimbing', 'NIP Pembimbing', 'required|trim|min_length[18]', [
            'required' => 'Silahkan Masukan NIP Pembimbimng !',
            'min_length' => 'NIP Pembimbimng Terlalu pendek !'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/pembimbing', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->saveRegisterPembimbing($_POST);
            $this->session->set_flashdata(
                'pembimbing',
                'Data Berhasil Ditambahkan'
            );
            redirect('MasterData/daftarPembimbing');
        }
    }

    public function getUbahPembimbing()
    {
        echo json_encode($this->M_data->getPembimbing($_POST['id_pembimbing']));
    }


    public function deletePembimbing()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_pembimbing', $key);
        $query = $this->db->get('tb_pembimbing');
        if ($query->num_rows() > 0) {
            $this->M_data->deletePembimbing($key);
        }
        $this->session->set_flashdata(
            'pembimbing',
            'Data Berhasil Dihapus'
        );
        redirect('MasterData/daftarPembimbing');
    }

    public function saveUpdatePembimbing()
    {
        $this->form_validation->set_rules('nama_pembimbing', 'Nama Pembimbing', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Pembimbing!'
        ]);
        $this->form_validation->set_rules('nip_pembimbing', 'NIP Pembimbing', 'required|trim', [
            'required' => 'Silahkan Masukan NIP Pembimbimng !'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftarPembimbing();
        } else {
            $this->M_data->saveUpdateRegisterPembimbing($_POST);
            $this->session->set_flashdata(
                'pembimbing',
                'Data Berhasil Diubah'
            );
            redirect('MasterData/daftarPembimbing');
        }
    }


    function daftarUser()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data User";
        $config['base_url'] = site_url('MasterData/daftarUser');
        $data['nama_fakultas'] = $this->M_data->dataFakultas();
        $data['role'] = $this->M_data->dataRole();
        $data['users'] = $this->M_data->dataUser();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('name', 'Nama User', 'required|trim', [
            'required' => 'Silahkan Masukan Nama User!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('masterdata/user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_data->saveRegisterUser($_POST);
            $this->session->set_flashdata(
                'user',
                'Data Berhasil Ditambahkan'
            );
            redirect('MasterData/daftarUser');
        }
    }

    public function getUbahUser()
    {
        echo json_encode($this->M_data->getUser($_POST['id_user']));
    }

    function getJurusan()
    {
        $id_fakultas = $this->input->post('id_fakultas');
        $data = $this->M_data->getDataJurusan($id_fakultas);
        echo json_encode($data);
    }



    public function deleteUser()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_user', $key);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            $this->M_data->deleteUser($key);
        }
        $this->session->set_flashdata(
            'user',
            'Data Berhasil Dihapus'
        );
        redirect('MasterData/daftarUser');
    }
    public function saveUpdateUser()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->daftarUser();
        } else {
            $upload_image = $_FILES['user']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'JPG|JPEG|jpg|jpeg|png|gif|ico';
                // $config['max_size'] = '2048';
                $config['upload_path'] = './upload/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('user')) {
                    $old_image = $_POST['old_image'];
                    // print_r($old_image);
                    // die;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'upload/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->M_data->saveUpdateRegisterUser($_POST);
            $this->session->set_flashdata(
                'user',
                'Data Berhasil Diubah'
            );
            redirect('MasterData/daftarUser');
        }
    }
}
