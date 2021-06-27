<?php
class M_dashboard extends CI_Model
{
    function data_role()
    {
        $data = $this->db->get('user_role')->result_array();
        return $data;
    }

    public function countUser()
    {
        $this->db->where('id_fakultas', $this->session->userdata('id_fakultas'));
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function countPrestasi()
    {
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $individu = $this->db->get('tb_prestasi');
        if ($individu->num_rows() > 0) {
            $num_individu = $individu->num_rows();
        } else {
            $num_individu = 0;
        }

        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        $this->db->where('tb_kelompok.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->group_by('id_prestasi');
        $query = $this->db->get('tb_kelompok');
        if ($query->num_rows() > 0) {
            $num_kelompok = $query->num_rows();
        } else {
            $num_kelompok = 0;
        }

        return $total = $num_individu + $num_kelompok;
    }


    public function countPrestasiMahasiswa()
    {
        $this->db->select('COUNT(id_prestasi) AS jumlah');
        $this->db->select('tahun');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('tb_prestasi')->result_array();
    }
    public function countPrestasiMahasiswaKelompok()
    {

        $this->db->select('COUNT(tb_prestasi.id_prestasi) AS jumlah');
        $this->db->select('tahun');
        $this->db->join('tb_kelompok', 'tb_kelompok.id_prestasi=tb_prestasi.id_prestasi');
        $this->db->where('tb_kelompok.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'kelompok');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('tb_prestasi')->result_array();
    }

    public function countJenisJuara()
    {
        $this->db->select('COUNT(tb_prestasi.id_prestasi) AS jumlah');
        $this->db->select('nama_jenis_juara');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->group_by('tb_prestasi.id_jenis_juara');
        $this->db->order_by('tb_prestasi.id_jenis_juara', 'ASC');
        return $this->db->get('tb_prestasi')->result_array();
    }
    public function countJenisJuaraKelompok()
    {
        $this->db->select('COUNT(tb_prestasi.id_prestasi) AS jumlah');
        $this->db->select('nama_jenis_juara');
        $this->db->join('tb_kelompok', 'tb_kelompok.id_prestasi=tb_prestasi.id_prestasi');
        $this->db->where('tb_kelompok.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'kelompok');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->group_by('tb_prestasi.id_jenis_juara');
        $this->db->order_by('tb_prestasi.id_jenis_juara', 'ASC');
        return $this->db->get('tb_prestasi')->result_array();
    }

    public function countTingkat()
    {
        $this->db->select('COUNT(tb_prestasi.id_prestasi) AS jumlah');
        $this->db->select('nama_tingkat');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->group_by('tb_prestasi.id_tingkat');
        $this->db->order_by('tb_prestasi.id_tingkat', 'ASC');
        return $this->db->get('tb_prestasi')->result_array();
    }
    public function countTingkatKelompok()
    {
        $this->db->select('COUNT(tb_prestasi.id_prestasi) AS jumlah');
        $this->db->select('nama_tingkat');
        $this->db->join('tb_kelompok', 'tb_kelompok.id_prestasi=tb_prestasi.id_prestasi');
        $this->db->where('tb_kelompok.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'kelompok');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->group_by('tb_prestasi.id_tingkat');
        $this->db->order_by('tb_prestasi.id_tingkat', 'ASC');
        return $this->db->get('tb_prestasi')->result_array();
    }

    public function countJenis()
    {
        $this->db->select('COUNT(tb_prestasi.id_prestasi) AS jumlah');
        $this->db->select('nama_jenis');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->group_by('tb_prestasi.id_jenis');
        $this->db->order_by('tb_prestasi.id_jenis', 'ASC');
        return $this->db->get('tb_prestasi')->result_array();
    }
    public function countJenisKelompok()
    {
        $this->db->select('COUNT(tb_prestasi.id_prestasi) AS jumlah');
        $this->db->select('nama_jenis');
        $this->db->join('tb_kelompok', 'tb_kelompok.id_prestasi=tb_prestasi.id_prestasi');
        $this->db->where('tb_kelompok.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.kepesertaan', 'kelompok');
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->group_by('tb_prestasi.id_jenis');
        $this->db->order_by('tb_prestasi.id_jenis', 'ASC');
        return $this->db->get('tb_prestasi')->result_array();
    }
}
