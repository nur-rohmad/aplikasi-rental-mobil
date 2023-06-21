<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // load model
        $this->load->model('m_mobil');
    }
    public function index()
    {

        $data = [
            'data_mobil' => $this->m_mobil->get_mobil(),
        ];
        $this->load->view('homepage', $data);
    }

    // login
    public function login()
    {
        $this->form_validation->set_rules('username', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('tbl_akun', [
                'username' => $username,
                'deleted_at' => null
            ])->row_array();
            //jika usernya ada
            if ($user) {
                //jika usernya aktif
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id'],
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'photo' => $user['foto'],
                        'waktu' => date('d M Y H:i:s')
                    ];
                    $this->session->set_userdata('user', $data);
                    //cek role dan mengarahkan ke view yang mana
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah!</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                User Name Belum Terdaftar</div>');
                redirect('auth/login');
            }
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|is_unique[tbl_akun.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('register');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'username' => $this->input->post('username', true),
                'role' => 'pengguna',
                'foto' => 'default.png',
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
            ];
            // data pemesan
            $this->db->insert('tbl_akun', $data);
            $user_id_max = $this->db->query("SELECT max(id) as 'last_id' FROM tbl_akun")->row_array();
            $data_pemesan = [
                'id_user' =>  $user_id_max['last_id'],
                'nama_pemesan' => $this->input->post('nama', true),
                'foto' => 'default.png',
            ];
            $this->db->insert('tbl_pemesan', $data_pemesan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Registrasi Akun Sudah Berhasil!</div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Anda Berhasil Logout!</div>');
        redirect('auth/login');
    }
}
