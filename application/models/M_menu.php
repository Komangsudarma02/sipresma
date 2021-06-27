<?php
class M_menu extends CI_Model
{
    function data_menu()
    {
        $data = $this->db->get('user_menu')->result_array();
        return $data;
    }
    function getMenu($id_menu)
    {
        $this->db->where('id_menu=', $id_menu);
        $fakultas = $this->db->get('user_menu')->row_array();
        return $fakultas;
    }
    public function delete_menu($key)
    {
        $this->db->where('id_menu', $key);
        $this->db->delete('user_menu');
    }
    public function save_register_menu($post)
    {
        $data = array(
            'menu' => $post['menu']
        );
        $this->db->insert('user_menu', $data);
    }
    public function save_update_register_menu($post)
    {
        $data = array(
            'menu' => $post['menu']
        );
        $this->db->where('id_menu', $post['id_menu']);
        $this->db->update('user_menu', $data);
    }

    function data_submenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`id_menu` = `user_menu`.`id_menu`
        ";
        return $this->db->query($query)->result_array();
    }

    function getSubmenu($id_sub)
    {
        $this->db->where('id_sub', $id_sub);
        $jurusan = $this->db->get('user_sub_menu')->row_array();
        return $jurusan;
    }

    public function delete_submenu($key)
    {
        $this->db->where('id_sub', $key);
        $this->db->delete('user_sub_menu');
    }

    public function save_register_submenu($post)
    {
        $data = array(
            'title' => $post['title'],
            'id_menu' => $post['id_menu'],
            'url' => $post['url'],
            'icon' => $post['icon'],
            'is_active' => $post['is_active']

        );
        $this->db->insert('user_sub_menu', $data);
    }
    public function save_update_register_submenu($post)
    {
        $data = array(
            'title' => $post['title'],
            'id_menu' => $post['id_menu'],
            'url' => $post['url'],
            'icon' => $post['icon'],
            'is_active' => $post['is_active']
        );
        $this->db->where('id_sub', $post['id_sub']);
        $this->db->update('user_sub_menu', $data);
    }
}
