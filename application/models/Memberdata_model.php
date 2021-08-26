<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Memberdata_model extends MY_Model
{
    protected $table	= 'tbl_member';
    protected $perPage	= 10;

    public function __construct()
    {
        $this->load->database();
    }

    public function exportList() {
        $this->db->select(array('id', 'date_created', 'username', 'nama', 'email', 'phone', 'active_total'));
        $this->db->from('tbl_member');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDefaultValues()
    {
        return [
            'username' 	    => '',
            'nama'	        => '',
            'email'         => '',
            'phone'         => '',
            'enable_bonus'  => '',
            'banned'        => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'	=> 'username',
                'label'	=> 'Username',
                'rules' => 'trim'
            ],
            [
                'field'	=> 'nama',
                'label'	=> 'Name',
                'rules' => 'trim'
            ],
            [
                'field'	=> 'email',
                'label'	=> 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field'	=> 'phone',
                'label'	=> 'Phone',
                'rules' => 'trim|numeric'
            ],
            [
                'field'	=> 'enable_bonus',
                'label'	=> 'Enable Bonus',
                'rules' => 'trim'
            ],
            [
                'field'	=> 'banner',
                'label'	=> 'Banned Member',
                'rules' => 'trim'
            ],
        ];

        return $validationRules;
    }

}

/* End of file Memberdata_model.php */
