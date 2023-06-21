<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // load model
        $this->load->model('m_pemesan');
    }
    public function index()
    {
        $data = [
            'aktif' => 'dashboard',
            'judul' => 'Pemesan',
            'no' => '1',
        ];
        if ($_SESSION['user']['role'] == 'admin') {
            $data['data_pemesan'] =  $this->m_pemesan->get_pemesan();
            $this->load->view('pemesan/index', $data);
        } else {
            // $data['data_pesanan'] =  $this->m_pesanan->get_all();
            $data['pemesan'] = $this->m_pemesan->get_pemesan_by_user_id($_SESSION['user']['id_user']);
            $this->load->view('pemesan/informasi_pemesan', $data);
        }
    }

    // updete pemesan
    public function update()
    {
        $this->form_validation->set_rules('id_pemesan', 'ID Pemesan', 'required');
        $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamain', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Kelamain', 'required');

        // kondisi jika rules terpenuhi
        if ($this->form_validation->run() !== false) {
            // data yang diupdate
            $data = [
                'nama_pemesan' => $this->input->post('nama_pemesan', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
            ];
            if (
                $_FILES['foto_ktp']['size'] != 0
            ) {
                $config2['upload_path']          = './uploads/pemesan/foto_ktp/';
                $config2['allowed_types']        = 'gif|jpg|png';
                $config2['file_name']            = "ktp-" . $this->input->post('id_pemesan', true) . "-" . time();

                $this->load->library(
                    'upload',
                    $config2,
                    'foto_ktp'
                );
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
            if ($_FILES['foto']['size'] != 0) {
                $config['upload_path']          = './uploads/pemesan/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = $this->input->post('id_pemesan', true) . "-" . time();

                $this->load->library('upload', $config, 'foto_profil');
                $this->foto_profil->initialize($config);
                if (!$this->foto_profil->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                    redirect('pemesan');
                } else {
                    $data['foto'] = $this->foto_profil->data("file_name");
                }
            }
            // where
            $where = ['id' => $this->input->post('id_pemesan', true)];

            if ($this->m_pemesan->Update($data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data Berhasil disimpan!</div>');
                redirect('pemesan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan!</div>');
                redirect('pemesan');
            }
        }
    }

    // tambah pemesan
    public function tambah()
    {
        // set rules
        $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        // jika kondisi tidak terpenuhi
        if ($this->form_validation->run() !== false) {
            $id = $this->m_pemesan->get_new_id();
            $data = [
                'id' => $id,
                'nama_pemesan' => $this->input->post('nama_pemesan', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
            ];

            if ($_FILES['foto']['size'] != 0) {
                $config['upload_path']          = './uploads/pemesan/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = $id . "-" . time();

                $this->load->library('upload', $config, 'foto_profil');
                $this->foto_profil->initialize($config);
                if (!$this->foto_profil->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                    redirect('pemesan');
                } else {
                    $data['foto'] = $this->foto_profil->data("file_name");
                }
            }

            if ($_FILES['foto_ktp']['size'] != 0) {
                $config2['upload_path']          = './uploads/pemesan/foto_ktp/';
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


            if ($this->m_pemesan->insert($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data Berhasil disimpan!</div>');
                redirect('pemesan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan!</div>');
                redirect('pemesan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan!
                <ul><li>' . validation_errors() . '</li></ul>
               </div>');
            redirect('pemesan');
        }
    }

    // detail
    public function detail($id_pemesan)
    {
        $data = [
            'aktif' => 'dashboard',
            'judul' => 'Pemesan',
            'no' => '1',
            'pemesan' => $this->m_pemesan->get_pemesan_by_id_pemesan($id_pemesan)
        ];
        $this->load->view('pemesan/detail', $data);
    }

    // ubah data
    public function ubah($id_pemesan)
    {
        // set rules
        $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        // jika kondisi tidak terpenuhi
        if ($this->form_validation->run() !== false) {
            $data_old = $this->m_pemesan->get_pemesan_by_id_pemesan($id_pemesan);
            $data = [
                'nama_pemesan' => $this->input->post('nama_pemesan', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
            ];
            if ($_FILES['foto']['size'] != 0) {
                $config['upload_path']          = './uploads/pemesan/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = $id_pemesan . "-" . time();
                $config['overwrite']            = true;
                $this->load->library('upload', $config, 'foto_profil');
                $this->foto_profil->initialize($config);
                if ($this->foto_profil->do_upload('foto')) {
                    $data['foto'] = $this->foto_profil->data("file_name");
                    unlink('./uploads/pemesan/' . $data_old['foto']);
                }
            }

            if ($_FILES['foto_ktp']['size'] != 0) {
                $config2['upload_path']          = './uploads/pemesan/foto_ktp/';
                $config2['allowed_types']        = 'gif|jpg|png';
                $config2['file_name']            = "ktp-" . $id_pemesan . "-" . time();
                $config2['overwrite']            = true;
                $this->load->library('upload', $config2, 'foto_ktp');
                $this->foto_ktp->initialize($config2);
                if ($this->foto_ktp->do_upload('foto_ktp')) {
                    $data['foto_ktp'] = $this->foto_ktp->data("file_name");
                    unlink('./uploads/pemesan/foto_ktp/' . $data_old['foto_ktp']);
                }
            }

            $where = ['id' => $id_pemesan];
            if ($this->m_pemesan->Update($data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data berhasil disimpan!</div>');
                redirect('pemesan/ubah/' . $id_pemesan);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan!</div>');
                redirect('pemesan/ubah/' . $id_pemesan);
            }
        } else {

            $data = [
                'aktif' => 'dashboard',
                'judul' => 'Pemesan',
                'no' => '1',
                'pemesan' => $this->m_pemesan->get_pemesan_by_id_pemesan($id_pemesan)
            ];
            $this->load->view('pemesan/ubah', $data);
        }
    }

    // hapus
    public function hapus($id_pemesan)
    {
        $where = ['id' => $id_pemesan];
        $data_old = $this->m_pemesan->get_pemesan_by_id_pemesan($id_pemesan);
        if ($this->db->delete('tbl_pemesan', $where)) {
            unlink('./uploads/pemesan/' . $data_old['foto']);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Berhasil dihapus!</div>');
            redirect('pemesan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal dihapus!</div>');
            redirect('pemesan');
        }
    }
}
