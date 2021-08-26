<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Membernetworks_model extends MY_Model
{
    protected $table	= 'tbl_member';
    protected $perPage	= 10;

    public function __construct()
    {
        $this->load->database();
    }

    public function id_member() {
        $this->db->select(array('id_member'));
        $this->db->from('tbl_member');
        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file Membernetworks_model.php */
