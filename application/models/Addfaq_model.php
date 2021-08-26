<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addfaq_model extends MY_Model
{
    protected $table	= 'tbl_faq';
    protected $perPage	= 10;

    public function __construct()
    {
        $this->load->database();
    }

    public function exportList() {
        $this->db->select(array('id', 'question', 'answer', 'priority'));
        $this->db->from('tbl_faq');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDefaultValues()
    {
        return [
            'question' 	=> '',
            'answer'	=> '',
            'priority'  => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'	=> 'question',
                'label'	=> 'Question',
                'rules' => 'trim|required'
            ],
            [
                'field'	=> 'answer',
                'label'	=> 'Answer',
                'rules' => 'trim|required'
            ],
            [
                'field'	=> 'priority',
                'label'	=> 'Priority FAQ',
                'rules' => 'trim|required|numeric'
            ],
        ];

        return $validationRules;
    }

}

/* End of file Addfaq_model.php */
