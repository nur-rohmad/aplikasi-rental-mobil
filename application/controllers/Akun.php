<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // load model
        $this->load->model('m_pemesan');
        // cek user
        if ($_SESSION['user'] == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Silahkan Login !</div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data = [
            'aktif' => 'akun',
            'judul' => 'Data Akun',
            'data_akun' => $this->db->get_where('tbl_akun', ['deleted_at' => NULL])->result_array(),
            'no' => 1
        ];
        $this->load->view('akun/index', $data);
    }

    // tambah 
    public function tambah()
    {
        // set rule
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|is_unique[tbl_akun.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');

        // jika kondisi terpenuhi
        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'role' => $this->input->post('role', TRUE),
                'foto' => 'default.png',
            ];
            if ($this->db->insert('tbl_akun', $data)) {
                if ($this->input->post('role', TRUE) == 'pengguna') {
                    $user_id_max = $this->db->query("SELECT max(id) as 'last_id' FROM tbl_akun")->row_array();
                    $data_pemesan = [
                        'id_user' =>  $user_id_max['last_id'],
                        'nama_pemesan' => $this->input->post('nama', TRUE),
                        'foto' => 'default.png',
                    ];
                    if ($this->m_pemesan->insert($data_pemesan)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun Berhasil Ditambahkan!</div>');
                        redirect('akun');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Akun Gagal Ditambahkan!</div>');
                        redirect('akun');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun Berhasil Ditambahkan!</div>');
                    redirect('akun');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Akun Gagal Ditambahkan!</div>');
                redirect('akun');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Akun Gagal Ditambahkan!
                <ul><li>' . validation_errors() . '</li></ul>
            </div>');
            redirect('akun');
        }
    }

    public function ubah($id_akun)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');

        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'role' => $this->input->post('role', TRUE),
            ];
            if ($this->input->post('password', TRUE) != null) {
                $data['password'] =  password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT);
            }
            $where = ['id' => $id_akun];
            if ($this->db->update('tbl_akun', $data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun Berhasil DiEdit!</div>');
                redirect('akun');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Akun Berhasil DiEdit!</div>');
                redirect('akun');
            }
        } else {
            echo validation_errors();
            $data = [
                'aktif' => 'akun',
                'judul' => 'Edit Akun',
                'data_akun' => $this->db->get_where('tbl_akun', ['id' => $id_akun])->row_array(),
                'no' => 1
            ];
            $this->load->view('akun/ubah', $data);
        }
    }


    // hapus
    public function hapus($id_akun)
    {
        $where = ['id' => $id_akun];
        $data = ['deleted_at' => date("Y-m-d H:i:s")];
        if ($this->db->update('tbl_akun', $data, $where)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Berhasil dihapus!</div>');
            redirect('akun');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal dihapus!</div>');
            redirect('akun');
        }
    }
}
