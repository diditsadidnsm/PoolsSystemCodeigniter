<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Theme_model extends MY_Model
{
    protected $table	= 'tbl_theme';

    public function getDefaultValues()
    {
        return [
            'is_active' 	=> 1
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'	=> 'is_active',
                'label'	=> 'Theme Active',
                'rules' => 'trim'
            ],
        ];

        return $validationRules;
    }

}

/* End of file Theme_model.php */
