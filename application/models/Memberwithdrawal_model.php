<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Memberwithdrawal_model extends MY_Model
{
    protected $table	= 'tbl_withdrawal';
    protected $perPage	= 10;

    public function __construct()
    {
        $this->load->database();
    }

    public function exportList() {
        $this->db->select(array('id', 'tgl', 'username', 'send_to', 'amount', 'status'));
        $this->db->from('tbl_withdrawal');
        $query = $this->db->get();
        return $query->result();
    }


}

/* End of file Memberdata_model.php */
