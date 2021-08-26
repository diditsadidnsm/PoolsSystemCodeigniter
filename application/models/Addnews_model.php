<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addnews_model extends MY_Model
{
    protected $table	= 'tbl_news';

    public function getDefaultValues()
    {
        return [
            'type' 	        => '',
            'title'	        => '',
            'content'       => '',
            'date_created'  => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'	=> 'type',
                'label'	=> 'Type News',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field'	=> 'title',
                'label'	=> 'Title News',
                'rules' => 'trim|required'
            ],
            [
                'field'	=> 'content',
                'label'	=> 'News Content',
                'rules' => 'trim|required'
            ],
            [
                'field'	=> 'date_created',
                'label'	=> 'Date Updated',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

}

/* End of file Addnews_model.php */
