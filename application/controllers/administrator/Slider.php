<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller
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
        $data['title']	= 'Slider Manage';
        $data['content']	= $this->slider->select(
            [
                'tbl_slider.id', 'tbl_slider.name AS name', 'tbl_slider.image AS image',
                'tbl_slider.tipe AS type'
            ]
        )
            ->where('tbl_slider.tipe', 1)
            ->get();
        $data['page']	= 'admin/additional/slider/index';
        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input	= (object) $this->slider->getDefaultValues();
        } else {
            $input	= (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName	= url_title($input->name, '-', true);
            $upload		= $this->slider->uploadImage('image', $imageName);
            if ($upload) {
                $input->image	= $upload['file_name'];
            } else {
                redirect(base_url('/administrator/slider/create'));
            }
        }

        if (!$this->slider->validate()) {
            $data['title']			= 'Create New Slider';
            $data['input']			= $input;
            $data['form_action']	= base_url('/administrator/slider/create');

            $this->load->view('admin/additional/slider/form', $data);
            return;
        }

        if ($this->slider->create($input)) {
            $this->session->set_flashdata('success', 'Slider saved successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred');
        }

        redirect(base_url('/administrator/slider'));
    }

    public function edit($id)
    {
        $data['content'] = $this->slider->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Sorry, no data could be found');
            redirect(base_url('/administrator/slider'));
        }

        if (!$_POST) {
            $data['input']	= $data['content'];
        } else {
            $data['input']	= (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName	= url_title($data['input']->name, '-', true) . '-' . date('YmdHis');
            $upload		= $this->slider->uploadImage('image', $imageName);
            if ($upload) {
                if ($data['content']->image !== '') {
                    $this->slider->deleteImage($data['content']->image);
                }
                $data['input']->image	= $upload['file_name'];
            } else {
                redirect(base_url("/administrator/slider/edit/$id"));
            }
        }

        if (!$this->slider->validate()) {
            $data['title']			= 'Edit Slider Image';
            $data['form_action']	= base_url("/administrator/slider/edit/$id");

            $this->load->view('admin/additional/slider/form', $data);
            return;
        }


        if ($this->slider->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Slider change successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred');
        }

        redirect(base_url('/administrator/slider'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('/administrator/slider'));
        }

        $slider = $this->slider->where('id', $id)->first();

        if (!$slider) {
            $this->session->set_flashdata('warning', 'Sorry, no data could be found');
            redirect(base_url('/administrator/slider'));
        }

        if ($this->slider->where('id', $id)->delete()) {
            $this->slider->deleteImage($slider->image);
            $this->session->set_flashdata('success', 'Slider has been successfully deleted!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Something went wrong!');
        }

        redirect(base_url('/administrator/slider'));
    }

}

/* End of file theme.php */
