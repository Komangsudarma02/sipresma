<?php
class M_admin extends CI_Model
{
    public function getAkun()
    {
        $this->db->where('email', $this->session->userdata('email'));
        return $this->db->get('user')->row_array();
    }
    function data_role()
    {
        $data = $this->db->get('user_role')->result_array();
        return $data;
    }
    function data_fakultas()
    {
        $data = $this->db->get('tb_fakultas')->result_array();
        return $data;
    }

    function data_jurusan($id_fakultas)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        $this->db->order_by('id_jurusan', 'ASC');
        return $this->db->from('tb_jurusan')
            ->get()
            ->result();
    }

    public function delete_role($key)
    {
        $this->db->where('id_role', $key);
        $this->db->delete('user_role');
    }

    function getRole($id_role)
    {
        $this->db->where('id_role', $id_role);
        $fakultas = $this->db->get('user_role')->row_array();
        return $fakultas;
    }
    public function save_register_role($post)
    {
        $data = array(
            'role' => $post['role']
        );
        $this->db->insert('user_role', $data);
    }
    public function save_update_register_role($post)
    {
        $data = array(
            'role' => $post['role']
        );
        $this->db->where('id_role', $post['id_role']);
        $this->db->update('user_role', $data);
    }



    public function countPrestasi($id_fakultas)
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', $id_fakultas);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', $id_fakultas);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }

    public function countFTK()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', 1);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', 1);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }

    public function countFMIPA()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', 2);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', 2);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }

    public function countFE()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', 3);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', 3);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }

    public function countFIP()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', 4);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', 4);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }

    public function countFBS()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', 5);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', 5);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }

    public function countFOK()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', 6);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', 6);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }

    public function countFHIS()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', 7);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', 7);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }

    public function countFK()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', 8);
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', 8);
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }
    public function countJenisJuara()
    {
        $this->db->select('COUNT(id_prestasi) AS jumlah');
        $this->db->select('nama_jenis_juara');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->group_by('tb_prestasi.id_jenis_juara');
        $this->db->order_by('tb_prestasi.id_jenis_juara', 'ASC');
        $this->db->where('tahun', date('Y'));
        return $this->db->get('tb_prestasi')->result_array();
    }

    public function countTingkat()
    {
        $this->db->select('COUNT(id_prestasi) AS jumlah');
        $this->db->select('nama_tingkat');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->group_by('tb_prestasi.id_tingkat');
        $this->db->order_by('tb_prestasi.id_tingkat', 'ASC');
        $this->db->where('tahun', date('Y'));
        return $this->db->get('tb_prestasi')->result_array();
    }

    public function countJenis()
    {
        $this->db->select('COUNT(id_prestasi) AS jumlah');
        $this->db->select('nama_jenis');
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->group_by('tb_prestasi.id_jenis');
        $this->db->order_by('tb_prestasi.id_jenis', 'ASC');
        $this->db->where('tahun', date('Y'));
        return $this->db->get('tb_prestasi')->result_array();
    }
}
