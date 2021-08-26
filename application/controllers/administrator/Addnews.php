<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addnews extends MY_Controller
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
        $data['title']	= 'News Running Text';
        $data['content']	= $this->addnews->select(
            [
                'tbl_news.id', 'tbl_news.type AS type', 'tbl_news.title AS title',
                'tbl_news.content AS content', 'tbl_news.date_created AS date_created',
            ]
        )
            ->get();
        $data['page']	= 'admin/additional/news/index';
        $this->view($data);
    }

    public function edit($id)
    {
        $data['content'] = $this->addnews->where('id', $id)->first();

        if (! $data['content']) {
            $this->session->set_flashdata('warning', 'Sorry! Data not found!');
            redirect(base_url('/administrator/addnews'));
        }

        if (!$_POST) {
            $data['input']	= $data['content'];
        } else {
            $data['input']	= (object) $this->input->post(null, true);
        }

        if (!$this->addnews->validate()) {
            $data['title']			= 'Edit News';
            $data['form_action']	= base_url("/administrator/addnews/edit/$id");
            $data['page']			= 'admin/additional/news/form';

            $this->view($data);
            return;
        }

        if ($this->addnews->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'News updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred.');
        }

        redirect(base_url('/administrator/addnews'));
    }

}

/* End of file addnews.php */
