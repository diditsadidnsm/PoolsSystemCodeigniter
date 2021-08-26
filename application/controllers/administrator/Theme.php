<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index($page = null)
    {
        $data['title']	= 'Theme Setting';
        $data['content']	= $this->theme->select(
            [
                'tbl_theme.id', 'tbl_theme.is_active AS is_active'
            ]
        )
            ->get();
        $data['page']	= 'admin/additional/theme/index';
        $this->view($data);
    }

    public function change($id)
    {
        $data['content'] = $this->theme->where('id', $id)->first();

        if (! $data['content']) {
            $this->session->set_flashdata('warning', 'Sorry! Theme not found!');
            redirect(base_url('/administrator/theme'));
        }

        if (!$_POST) {
            $data['input']	= $data['content'];
        } else {
            $data['input']	= (object) $this->input->post(null, true);
        }

        if (!$this->theme->validate()) {
            $data['title']			= 'Change Theme Mode';
            $data['form_action']	= base_url("/administrator/theme/change/$id");
            $data['page']			= 'admin/additional/theme/form';

            $this->view($data);
            return;
        }

        if ($this->theme->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Theme mode change successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred.');
        }

        redirect(base_url('/administrator/theme'));
    }

}

/* End of file theme.php */
