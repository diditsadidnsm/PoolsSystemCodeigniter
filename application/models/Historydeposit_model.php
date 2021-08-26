<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historydeposit_model extends MY_Model
{
    protected $table	= 'tbl_deposit';
    protected $perPage	= 10;

    public function __construct()
    {
        $this->load->database();
    }

    public function exportList() {
        $this->db->select(array('id', 'tgl', 'username', 'doc', 'status'));
        $this->db->from('tbl_deposit');
        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file Historydeposit_model.php */
