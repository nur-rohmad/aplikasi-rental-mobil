<?php
class M_pemesan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $tabel = "tbl_pemesan";

    // get pemesan
    public function get_pemesan()
    {
        return $this->db->get($this->tabel)->result_array();
    }

    // get max id
    public function get_new_id()
    {
        $this->db->select_max('id', 'id_terkair');
        $data_max = $this->db->get('tbl_pemesan')->row_array();
        $new_id = $data_max['id_terkair'] + 1;
        return $new_id;
    }
    public function get_new_id_sopir()
    {
        $this->db->select_max('id_sopir', 'id_terkair');
        $data_max = $this->db->get('tbl_sopir')->row_array();
        $new_id = $data_max['id_terkair'] + 1;
        return $new_id;
    }

    // get pemesan by user id
    public function get_pemesan_by_user_id($id_user)
    {
        $data = $this->db->get_where($this->tabel, ['id_user' => $id_user])->row_array();
        return $data;
    }
    // get pemesan by id pemesan
    public function get_pemesan_by_id_pemesan($id_pemesan)
    {
        $data = $this->db->get_where($this->tabel, ['id' => $id_pemesan])->row_array();
        return $data;
    }

    // update 
    public function Update($param, $where)
    {
        return $this->db->update($this->tabel, $param, $where);
    }
    // insert
    public function insert($param)
    {
        return $this->db->insert($this->tabel, $param);
    }
}
