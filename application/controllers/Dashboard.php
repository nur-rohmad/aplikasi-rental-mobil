<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // load model
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
            'aktif' => 'dashboard',
            'judul' => 'Dashboard',
            'mobil' => $this->db->count_all('tbl_mobil'),
            'pemesan' => $this->db->count_all('tbl_pemesan'),
            'akun' => $this->db->query("SELECT count(id) as 'jumlah_akun' from tbl_akun where deleted_at is null")->row_array(),
            'mobil_favorit' => $this->m_pesanan->mobil_favorit()
        ];
        if ($_SESSION['user']['role'] == 'pengguna') {
            $id_pemesan = $this->m_pemesan->get_pemesan_by_user_id($_SESSION['user']['id_user']);
            $this->db->select('id');
            $this->db->from('tbl_pesanan');
            $this->db->where('id_pemesan', $id_pemesan['id']);
            $banyak_pesanan = $this->db->count_all_results();

            $data['pesanan'] = $banyak_pesanan;
        } else {
            $data['pesanan'] = $this->db->count_all('tbl_pesanan');
        }
        $this->load->view('dashboard', $data);
    }

    public function get_tanggal_pesanan()
    {

        if ($_SESSION['user']['role'] == 'pengguna') {
            $id_pemesan = $this->m_pemesan->get_pemesan_by_user_id($_SESSION['user']['id_user']);
            $data_pesanan = $this->m_pesanan->get_all_by_user_id($id_pemesan['id']);
            $data = [];
            foreach ($data_pesanan as $key => $value) {
                # code...
                $data[$key]['id'] = $value['id_pesanan'];
                $data[$key]['title'] = $value['nama_mobil'];
                $data[$key]['start'] = $value['tgl_pinjam'];
                $data[$key]['end'] = date('Y-m-d', strtotime("+1 Days", strtotime($value['tgl_kembali'])));
                $data[$key]['backgroundColor'] = "#" . dechex(rand(0x000000, 0xFFFFFF));
            }
        } else {
            $data_pesanan = $this->m_pesanan->get_all();
            $data = [];
            foreach ($data_pesanan as $key => $value) {
                # code...
                $data[$key]['id'] = $value['id_pesanan'];
                $data[$key]['title'] = $value['nama_pemesan'] . "    " . $value['nama_mobil'];
                $data[$key]['start'] = date('Y-m-d', strtotime($value['tgl_pinjam']));
                $data[$key]['end'] = date('Y-m-d', strtotime("+1 Days", strtotime($value['tgl_kembali'])));
                $data[$key]['backgroundColor'] = "#" . dechex(rand(0x000000, 0xFFFFFF));
            }
        }

        echo json_encode($data);
    }
}
