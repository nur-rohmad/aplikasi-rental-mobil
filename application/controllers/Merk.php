<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // model
        $this->load->model('m_mobil');
        // cek login
        if ($_SESSION['user'] == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Silahkan Login !</div>');
            redirect('auth/login');
        }
    }

    public function index()
    {

        $data = [
            'aktif' => 'mobil',
            'judul' => 'Data Merk',
            'data_merk' => $this->db->get('tbl_merk')->result_array(),
            'no' => 1
        ];
        $this->load->view('merk/index', $data);
    }

    // tambah
    public function tambah()
    {
        $this->form_validation->set_rules('merk', 'Nama Merek', 'required');

        // jika kondisi terpenuhi
        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'merk' => $this->input->post('merk', TRUE)
            ];
            if ($this->db->insert('tbl_merk', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data Behail  disimpan</div>');
                redirect('merk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Gagal  disimpan</div>');
                redirect('merk');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Gagal  disimpan! <br>' . validation_errors() . ' </div>');
            redirect('merk');
        }
    }
    // update
    public function update()
    {
        $this->form_validation->set_rules('id_merek', 'Nama Merek', 'required');
        $this->form_validation->set_rules('merk', 'Nama Merek', 'required');

        // jika kondisi terpenuhi
        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'merk' => $this->input->post('merk', TRUE)
            ];
            $where = [
                'id_merek' => $this->input->post('id_merek', TRUE)
            ];

            if ($this->db->update('tbl_merk', $data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data Behail  disimpan</div>');
                redirect('merk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Gagal  disimpan</div>');
                redirect('merk');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Gagal  disimpan! <br>' . validation_errors() . ' </div>');
            redirect('merk');
        }
    }

    // hapus
    public function hapus($id_merk)
    {
        $where = ['id_merek' => $id_merk];
        if ($this->db->delete('tbl_merk', $where)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Berhasil dihapus!</div>');
            redirect('merk');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal dihapus!</div>');
            redirect('merk');
        }
    }
}
