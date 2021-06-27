<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_menu');

        is_logged_in();
    }
    function daftar_menu()
    {
        $data['title'] = "Menu Management";
        $config['base_url'] = site_url('Menu/daftar_menu');
        $data['menu'] = $this->M_menu->data_menu();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('menu', 'Nama Menu', 'required|trim|is_unique[user_menu.menu]', [
            'required' => 'Silahkan Masukan Nama Menu!',
            'is_unique' => 'Nama Menu Sudah Ada!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/menu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_menu->save_register_menu($_POST);
            $this->session->set_flashdata(
                'menu',
                'Data Berhasil Ditambahkan'
            );
            redirect('Menu/daftar_menu');
        }
    }


    public function getUbahMenu()
    {
        echo json_encode($this->M_menu->getMenu($_POST['id_menu']));
    }



    function register_menu()
    {
        $data['title'] = "Register Data Menu";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/register_menu', $data);
        $this->load->view('templates/footer');
    }

    public function delete_menu()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_menu', $key);
        $query = $this->db->get('user_menu');
        if ($query->num_rows() > 0) {
            $this->M_menu->delete_menu($key);
        }
        $this->session->set_flashdata(
            'menu',
            'Data Berhasil Dihapus'
        );
        redirect('menu/daftar_menu');
    }

    public function save_update_menu()
    {
        $this->form_validation->set_rules('menu', 'Nama Menu', 'required|trim', [
            'required' => 'Silahkan Masukan Nama Menu!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->daftar_menu();
        } else {

            $this->M_menu->save_update_register_menu($_POST);
            $this->session->set_flashdata(
                'user',
                'Data Berhasil Diubah'
            );
            redirect('Menu/daftar_menu');
        }
    }

    public function submenu()
    {
        $data['title'] = "Submenu Management";
        $config['base_url'] = site_url('Menu/submenu');
        $data['submenu'] = $this->M_menu->data_submenu();
        $data['menu'] = $this->M_menu->data_menu();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('title', 'Title', 'required|trim', [
            'required' => 'Silahkan Masukan Title!'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required|trim', [
            'required' => 'Silahkan Masukan Url!'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim', [
            'required' => 'Silahkan Masukan Icon!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_menu->save_register_submenu($_POST);
            $this->session->set_flashdata(
                'sub',
                'Data Berhasil Ditambahkan'
            );
            redirect('Menu/submenu');
        }
    }

    public function getUbahSubmenu()
    {
        echo json_encode($this->M_menu->getSubmenu($_POST['id_sub']));
    }

    public function delete_submenu()
    {

        $key = $this->uri->segment(3);
        $this->db->where('id_sub', $key);
        $query = $this->db->get('user_sub_menu');
        if ($query->num_rows() > 0) {
            $this->M_menu->delete_submenu($key);
        }
        $this->session->set_flashdata(
            'sub',
            'Data Berhasil Dihapus'
        );
        redirect('menu/submenu');
    }


    public function save_update_submenu()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim', [
            'required' => 'Silahkan Masukan Title!'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required|trim', [
            'required' => 'Silahkan Masukan Url!'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim', [
            'required' => 'Silahkan Masukan Icon!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->submenu();
        } else {

            $this->M_menu->save_update_register_submenu($_POST);
            $this->session->set_flashdata(
                'sub',
                'Data Berhasil Diubah'
            );
            redirect('Menu/submenu');
        }
    }
}
