<?php
class M_pesanan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->join('tbl_pemesan', 'tbl_pesanan.id_pemesan=tbl_pemesan.id');
        $this->db->join('tbl_mobil', 'tbl_pesanan.id_mobil=tbl_mobil.id', 'left');
        $this->db->join('tbl_merk', 'tbl_mobil.id_merk=tbl_merk.id_merek', 'left');
        return $this->db->get()->result_array();
    }

    // get data laporan
    public function get_all_laporan($tanggal_awal = "", $tanggal_akhir = "")
    {

        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->join('tbl_pemesan', 'tbl_pesanan.id_pemesan=tbl_pemesan.id');
        $this->db->join('tbl_mobil', 'tbl_pesanan.id_mobil=tbl_mobil.id', 'left');
        $this->db->join('tbl_merk', 'tbl_mobil.id_merk=tbl_merk.id_merek', 'left');
        if ($tanggal_awal != null and $tanggal_akhir != null) {
            $this->db->where('tbl_pesanan.tgl_pinjam >=', $tanggal_awal);
            $this->db->where('tbl_pesanan.tgl_kembali <=', $tanggal_akhir);
        }
        return $this->db->get()->result_array();
    }

    // total pendapata
    public function total_pendapatan($tanggal_awal = "", $tanggal_akhir = "")
    {
        $this->db->select("sum(total_bayar) as 'total'");
        $this->db->from('tbl_pesanan');
        if ($tanggal_awal != null and $tanggal_akhir != null) {
            $this->db->where('tbl_pesanan.tgl_pinjam >=', $tanggal_awal);
            $this->db->where('tbl_pesanan.tgl_kembali <=', $tanggal_akhir);
        }
        return $this->db->get()->row_array();
    }

    public function get_all_by_user_id($id_pemesan)
    {
        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->join('tbl_pemesan', 'tbl_pesanan.id_pemesan=tbl_pemesan.id');
        $this->db->join('tbl_mobil', 'tbl_pesanan.id_mobil=tbl_mobil.id', 'left');
        $this->db->join('tbl_merk', 'tbl_mobil.id_merk=tbl_merk.id_merek', 'left');
        $this->db->where('id_pemesan', $id_pemesan);
        return $this->db->get()->result_array();
    }
    // get by id pesanan
    public function get_all_by_id_pesanan($id_pesanan)
    {
        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->join('tbl_pemesan', 'tbl_pesanan.id_pemesan=tbl_pemesan.id');
        $this->db->join('tbl_mobil', 'tbl_pesanan.id_mobil=tbl_mobil.id', 'left');
        $this->db->join('tbl_merk', 'tbl_mobil.id_merk=tbl_merk.id_merek', 'left');
        $this->db->join('tbl_sopir', 'tbl_pesanan.sopir_by=tbl_sopir.id_sopir', 'left');
        $this->db->where('id_pesanan', $id_pesanan);
        return $this->db->get()->row_array();
    }
    public function get_all_by_id_mobil($id_mobil)
    {
        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->join('tbl_pemesan', 'tbl_pesanan.id_pemesan=tbl_pemesan.id');
        $this->db->join('tbl_mobil', 'tbl_pesanan.id_mobil=tbl_mobil.id', 'left');
        $this->db->join('tbl_merk', 'tbl_mobil.id_merk=tbl_merk.id_merek', 'left');
        $this->db->where('tbl_mobil.id', $id_mobil);
        return $this->db->get()->result_array();
    }
    // movbil paling bayak disewa
    public function mobil_favorit()
    {
        $query = $this->db->query("SELECT count(a.id_mobil) as 'jumlah', b.nama_mobil FROM tbl_pesanan a INNER JOIN tbl_mobil b ON a.id_mobil = b.id GROUP BY id_mobil order by jumlah desc")->result_array();
        // var_dump($query);
        // die;
        return $query;
    }

    // cek tanggal pesanan
    public function cek_tanggal($id_mobil, $tgl_pinjam, $tgl_kembali)
    {
        // var_dump($id_mobil, $tgl_pinjam, $tgl_kembali);
        $tanggal_sewa_convert = date('Y-m-d H:i:s', strtotime($tgl_pinjam));
        $tanggal_kembali_convert = date('Y-m-d H:i:s', strtotime($tgl_kembali));
        var_dump($id_mobil, $tanggal_sewa_convert, $tanggal_kembali_convert);
        $data = $this->db->query("SELECT id_pesanan FROM tbl_pesanan WHERE id_mobil = '$id_mobil' AND (tgl_pinjam BETWEEN '$tanggal_sewa_convert' AND '$tanggal_kembali_convert' OR DATE_ADD(tgl_kembali, interval 2 hour) BETWEEN '$tanggal_sewa_convert' AND '$tanggal_kembali_convert')");
        // var_dump($data->result_array());
        // die;
        return $data->result_array();
    }

    // tambah data
    public function tambah($data)
    {
        return $this->db->insert('tbl_pesanan', $data);
    }
    //   update
    public function update($param, $where)
    {
        return $this->db->update('tbl_pesanan', $param, $where);
    }
}
