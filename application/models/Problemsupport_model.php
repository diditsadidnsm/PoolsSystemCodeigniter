<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Problemsupport_model extends MY_Model
{
    protected $table	= 'tbl_support';
    protected $perPage	= 10;

    public function __construct()
    {
        $this->load->database();
    }

    public function exportList() {
        $this->db->select(array('id', 'username', 'tanggal', 'status', 'lang', 'problem', 'answer', 'answer_by', 'answer_date'));
        $this->db->from('tbl_support');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDefaultValues()
    {
        return [
            'answer_by' 	=> '',
            'answer_date'	=> '',
            'answer_img'	=> '',
            'problem'       => '',
            'answer'        => '',
            'status'        => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'	=> 'answer_by',
                'label'	=> 'Answer By',
                'rules' => 'trim'
            ],
            [
                'field'	=> 'answer_date',
                'label'	=> 'Answer Date',
                'rules' => 'trim'
            ],
            [
                'field'	=> 'answer_img',
                'label'	=> 'Answer Image',
                'rules' => 'trim'
            ],
            [
                'field'	=> 'problem',
                'label'	=> 'Problem Request',
                'rules' => 'trim|required'
            ],
            [
                'field'	=> 'answer',
                'label'	=> 'Answer',
                'rules' => 'trim|required'
            ],
            [
                'field'	=> 'status',
                'label'	=> 'Status',
                'rules' => 'trim'
            ],
        ];

        return $validationRules;
    }

}

/* End of file Problemsupport_model.php */
