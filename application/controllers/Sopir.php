<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sopir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // load model
        $this->load->model('m_mobil');
        $this->load->model('m_pemesan');
    }

    public function index()
    {
        $data = [
            'aktif' => 'Sopir',
            'judul' => 'sopir',
            'no' => '1',
            'data_sopir' => $this->db->get('tbl_sopir')->result_array()
        ];

        $this->load->view('sopir/index', $data);
    }



    public function tambah()
    {
        // set rules
        $this->form_validation->set_rules('nama_sopir', 'Nama Sopir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');

        // jika kondisi tidak terpenuhi
        if ($this->form_validation->run() !== FALSE) {
            $id = $this->m_pemesan->get_new_id_sopir();
            $data = [
                'id_sopir' => $id,
                'nama_sopir' => $this->input->post('nama_sopir', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat_sopir' => $this->input->post('alamat', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
            ];

            if ($_FILES['foto_sopir']['size'] != 0) {
                $config['upload_path']          = './uploads/sopir/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = "sp-" . $id . "-" . time();

                $this->load->library('upload', $config, 'foto_profil');
                $this->foto_profil->initialize($config);
                if (!$this->foto_profil->do_upload('foto_sopir')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                    redirect('sopir');
                } else {
                    $data['foto_sopir'] = $this->foto_profil->data("file_name");
                }
            }

            if ($_FILES['foto_ktp']['size'] != 0) {
                $config2['upload_path']          = './uploads/sopir/foto_ktp/';
                $config2['allowed_types']        = 'gif|jpg|png';
                $config2['file_name']            = "ktp-" . $id . "-" . time();

                $this->load->library('upload', $config2, 'foto_ktp');
                $this->foto_ktp->initialize($config2);
                if (!$this->foto_ktp->do_upload('foto_ktp')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                    redirect('pemesan');
                } else {
                    $data['foto_ktp'] = $this->foto_ktp->data("file_name");
                }
            }



            if ($this->db->insert('tbl_sopir', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data Berhasil disimpan!</div>');
                redirect('sopir');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan!</div>');
                redirect('sopir');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan!
                <ul><li>' . validation_errors() . '</li></ul>
               </div>');
            redirect('sopir');
        }
    }

    // ubah data
    public function ubah($id_sopir)
    {
        // set rules
        $this->form_validation->set_rules('nama_sopir', 'Nama Sopir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');

        // jika kondisi tidak terpenuhi
        if ($this->form_validation->run() !== FALSE) {
            $data_old = $this->db->get_where('tbl_sopir', ['id_sopir' => $id_sopir])->row_array();
            $data = [
                'nama_sopir' => $this->input->post('nama_sopir', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat_sopir' => $this->input->post('alamat', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
            ];
            if ($_FILES['foto_sopir']['size'] != 0) {
                $config['upload_path']          = './uploads/sopir/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = "sp-" . $id_sopir . "-" . time();

                $this->load->library('upload', $config, 'foto_profil');
                $this->foto_profil->initialize($config);
                if (!$this->foto_profil->do_upload('foto_sopir')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                    redirect('sopir');
                } else {
                    $data['foto_sopir'] = $this->foto_profil->data("file_name");
                    unlink('./uploads/sopir/' . $data_old['foto_sopir']);
                }
            }
            if ($_FILES['foto_ktp']['size'] != 0) {
                $config2['upload_path']          = './uploads/sopir/foto_ktp/';
                $config2['allowed_types']        = 'gif|jpg|png';
                $config2['file_name']            = "ktp-" . $id_sopir . "-" . time();

                $this->load->library('upload', $config2, 'foto_ktp');
                $this->foto_ktp->initialize($config2);
                if (!$this->foto_ktp->do_upload('foto_ktp')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                    redirect('pemesan');
                } else {
                    $data['foto_ktp'] = $this->foto_ktp->data("file_name");
                }
            }
            $where = ['id_sopir' => $id_sopir];
            if ($this->db->update('tbl_sopir', $data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data berhasil disimpan!</div>');
                redirect('sopir');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan!</div>');
                redirect('pemesan/ubah/' . $id_sopir);
            }
        } else {

            $data = [
                'aktif' => 'Sopir',
                'judul' => 'Edit Sopir',
                'no' => '1',
                'sopir' => $this->db->get_where('tbl_sopir', ['id_sopir' => $id_sopir])->row_array()
            ];

            $this->load->view('sopir/ubah', $data);
        }
    }

    // hapus
    public function hapus($id_sopir)
    {
        $where = ['id_sopir' => $id_sopir];
        $data_old = $this->db->get_where('tbl_sopir', ['id_sopir' => $id_sopir])->row_array();
        if ($this->db->delete('tbl_sopir', $where)) {
            unlink('./uploads/sopir/' . $data_old['foto_sopir']);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Berhasil dihapus!</div>');
            redirect('sopir');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal dihapus!</div>');
            redirect('sopir');
        }
    }
}
