<?php
class M_mobil extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $tabel = "tbl_mobil";

    // get mobil
    public function get_mobil()
    {
        $this->db->select('*');
        $this->db->from($this->tabel);
        $this->db->join('tbl_merk', 'tbl_mobil.id_merk=tbl_merk.id_merek', 'left');
        return $this->db->get()->result_array();
    }

    // get mobil by id
    public function get_mobil_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->tabel);
        $this->db->join('tbl_merk', 'tbl_mobil.id_merk=tbl_merk.id_merek', 'left');
        $this->db->where(['id' => $id]);
        return $this->db->get()->row_array();
    }
    // get max id
    public function get_new_id()
    {
        $this->db->select_max('id', 'id_terkair');
        $data_max = $this->db->get('tbl_mobil')->row_array();
        $new_id = $data_max['id_terkair'] + 1;
        return $new_id;
    }

    // insert data
    public function insert($params)
    {
        return $this->db->insert($this->tabel, $params);
    }

    // update daata
    public function update($params, $where)
    {
        return $this->db->update($this->tabel, $params, $where);
    }
}
