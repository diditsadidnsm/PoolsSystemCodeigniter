<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Memberverify_model extends MY_Model
{
    protected $table	= 'tbl_member';
    protected $perPage	= 10;

    public function __construct()
    {
        $this->load->database();
    }

    public function exportList() {
        $this->db->select(array('id', 'img_selfie', 'img_ktp', 'no_ktp', 'nama', 'username'));
        $this->db->from('tbl_member');
        $query = $this->db->get();
        return $query->result();
    }


}

/* End of file Memberdata_model.php */
