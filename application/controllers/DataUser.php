<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_fakultas');
        $this->load->model('M_admin');

        is_logged_in();
        is_fakultas();
    }

    function daftarUser()
    {
        $data['akun'] = $this->M_admin->getAkun();
        $data['title'] = "Data User";
        $config['base_url'] = site_url('DataUser/daftarUser');
        $data['nama_fakultas'] = $this->M_fakultas->dataFakultas();
        $data['role'] = $this->M_fakultas->dataRole();
        $data['users'] = $this->M_fakultas->dataUser();
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
            $this->load->view('fakultas/user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_fakultas->saveRegisterUser($_POST);
            $this->session->set_flashdata(
                'user',
                'Data Berhasil Ditambahkan'
            );
            redirect('DataUser/daftarUser');
        }
    }
    public function getUbahUser()
    {
        echo json_encode($this->M_fakultas->getUser($_POST['id_user']));
    }

    function getJurusan()
    {
        $id_fakultas = $this->input->post('id_fakultas');
        $data = $this->M_fakultas->getJurusan($id_fakultas);
        echo json_encode($data);
    }

    public function deleteUser($id_user)
    {
        $data['akun'] = $this->M_fakultas->deleteUser();

        if (md5($data['akun']['id_user']) != $id_user) {
            $this->db->where('md5(id_user)', $id_user);
            $data['user'] = $this->db->get('user')->row_array();

            $foto = $data['user']['image'];
            if ($foto != 'default.jpeg') {
                unlink(FCPATH . 'upload/profile' . $foto);
            }

            $where = array('md5(id_user)' => $id_user);
            $this->M_fakultas->deleteData($where, 'user');
            $this->session->set_flashdata('user', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Oops!</b> you can\'t delete your own account!</div>');
        }
        redirect('DataUser/daftarUser');
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
            $this->M_fakultas->saveUpdateRegisterUser($_POST);
            $this->session->set_flashdata(
                'user',
                'Data Berhasil Diubah'
            );
            redirect('DataUser/daftarUser');
        }
    }
}
