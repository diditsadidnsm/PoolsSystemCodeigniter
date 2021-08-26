<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends MY_Controller
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
        $data['title']	= 'Popup Image Manage';
        $data['content']	= $this->popup->select(
            [
                'tbl_slider.id', 'tbl_slider.name AS name', 'tbl_slider.image AS image',
                'tbl_slider.tipe AS type'
            ]
        )
            ->where('tbl_slider.tipe', 2)
            ->get();
        $data['page']	= 'admin/additional/popup/index';
        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input	= (object) $this->popup->getDefaultValues();
        } else {
            $input	= (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName	= url_title($input->name, '-', true) . '-' . date('YmdHis');
            $upload		= $this->popup->uploadImage('image', $imageName);
            if ($upload) {
                $input->image	= $upload['file_name'];
            } else {
                redirect(base_url('/administrator/popup/create'));
            }
        }

        if (!$this->popup->validate()) {
            $data['title']			= 'Create New Popup';
            $data['input']			= $input;
            $data['form_action']	= base_url('/administrator/popup/create');

            $this->load->view('admin/additional/popup/form', $data);
            return;
        }

        if ($this->popup->create($input)) {
            $this->session->set_flashdata('success', 'Popup saved successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred');
        }

        redirect(base_url('/administrator/popup'));
    }

    public function edit($id)
    {
        $data['content'] = $this->popup->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Sorry, no data could be found');
            redirect(base_url('/administrator/popup'));
        }

        if (!$_POST) {
            $data['input']	= $data['content'];
        } else {
            $data['input']	= (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName	= url_title($data['input']->name, '-', true) . '-' . date('YmdHis');
            $upload		= $this->popup->uploadImage('image', $imageName);
            if ($upload) {
                if ($data['content']->image !== '') {
                    $this->popup->deleteImage($data['content']->image);
                }
                $data['input']->image	= $upload['file_name'];
            } else {
                redirect(base_url("/administrator/popup/edit/$id"));
            }
        }

        if (!$this->popup->validate()) {
            $data['title']			= 'Edit Popup Image';
            $data['form_action']	= base_url("/administrator/popup/edit/$id");

            $this->load->view('admin/additional/popup/form', $data);
            return;
        }


        if ($this->popup->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Popup change successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred');
        }

        redirect(base_url('/administrator/popup'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('/administrator/popup'));
        }

        $popup = $this->popup->where('id', $id)->first();

        if (!$popup) {
            $this->session->set_flashdata('warning', 'Sorry, no data could be found');
            redirect(base_url('/administrator/popup'));
        }

        if ($this->popup->where('id', $id)->delete()) {
            $this->popup->deleteImage($popup->image);
            $this->session->set_flashdata('success', 'Popup has been successfully deleted!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Something went wrong!');
        }

        redirect(base_url('/administrator/popup'));
    }

}

/* End of file Popup.php */
