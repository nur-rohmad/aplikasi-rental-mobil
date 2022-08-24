<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // library send email
        $this->load->library('email');
        // load model
        $this->load->model('m_mobil');
        $this->load->model('m_pesanan');
    }

    public function index()
    {
        $data = [
            'aktif' => 'laporan',
            'judul' => 'laporan',
            'no' => '1',
        ];
        $search = $this->session->userdata('laporan_search');
        if (isset($search)) {
            $data['search'] = $this->session->userdata('laporan_search');
        } else {
            $data['search'] = [
                'tanggal_awal' => null,
                'tanggal_akhir' => null,

            ];
        }
        $tanggal_awal = empty($search['tanggal_awal']) ?   ""  :  $search['tanggal_awal'];
        $tanggal_akhir = empty($search['tanggal_akhir']) ?   ""  :  $search['tanggal_akhir'];
        $data['data_pesanan'] =  $this->m_pesanan->get_all_laporan($tanggal_awal, $tanggal_akhir);
        $data['total_pendapatan'] =  $this->m_pesanan->total_pendapatan($tanggal_awal, $tanggal_akhir);
        $this->load->view('laporan/index', $data);
    }

    // secarc laporan
    public function search_process()
    {
        if ($this->input->post('save') == "Reset") {
            $this->session->unset_userdata('laporan_search');
        } else {
            $params = array(
                "tanggal_awal" => $this->input->post("tanggal_awal_transaksi"),
                "tanggal_akhir" => $this->input->post("tanggal_akhir_transaksi"),
            );
            // var_dump($params);
            // die;
            $this->session->set_userdata("laporan_search", $params);
        }
        // redirect
        redirect("laporan");
    }
}
