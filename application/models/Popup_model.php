<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Popup_model extends MY_Model
{
    protected $table	= 'tbl_slider';

    public function getDefaultValues()
    {
        return [
            'name' 	=>  '',
            'tipe' 	=>  2,
            'image' =>  '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'	=> 'name',
                'label'	=> 'Slider Name',
                'rules' => 'trim|required'
            ],
            [
                'field'	=> 'tipe',
                'label'	=> 'Slider Type',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config	= [
            'upload_path'		=> './images/popup',
            'file_name'			=> $fileName,
            'allowed_types'		=> 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'			=> 1024,
            'max_width'			=> 0,
            'max_height'		=> 0,
            'overwrite'			=> true,
            'file_ext_tolower'	=> true
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if (file_exists("./images/popup/$fileName")) {
            unlink("./images/popup/$fileName");
        }
    }


}

/* End of file Slider_model.php */
