<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('Auth');
    }
    // else {
    //     $id_role = $ci->session->userdata('id_role');
    //     $menu = $ci->uri->segment(1);

    //     $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    //     $menu_id = $queryMenu['id'];

    //     $userAccess = $ci->db->get_where('user_access_menu', [
    //         'id_role' => $id_role,
    //         'menu_id' => $menu_id
    //     ]);

    //     if ($userAccess->num_rows() < 1) {
    //         redirect('Auth/blocked');
    //     }
    // }
}

function member_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('Auth');
    }
}

function check_access($id_role, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('id_role', $id_role);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function is_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        if ($ci->session->userdata('id_role') != 1) {
            redirect('Auth/blocked');
        }
    } else {
        redirect('Auth');
    }
}
function is_fakultas()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        if ($ci->session->userdata('id_role') != 3) {
            redirect('Auth/blocked');
        }
    } else {
        redirect('Auth');
    }
}
function is_member()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        if ($ci->session->userdata('id_role') != 2) {
            redirect('Auth/blocked');
        }
    } else {
        redirect('Auth');
    }
}
