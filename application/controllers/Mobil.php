<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // model
        $this->load->model('m_mobil');
        $this->load->model('m_pemesan');
        $this->load->model('m_pesanan');
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
            'judul' => 'Data Mobil',
            'data_mobil' => $this->m_mobil->get_mobil(),
            'data_merk' => $this->db->get('tbl_merk')->result_array(),
            'no' => 1
        ];
        if ($_SESSION['user']['role'] == 'admin') {
            $this->load->view('mobil/index', $data);
        } else {
            $this->load->view('mobil/index_pelanggan', $data);
        }
    }

    // tambah mobil
    public function tambah_mobil()
    {
        // set rules
        $this->form_validation->set_rules('id_merk', 'ID Merek', 'required');
        $this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required');
        $this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required');
        $this->form_validation->set_rules('warna', 'Warna Mobil', 'required');
        $this->form_validation->set_rules('jumlah_kursi', 'Jumlah Kursi', 'required');
        $this->form_validation->set_rules('no_polisi', 'No Polisi', 'required');
        $this->form_validation->set_rules('tahun_beli', 'Tahun Beli', 'required');
        // $this->form_validation->set_rules('gambar_mobil', 'Gambar Mobil', 'required');
        $this->form_validation->set_rules('harga', 'Harga Mobil', 'required');
        $this->form_validation->set_rules('denda', 'Denda', 'required');

        // jika kondisi terpenuhi
        if ($this->form_validation->run() !== FALSE) {
            $id = $this->m_mobil->get_new_id();
            $data = [
                'id' => $id,
                'id_merk' => $this->input->post('id_merk', TRUE),
                'nama_mobil' => $this->input->post('nama_mobil', TRUE),
                'warna' => $this->input->post('warna', TRUE),
                'jumlah_kursi' => $this->input->post('jumlah_kursi', TRUE),
                'no_polisi' => $this->input->post('no_polisi', TRUE),
                'tahun_beli' => $this->input->post('tahun_beli', TRUE),
                'denda' => $this->input->post('denda', TRUE),
                'harga' => $this->input->post('harga', TRUE),
            ];
            $config['upload_path']          = './uploads/mobil/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id . "-" . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_mobil')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                redirect('mobil');
            } else {
                $data['gambar'] = $this->upload->data("file_name");
            }
            if ($this->m_mobil->insert($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data berhasil disimpan</div>');
                redirect('mobil');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data berhasil disimpan
               <ul>
                    <li>' . validation_errors() . '
               </ul>
               </div>');
            redirect('mobil');
        }
    }

    // detail mobil
    public function detail($id_mobil)
    {
        $data = [
            'aktif' => 'mobil',
            'judul' => 'Data Mobil',
            'data_mobil' => $this->m_mobil->get_mobil_by_id($id_mobil),
            'no' => 1
        ];
        $this->load->view('mobil/detail', $data);
    }

    // ubah data mobil
    public function ubah($id_mobil)
    {
        // set rules
        $this->form_validation->set_rules('id_merk', 'ID Merek', 'required');
        $this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required');
        $this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required');
        $this->form_validation->set_rules('warna', 'Warna Mobil', 'required');
        $this->form_validation->set_rules('jumlah_kursi', 'Jumlah Kursi', 'required');
        $this->form_validation->set_rules('no_polisi', 'No Polisi', 'required');
        $this->form_validation->set_rules('tahun_beli', 'Tahun Beli', 'required');
        $this->form_validation->set_rules('denda', 'Denda', 'required');
        // $this->form_validation->set_rules('gambar_mobil', 'Gambar Mobil', 'required');
        $this->form_validation->set_rules('harga', 'Harga Mobil', 'required');
        $data_old = $this->m_mobil->get_mobil_by_id($id_mobil);
        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'id_merk' => $this->input->post('id_merk', TRUE),
                'nama_mobil' => $this->input->post('nama_mobil', TRUE),
                'warna' => $this->input->post('warna', TRUE),
                'jumlah_kursi' => $this->input->post('jumlah_kursi', TRUE),
                'no_polisi' => $this->input->post('no_polisi', TRUE),
                'tahun_beli' => $this->input->post('tahun_beli', TRUE),
                'denda' => $this->input->post('denda', TRUE),
                'harga' => $this->input->post('harga', TRUE),
            ];

            $config['upload_path']          = './uploads/mobil/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id_mobil . "-" . time();
            $config['overwrite']            = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_mobil')) {
                $data['gambar'] = $this->upload->data("file_name");
                unlink('./uploads/mobil/' . $data_old['gambar']);
            }
            $where = ['id' => $id_mobil];
            if ($this->m_mobil->update($data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data Berhail  disimpan</div>');
                redirect('mobil/ubah/' . $id_mobil);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal  disimpan</div>');
                redirect('mobil/ubah/' . $id_mobil);
            }
        } else {

            $data = [
                'aktif' => 'mobil',
                'judul' => 'Data Mobil',
                'data_mobil' => $this->m_mobil->get_mobil_by_id($id_mobil),
                'data_merk' => $this->db->get('tbl_merk')->result_array(),
                'no' => 1
            ];

            $this->load->view('mobil/ubah', $data);
        }
    }

    // hapus
    public function hapus($id_mobil)
    {
        $where = ['id' => $id_mobil];
        $data_old = $this->m_mobil->get_mobil_by_id($id_mobil);
        if ($this->db->delete('tbl_mobil', $where)) {
            unlink('./uploads/mobil/' . $data_old['gambar']);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Berhasil dihapus!</div>');
            redirect('mobil');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal dihapus!</div>');
            redirect('mobil');
        }
    }

    public function get_tanggal_pesanan_by_id_mobil()
    {
        $id_mobil = $this->input->post('id_mobil');

        $data_pesanan = $this->m_pesanan->get_all_by_id_mobil($id_mobil);
        $data = [];
        $no = 1;
        foreach ($data_pesanan as $key => $value) {
            # code...
            $data[$key]['id'] = $value['id_pesanan'];
            if ($_SESSION['user']['role'] == 'admin') {
                $data[$key]['title'] = $value['nama_pemesan'];
            } else {
                $data[$key]['title'] = 'penyewa ke-' . $no++;
            }
            $data[$key]['start'] = date('Y-m-d', strtotime($value['tgl_pinjam']));
            $data[$key]['end'] = date('Y-m-d', strtotime("+1 Days", strtotime($value['tgl_kembali'])));
            $data[$key]['backgroundColor'] = "#" . dechex(rand(0x000000, 0xFFFFFF));
        }


        echo json_encode($data);
    }
}
