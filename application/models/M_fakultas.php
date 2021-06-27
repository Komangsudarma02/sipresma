<?php
class M_fakultas extends CI_Model
{
    function dataUser()
    {
        $this->db->join('user_role', 'user_role.id_role=user.id_role');
        $this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=user.id_fakultas');
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $data = $this->db->get('user')->result_array();
        return $data;
    }

    function dataJurusan()
    {
        $data = $this->db->get('tb_jurusan')->result_array();
        return $data;
    }

    function dataJenis()
    {
        $this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_jenis_prestasi.id_bidang');
        $data = $this->db->get('tb_jenis_prestasi')->result_array();
        return $data;
    }
    function dataTingkat()
    {
        $data = $this->db->get('tb_tingkat')->result_array();
        return $data;
    }
    function dataJenisJuara()
    {
        $data = $this->db->get('tb_jenis_juara')->result_array();
        return $data;
    }
    function dataRole()
    {
        $data = $this->db->get('user_role')->result_array();
        return $data;
    }

    function dataFakultas()
    {
        $this->db->where('id_fakultas', $this->session->userdata('id_fakultas'));
        $data = $this->db->get('tb_fakultas')->result_array();
        return $data;
    }

    function getJurusan($id_fakultas)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        $this->db->order_by('id_jurusan', 'ASC');
        return $this->db->from('tb_jurusan')
            ->get()
            ->result();
    }
    public function deleteUser()
    {
        $this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=user.id_fakultas');
        $this->db->where('email', $this->session->userdata('email'));
        return $this->db->get('user')->row_array();
    }

    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
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
        $this->db->set('is_active', $_POST['is_active']);
        $this->db->where('id_user', $_POST['id_user']);
        $this->db->update('user');
    }


    function dataPrestasi()
    {
        $array = [];
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_prestasi.id_pembimbing');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $this->db->where('tb_prestasi.validasi', 1);
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $individu = $this->db->get('tb_prestasi')->result_array();


        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_prestasi.id_pembimbing');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->join('tb_kelompok', 'tb_kelompok.id_prestasi=tb_prestasi.id_prestasi');
        $this->db->where('tb_kelompok.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.validasi', 1);
        $this->db->group_by('tb_kelompok.id_prestasi');
        $kelompok = $this->db->get('tb_prestasi')->result_array();

        array_push($array, $individu);
        array_push($array, $kelompok);
        return $array;
        // return array_push($individu, $kelompok);
    }

    function dataPrestasiBlmTervalidasi()
    {
        $array = [];
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_prestasi.id_pembimbing');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $this->db->where('tb_prestasi.validasi', 0);
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $individu = $this->db->get('tb_prestasi')->result_array();


        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_prestasi.id_pembimbing');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->join('tb_kelompok', 'tb_kelompok.id_prestasi=tb_prestasi.id_prestasi');
        $this->db->where('tb_kelompok.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->where('tb_prestasi.validasi', 0);
        $this->db->group_by('tb_kelompok.id_prestasi');
        $kelompok = $this->db->get('tb_prestasi')->result_array();

        array_push($array, $individu);
        array_push($array, $kelompok);
        return $array;
        // return array_push($individu, $kelompok);
    }

    public function validasiPrestasi()
    {
        $ids = $_POST['id_prestasi'];
        $this->db->set('validasi', 1);

        $this->db->where_in('id_prestasi', $ids);
        $this->db->update('tb_prestasi');
    }




    function dataPembimbing()
    {
        $data = $this->db->get('tb_pembimbing')->result_array();
        return $data;
    }

    public function deletePrestasi($key)
    {
        $this->db->where('id_prestasi', $key);
        $this->db->delete('tb_prestasi');
    }
    public function getNamaAnggota($id_prestasi)
    {
        $this->db->join('user', 'tb_kelompok.id_user=user.id_user');
        $this->db->join('tb_fakultas', 'tb_kelompok.id_fakultas=tb_fakultas.id_fakultas');
        $this->db->where('id_prestasi', $id_prestasi);
        return $this->db->get('tb_kelompok')->result_array();
    }

    function saveRegisterPrestasi($post)
    {
        $konfigurasi = array(
            'allowed_types' => 'pdf|doc|docx',
            'upload_path' => realpath('./upload/prestasi'),
            'remove_spaces' => true,
            'mod_mime_fix' => true,
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('prestasi');

        // $fileName = url_title($_FILES['prestasi']['name'], '_', false);
        $fileName = str_replace(" ", "_", $_FILES['prestasi']['name']);
        $data = array(
            'id_jenis' => $post['id_jenis'],
            'id_tingkat' => $post['id_tingkat'],
            'id_jenis_juara' => $post['id_jenis_juara'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'nama_kegiatan' => $post['nama_kegiatan'],
            'kota' => $post['kota'],
            'jml_dana' => $post['jml_dana'],
            'id_user' => $post['id_user'],
            'ket_prestasi' => $post['ket_prestasi'],
            'file_prestasi' => $fileName,
            'id_pembimbing' => $post['id_pembimbing'],
            'tahun' => $post['tahun'],
            'kepesertaan' => 'individu',
            'validasi' => 1

        );
        $this->db->insert('tb_prestasi', $data);
    }
    public function getPrestasi($id)
    {
        $this->db->where('md5(tb_prestasi.id_prestasi)', $id);
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_pembimbing.id_pembimbing');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->join('tb_fakultas', 'user.id_fakultas=tb_fakultas.id_fakultas');
        return $this->db->get('tb_prestasi')->row_array();
    }
    public function saveUpdateRegisterPrestasi()
    {
        $data = array(
            'id_jenis' => $_POST['id_jenis'],
            'id_tingkat' => $_POST['id_tingkat'],
            'id_jenis_juara' => $_POST['id_jenis_juara'],
            'tgl_mulai' => $_POST['tgl_mulai'],
            'tgl_selesai' => $_POST['tgl_selesai'],
            'nama_kegiatan' => $_POST['nama_kegiatan'],
            'kota' => $_POST['kota'],
            'jml_dana' => $_POST['jml_dana'],
            'id_user' => $_POST['id_user'],
            'ket_prestasi' => $_POST['ket_prestasi'],
            'id_pembimbing' => $_POST['id_pembimbing'],
            'tahun' => $_POST['tahun']

        );
        $this->db->where('id_prestasi', $_POST['id_prestasi']);
        $this->db->update('tb_prestasi', $data);
    }
    public function cekLastId()
    {
        $this->db->order_by('id_prestasi', 'DESC');
        return $this->db->get('tb_prestasi')->row_array();
    }
    public function getKelompok($id)
    {
        $this->db->where('md5(id_prestasi)', $id);
        $this->db->join('user', 'user.id_user=tb_kelompok.id_user');
        return $this->db->get('tb_kelompok')->result_array();
    }


    public function saveKelompok($data)
    {
        return $this->db->insert('tb_kelompok', $data);
    }
    function saveRegisterKelompok($id_prestasi, $post)
    {
        $konfigurasi = array(
            'allowed_types' => 'pdf|doc|docx',
            'upload_path' => realpath('./upload/prestasi'),
            'remove_spaces' => true,
            'mod_mime_fix' => true,
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload('prestasi');
        $id_user = $_POST['id_user'];
        $index = 0;
        // $fileName = url_title($_FILES['prestasi']['name'], '_', false);
        $fileName = str_replace(" ", "_", $_FILES['prestasi']['name']);
        $data = array(
            'id_prestasi' => $id_prestasi,
            'id_jenis' => $post['id_jenis'],
            'id_tingkat' => $post['id_tingkat'],
            'id_jenis_juara' => $post['id_jenis_juara'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'nama_kegiatan' => $post['nama_kegiatan'],
            'kota' => $post['kota'],
            'jml_dana' => $post['jml_dana'],
            'id_user' =>  $id_user[$index],
            'ket_prestasi' => $post['ket_prestasi'],
            'file_prestasi' => $fileName,
            'id_pembimbing' => $post['id_pembimbing'],
            'tahun' => $post['tahun'],
            'kepesertaan' => 'kelompok',
            'validasi' => 1

        );
        $this->db->insert('tb_prestasi', $data);
    }
    public function hapusKelompok($id)
    {
        $this->db->where('id_prestasi', $id);
        $this->db->delete('tb_kelompok');
    }
    public function saveUpdateKelompok()
    {
        $this->hapusKelompok($_POST['id_prestasi']);
        foreach ($_POST['id_user'] as $kelompok) {
            $id_fakultas = $this->db->get_where('user', ['id_user' => $kelompok])->row_array();
            $data_kelompok = [
                'id_prestasi' => $_POST['id_prestasi'],
                'id_user' => $kelompok,
                'id_fakultas' => $id_fakultas['id_fakultas']

            ];
            $this->saveKelompok($data_kelompok);
        }

        $data = array(
            'id_jenis' => $_POST['id_jenis'],
            'id_tingkat' => $_POST['id_tingkat'],
            'id_jenis_juara' => $_POST['id_jenis_juara'],
            'tgl_mulai' => $_POST['tgl_mulai'],
            'tgl_selesai' => $_POST['tgl_selesai'],
            'nama_kegiatan' => $_POST['nama_kegiatan'],
            'kota' => $_POST['kota'],
            'jml_dana' => $_POST['jml_dana'],
            'id_user' => $_POST['id_user'][0],
            'ket_prestasi' => $_POST['ket_prestasi'],
            'id_pembimbing' => $_POST['id_pembimbing'],
            'tahun' => $_POST['tahun']

        );
        $this->db->where('id_prestasi', $_POST['id_prestasi']);
        $this->db->update('tb_prestasi', $data);
    }

    function export($export)
    {
        $array = [];
        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_prestasi.id_pembimbing');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->join('tb_fakultas', 'user.id_fakultas=tb_fakultas.id_fakultas');
        $this->db->where('tb_prestasi.kepesertaan', 'individu');
        $this->db->where('user.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->like('tahun', $export);
        $individu = $this->db->get('tb_prestasi')->result_array();

        $this->db->join('tb_jenis_prestasi', 'tb_jenis_prestasi.id_jenis=tb_prestasi.id_jenis');
        $this->db->join('tb_tingkat', 'tb_tingkat.id_tingkat=tb_prestasi.id_tingkat');
        $this->db->join('tb_jenis_juara', 'tb_jenis_juara.id_jenis_juara=tb_prestasi.id_jenis_juara');
        $this->db->join('tb_pembimbing', 'tb_pembimbing.id_pembimbing=tb_prestasi.id_pembimbing');
        $this->db->join('user', 'user.id_user=tb_prestasi.id_user');
        $this->db->join('tb_kelompok', 'tb_kelompok.id_prestasi=tb_prestasi.id_prestasi');
        $this->db->join('tb_fakultas', 'tb_kelompok.id_fakultas=tb_fakultas.id_fakultas');
        $this->db->where('tb_kelompok.id_fakultas', $this->session->userdata('id_fakultas'));
        $this->db->group_by('tb_kelompok.id_prestasi');
        $this->db->like('tahun', $export);
        $kelompok = $this->db->get('tb_prestasi')->result_array();

        array_push($array, $individu);
        array_push($array, $kelompok);
        return $array;
        // return array_push($individu, $kelompok);
    }
}
