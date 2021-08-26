<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addfaq extends MY_Controller
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
        $data['title']	= 'FAQ List';
        $data['content']	= $this->addfaq->select(
            [
                'tbl_faq.id', 'tbl_faq.question AS question', 'tbl_faq.answer AS answer',
                'tbl_faq.priority AS priority'
            ]
        )
            ->orderBy('tbl_faq.id', 'desc')
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->addfaq->count();
        $data['pagination']	= $this->addfaq->makePagination(
            base_url('/administrator/addfaq'), 2, $data['total_rows']
        );
        $data['page']	= 'admin/additional/faq/index';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('/administrator/addfaq'));
        }

        $keyword	= $this->session->userdata('keyword');
        $data['title']		= 'FAQ List';
        $data['content']	= $this->addfaq->like('tbl_faq.question', $keyword)->paginate($page)->get();
        $data['total_rows']	= $this->addfaq->like('tbl_faq.priority', $keyword)->count();
        $data['pagination']	= $this->addfaq->makePagination(
            base_url('/administrator/addfaq/search'), 3, $data['total_rows']
        );
        $data['page']		= 'admin/additional/faq/index';
        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('/administrator/addfaq'));
    }

    public function create()
    {
        if (!$_POST) {
            $input	= (object) $this->addfaq->getDefaultValues();
        } else {
            $input	= (object) $this->input->post(null, true);
        }

        if (!$this->addfaq->validate()) {
            $data['title']			= 'Create New FAQ List';
            $data['input']			= $input;
            $data['form_action']	= base_url('/administrator/addfaq/create');
            $data['page']			= 'admin/additional/faq/form';

            $this->view($data);
            return;
        }

        if ($this->addfaq->create($input)) {
            $this->session->set_flashdata('success', 'Data saved successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred');
        }

        redirect(base_url('/administrator/addfaq'));
    }

    public function edit($id)
    {
        $data['content'] = $this->addfaq->where('id', $id)->first();

        if (! $data['content']) {
            $this->session->set_flashdata('warning', 'Sorry! Data not found!');
            redirect(base_url('/administrator/addfaq'));
        }

        if (!$_POST) {
            $data['input']	= $data['content'];
        } else {
            $data['input']	= (object) $this->input->post(null, true);
        }

        if (!$this->addfaq->validate()) {
            $data['title']			= 'Edit FAQ List';
            $data['form_action']	= base_url("/administrator/addfaq/edit/$id");
            $data['page']			= 'admin/additional/faq/form';

            $this->view($data);
            return;
        }

        if ($this->addfaq->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred.');
        }

        redirect(base_url('/administrator/addfaq'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('/administrator/addfaq'));
        }

        if (! $this->addfaq->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', 'Sorry! Data not found.');
            redirect(base_url('/administrator/addfaq'));
        }

        if ($this->addfaq->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data has been successfully deleted!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred.');
        }

        redirect(base_url('/administrator/addfaq'));
    }

    public function detail($id)
    {
        $data['rows']	= $this->addfaq->select(
            [
                'tbl_faq.id', 'tbl_faq.question AS question', 'tbl_faq.answer AS answer',
                'tbl_faq.priority AS priority'
            ]
        )
            ->where('tbl_faq.id', $id)
            ->get();
        $data['page']		= 'admin/additional/faq/detail';
        $this->view($data);
        return;
    }

    public function generateXls() {
        $fileName = 'data-'.time().'.xlsx';
        $this->load->library('excel');
        $listInfo = $this->addfaq->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Question');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Answer');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Priority');
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->question);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->answer);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->priority);
            $rowCount++;
        }
        $filename = "FAQ". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');

    }

}

/* End of file addfaq.php */
