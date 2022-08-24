<?php
class M_perjalanan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $tabel = "tbl_perjalanan";

    // get perjalanan
    public function get_perjalanan()
    {
        return $this->db->get($this->tabel)->result_array();
    }
    // get perjalanan by id
    public function get_perjalanan_by_id($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row_array();
    }
}
