<?php
class M_data extends CI_Model
{
    function dataFakultas()
    {
        $this->db->order_by('id_fakultas', 'ASC');
        $data = $this->db->get('tb_fakultas')->result_array();
        return $data;
    }

    public function deleteFakultas($key)
    {
        $this->db->where('id_fakultas', $key);
        $this->db->delete('tb_fakultas');
    }

    function getFakultas($id_fakultas)
    {
        $this->db->where('id_fakultas=', $id_fakultas);
        $fakultas = $this->db->get('tb_fakultas')->row_array();
        return $fakultas;
    }
    public function saveRegisterFakultas($post)
    {
        $data = array(
            'nama_fakultas' => $post['nama_fakultas']
        );
        $this->db->insert('tb_fakultas', $data);
    }
    public function saveUpdateRegisterFakultas($post)
    {
        $data = array(
            'nama_fakultas' => $post['nama_fakultas']
        );
        $this->db->where('id_fakultas', $post['id_fakultas']);
        $this->db->update('tb_fakultas', $data);
    }

    function dataJurusan()
    {
        $this->db->order_by('id_jurusan', 'ASC');
        $this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=tb_jurusan.id_fakultas');
        $data = $this->db->get('tb_jurusan')->result_array();
        return $data;
    }
    function getJurusan($id_jurusan)
    {
        $this->db->where('id_jurusan', $id_jurusan);
        $jurusan = $this->db->get('tb_jurusan')->row_array();
        return $jurusan;
    }
    public function deleteJurusan($key)
    {
        $this->db->where('id_jurusan', $key);
        $this->db->delete('tb_jurusan');
    }

    public function saveRegisterJurusan($post)
    {
        $data = array(
            'nama_jurusan' => $post['nama_jurusan'],
            'id_fakultas' => $post['id_fakultas']
        );
        $this->db->insert('tb_jurusan', $data);
    }
    public function saveUpdateRegisterJurusan($post)
    {
        $data = array(
            'nama_jurusan' => $post['nama_jurusan'],
            'id_fakultas' => $post['id_fakultas']
        );
        $this->db->where('id_jurusan', $post['id_jurusan']);
        $this->db->update('tb_jurusan', $data);
    }

    function dataProdi()
    {
        $this->db->order_by('id_prodi', 'ASC');
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan=tb_prodi.id_jurusan');
        $data = $this->db->get('tb_prodi')->result_array();
        return $data;
    }
    function getProdi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $prodi = $this->db->get('tb_prodi')->row_array();
        return $prodi;
    }
    public function deleteProdi($key)
    {
        $this->db->where('id_prodi', $key);
        $this->db->delete('tb_prodi');
    }

    public function saveRegisterProdi($post)
    {
        $data = array(
            'nama_prodi' => $post['nama_prodi'],
            'id_jurusan' => $post['id_jurusan'],
            'jenjang' => $post['jenjang']
        );
        $this->db->insert('tb_prodi', $data);
    }
    public function saveUpdateRegisterProdi($post)
    {
        $data = array(
            'nama_prodi' => $post['nama_prodi'],
            'id_jurusan' => $post['id_jurusan'],
            'jenjang' => $post['jenjang']
        );
        $this->db->where('id_prodi', $post['id_prodi']);
        $this->db->update('tb_prodi', $data);
    }

    function dataPembimbing()
    {
        $this->db->order_by('id_pembimbing', 'ASC');
        $data = $this->db->get('tb_pembimbing')->result_array();
        return $data;
    }

    function getPembimbing($id_pembimbing)
    {
        $this->db->where('id_pembimbing', $id_pembimbing);
        $pembimbing = $this->db->get('tb_pembimbing')->row_array();
        return $pembimbing;
    }

    public function deletePembimbing($key)
    {
        $this->db->where('id_pembimbing', $key);
        $this->db->delete('tb_pembimbing');
    }
    public function saveRegisterPembimbing($post)
    {
        $data = array(
            'nip_pembimbing' => $post['nip_pembimbing'],
            'nama_pembimbing' => $post['nama_pembimbing']
        );
        $this->db->insert('tb_pembimbing', $data);
    }
    public function saveUpdateRegisterPembimbing($post)
    {
        $data = array(
            'nip_pembimbing' => $post['nip_pembimbing'],
            'nama_pembimbing' => $post['nama_pembimbing']
        );
        $this->db->where('id_pembimbing', $post['id_pembimbing']);
        $this->db->update('tb_pembimbing', $data);
    }



    /*function data_mahasiswa()
    {
        $this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
        $data = $this->db->get('tb_mahasiswa')->result_array();
        return $data;
    }

    public function delete_mahasiswa($key)
    {
        $this->db->where('id', $key);
        $this->db->delete('tb_mahasiswa');
    }
    public function save_register_mahasiswa($post)
    {
        $data = array(
            'nim' => $post['nim'],
            'nama' => $post['nama'],
            'id_prodi' => $post['id_prodi']
        );
        $this->db->insert('tb_mahasiswa', $data);
    }
    public function save_update_register_mahsiswa($post)
    {
        $data = array(
            'nim' => $post['nim'],
            'nama' => $post['nama'],
            'id_prodi' => $post['id_prodi']
        );
        $this->db->where('md5(id)', $post['id']);
        $this->db->update('tb_mahasiswa', $data);
    }*/





    function dataUser()
    {
        $this->db->order_by('id_user', 'ASC');
        $this->db->join('user_role', 'user_role.id_role=user.id_role');
        $this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=user.id_fakultas');
        $data = $this->db->get('user')->result_array();
        return $data;
    }

    function dataRole()
    {
        $data = $this->db->get('user_role')->result_array();
        return $data;
    }
    public function deleteUser($key)
    {
        $this->db->where('id_user', $key);
        $this->db->delete('user');
    }

    function getDataJurusan($id_fakultas)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        $this->db->order_by('id_jurusan', 'ASC');
        return $this->db->from('tb_jurusan')
            ->get()
            ->result();
    }
    function getUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $user = $this->db->get('user')->row_array();
        return $user;
    }
    function saveRegisterUser($post)
    {
        $konfigurasi = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./upload/profile')
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('user');

        if ($_FILES['user']['name'] == '') {
            $data = $this->db->set('image', "default.jpg");
        } else {
            $data = $this->db->set('image', $_FILES['user']['name']);
        }

        $data = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'id_fakultas' => $post['id_fakultas'],
            'id_jurusan' => $post['id_jurusan'],
            'id_role' => $post['id_role'],
            'is_active' => $post['is_active'],
            'date_created' => time()
        );
        $this->db->insert('user', $data);
    }

    public function saveUpdateRegisterUser()
    {
        $this->db->set('name', $_POST['name']);
        $this->db->where('id_user', $_POST['id_user']);
        $this->db->update('user');
    }
}
