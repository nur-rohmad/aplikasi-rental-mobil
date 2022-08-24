<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // model
        $this->load->model('m_pesanan');
        $this->load->model('m_pemesan');
        $this->load->model('m_perjalanan');
        $this->load->model('m_mobil');
    }
    public function index()
    {
        $data = [
            'aktif' => 'pesanan',
            'judul' => 'Data Pesanan',
            'data_pemesan' => $this->m_pemesan->get_pemesan(),
            'data_mobil' => $this->m_mobil->get_mobil(),
            'data_sopir' => $this->db->get('tbl_sopir')->result_array(),

            'no' => 1
        ];
        if ($_SESSION['user']['role'] == 'admin') {
            $data['data_pesanan'] =  $this->m_pesanan->get_all();
        } else {
            // $data['data_pesanan'] =  $this->m_pesanan->get_all();
            $id_pemesan = $this->m_pemesan->get_pemesan_by_user_id($_SESSION['user']['id_user']);
            $data['data_pesanan'] =  $this->m_pesanan->get_all_by_user_id($id_pemesan['id']);
        }
        $this->load->view('pesanan/index', $data);
    }

    // getharga
    public function get_harga_jasa()
    {
        // $jasa = $this->input->post('jenis_jasa');
        $id = $this->input->post('id_jasa');
        $data = ["data" => $this->m_mobil->get_mobil_by_id($id)];
        echo json_encode($data);
    }

    // get no pesanan
    public function getNoPesanan()
    {
        $no_pesanan = "BR-" . date("dmy") . random_int(1111, 9999);
        $cek_noPesanan = $this->db->get_where('tbl_pesanan', ['no_pesanan' => $no_pesanan])->row_array();

        if ($cek_noPesanan) {
            $no_pesanan = "BR-" . date("dmy") . random_int(1111, 9999);
        } else {

            // $data = ["no_pesanan" => $no_pesanan];
            echo json_encode($no_pesanan);
        }
    }

    public function prosses_tambah_pesanan()
    {
        // set rules 
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('total_bayar', 'Jenis Jasa', 'required');
        $this->form_validation->set_rules('no_pesanan', 'No Pesanan', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');


        $data_pemesan = $this->m_pemesan->get_pemesan_by_user_id($_SESSION['user']['id_user']);
        if ($_SESSION['user']['role'] == 'pengguna') {
            // cek data pemesan 
            if ($data_pemesan['nama_pemesan'] == null || $data_pemesan['alamat'] == null || $data_pemesan['foto_ktp'] == null) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Gagal melakukan pemesanan! Lengkapi data anda!</div>');
                redirect('pemesan');
            }
        }
        // var_dump($this->m_pesanan->cek_tanggal($this->input->post('id_mobil', TRUE), $this->input->post('tgl_pinjam', TRUE), $this->input->post('tgl_kembali', TRUE)));
        // die;

        if ($this->m_pesanan->cek_tanggal($this->input->post('id_mobil', TRUE), $this->input->post('tgl_pinjam', TRUE), $this->input->post('tgl_kembali', TRUE))) {
            // die;
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Gagal melakukan pemesanan! Mobil yang dipilih sedang digunakan saat tanggal tersebut</div>');
            redirect('pesanan');
        }

        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'id_mobil' => $this->input->post('id_mobil', TRUE),
                'no_pesanan' => $this->input->post('no_pesanan', TRUE),
                'tgl_pinjam' => $this->input->post('tgl_pinjam', TRUE),
                'tgl_kembali' => $this->input->post('tgl_kembali', TRUE),
                'total_harga' => $this->input->post('total_bayar', TRUE),
                'harga_sewa' => $this->input->post('harga', TRUE),
                'lama_sewa' => $this->input->post('lama_sewa', TRUE),
                'tujuan' => $this->input->post('tujuan', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
                'status_sopir' => $this->input->post('jasa_sopir', TRUE),
            ];

            if ($_SESSION['user']['role'] == 'pengguna') {
                $data['id_pemesan'] =  $data_pemesan['id'];
            } else {
                $data['id_pemesan'] =  $this->input->post('id_pemesan', TRUE);
            }
            if ($this->input->post('jasa_sopir', TRUE) == 'dengan_sopir') {
                $data['sopir_by'] = $this->input->post('sopir_by', TRUE);
            }

            if ($this->m_pesanan->tambah($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data berhasil disimpan</div>');
                redirect('pesanan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                redirect('pesanan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan! <ul><li>' . validation_errors() . '</li></ul> </div>');
            redirect('pesanan');
        }
    }

    // detail
    public function detail_pesanan($id_pesanan)
    {

        $data = [
            'aktif' => 'pesanan',
            'judul' => 'detail Pesanan',
            'pesanan' => $this->m_pesanan->get_all_by_id_pesanan($id_pesanan),
            // 'data_jenis_bayar' => $this->j_bayar->lihat(),
            'no' => 1
        ];
        $this->load->view('pesanan/detail', $data);
    }

    // ubah pesanan
    public function ubah($id_pesanan)
    {
        // set rules 
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('id_pemesan', 'Pemesan', 'required');
        $this->form_validation->set_rules('total_bayar', 'Jenis Jasa', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'id_mobil' => $this->input->post('id_mobil', TRUE),
                'tgl_pinjam' => $this->input->post('tgl_pinjam', TRUE),
                'tgl_kembali' => $this->input->post('tgl_kembali', TRUE),
                'total_harga' => $this->input->post('total_bayar', TRUE),
                'harga_sewa' => $this->input->post('harga', TRUE),
                'lama_sewa' => $this->input->post('lama_sewa', TRUE),
                'id_pemesan' =>  $this->input->post('id_pemesan', TRUE),
                'tujuan' => $this->input->post('tujuan', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
            ];
            $where = ['id_pesanan' => $id_pesanan];
            if ($this->m_pesanan->update($data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data berhasil disimpan</div>');
                redirect('pesanan/ubah/' . $id_pesanan);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                redirect('pesanan/ubah/' . $id_pesanan);
            }
        } else {

            $data = [
                'aktif' => 'pesanan',
                'judul' => 'Ubah Pesanan',
                'data_pemesan' => $this->m_pemesan->get_pemesan(),
                'data_mobil' => $this->m_mobil->get_mobil(),
                'pesanan' => $this->m_pesanan->get_all_by_id_pesanan($id_pesanan),
                // 'data_jenis_bayar' => $this->j_bayar->lihat(),
                'no' => 1
            ];
            $this->load->view('pesanan/ubah', $data);
        }
    }

    // hapus pesanan
    public function hapus($id_pesanan)
    {
        $where = ['id_pesanan' => $id_pesanan];
        if ($this->db->delete('tbl_pesanan', $where)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data Berhasil dihapus!</div>');
            redirect('pesanan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal dihapus!</div>');
            redirect('pesanan');
        }
    }

    // kembalikan mobil
    public function kembalikan_mobil($id_pesanan)
    {
        $data = [
            'aktif' => 'pesanan',
            'judul' => 'Pengembalian',
            'pesanan' => $this->m_pesanan->get_all_by_id_pesanan($id_pesanan),
            // 'data_jenis_bayar' => $this->j_bayar->lihat(),
            'no' => 1
        ];
        $this->load->view('pesanan/pengembalian', $data);
    }

    // proses pengembalian
    public function proses_pengembalian()
    {
        // validation
        $this->form_validation->set_rules('id_pesanan', 'ID Pesanan', 'required');
        $this->form_validation->set_rules('tgl_pengembalian', 'Lama Keterlambatan', 'required');
        $this->form_validation->set_rules('lama_keterlambatan', 'Lama Keterlambatan', 'required');
        $this->form_validation->set_rules('jumlah_denda', 'Jumlah Denda', 'required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'tgl_pengembalian' => $this->input->post('tgl_pengembalian', TRUE),
                'lama_keterlambatan' => $this->input->post('lama_keterlambatan', TRUE),
                'jumlah_denda' => $this->input->post('jumlah_denda', TRUE),
                'total_bayar' => $this->input->post('total_bayar', TRUE),
                'status_sewa' => "selesai",
            ];

            // where
            $where = ['id_pesanan' => $this->input->post('id_pesanan', TRUE)];

            if ($this->m_pesanan->update($data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Data berhasil disimpan</div>');
                redirect('pesanan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan</div>');
                redirect('pesanan/kembalikan_mobil/' . $this->input->post('id_pesanan', TRUE));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Data gagal disimpan! <ul><li>' . validation_errors() . '</li></ul> </div>');
            redirect('pesanan');
        }
    }

    // tambah data sopir
    public function tambah_sopir($id_pesanan)
    {
        $this->form_validation->set_rules('sopir_by', 'Sopir', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = ['sopir_by' => $this->input->post('sopir_by', TRUE)];
            $where = ['id_pesanan' => $id_pesanan];

            // var_dump($data, $where);
            // die;

            if ($this->m_pesanan->update($data, $where)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Penambahan Sopir Berhasil</div>');
                redirect('pesanan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Penambahan Sopir Gagal</div>');
                redirect('pesanan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              Penambhan Sopir Gagal! <ul><li>' . validation_errors() . '</li></ul> </div>');
            redirect('pesanan');
        }
    }
}
