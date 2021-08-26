<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Problemsupport extends MY_Controller
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
        $data['title']	= 'Problem Support';
        $data['content']	= $this->problemsupport->select(
            [
                'tbl_support.id', 'tbl_support.username AS username', 'tbl_support.tanggal AS request_date',
                'tbl_support.status AS status', 'tbl_support.lang AS language', 'tbl_support.problem AS problem',
                'tbl_support.answer AS answer', 'tbl_support.answer_by AS answer_by', 'tbl_support.answer_date AS answer_date',
                'tbl_support.answer_img AS answer_img'
            ]
        )
            ->orderBy('tbl_support.id', 'desc')
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->problemsupport->count();
        $data['pagination']	= $this->problemsupport->makePagination(
            base_url('/administrator/problemsupport'), 2, $data['total_rows']
        );
        $data['page']	= 'admin/additional/problem/index';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('/administrator/problemsupport'));
        }

        $keyword	= $this->session->userdata('keyword');
        $data['title']		= $keyword;
        $data['content']	= $this->problemsupport->select(
            [
                'tbl_support.id', 'tbl_support.username AS username', 'tbl_support.tanggal AS request_date',
                'tbl_support.status AS status', 'tbl_support.lang AS language', 'tbl_support.problem AS problem',
                'tbl_support.answer AS answer', 'tbl_support.answer_by AS answer_by', 'tbl_support.answer_date AS answer_date',
                'tbl_support.answer_img AS answer_img'
            ]
        )
            ->like('tbl_support.username', $keyword)
            ->orLike('tbl_support.status', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->problemsupport->like('tbl_support.username', $keyword)->orLike('tbl_support.status', $keyword)->count();
        $data['pagination']	= $this->problemsupport->makePagination(
            base_url('/administrator/problemsupport/search'), 3, $data['total_rows']
        );
        $data['page']		= 'admin/additional/problem/index';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('/administrator/problemsupport'));
    }

    public function answered($id)
    {
        $data['content'] = $this->problemsupport->where('id', $id)->first();

        if (! $data['content']) {
            $this->session->set_flashdata('warning', 'Sorry! Data not found!');
            redirect(base_url('/administrator/problemsupport'));
        }

        if (!$_POST) {
            $data['input']	= $data['content'];
        } else {
            $data['input']	= (object) $this->input->post(null, true);
        }

        if (!$this->problemsupport->validate()) {
            $data['title']			= 'Answer Problem';
            $data['form_action']	= base_url("/administrator/problemsupport/answered/$id");
            $data['page']			= 'admin/additional/problem/form';

            $this->view($data);
            return;
        }

        if ($this->problemsupport->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Problem has been Answered!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred.');
        }

        redirect(base_url('/administrator/problemsupport'));
    }

    public function detail($id)
    {
        $data['rows']	= $this->problemsupport->select(
            [
                'tbl_support.id', 'tbl_support.username AS username', 'tbl_support.tanggal AS request_date',
                'tbl_support.status AS status', 'tbl_support.lang AS language', 'tbl_support.problem AS problem',
                'tbl_support.answer AS answer', 'tbl_support.answer_by AS answer_by', 'tbl_support.answer_date AS answer_date',
                'tbl_support.answer_img AS answer_img',
            ]
        )
            ->where('tbl_support.username', $id)
            ->get();
        $data['page']		= 'admin/additional/problem/detail';
        $this->view($data);
        return;
    }

    public function generateXls() {
        $fileName = 'data-'.time().'.xlsx';
        $this->load->library('excel');
        $listInfo = $this->problemsupport->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Username');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Date Problem');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Status Problem');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Language');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Problem');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Answer');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Answer By');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Answer Date');
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->username);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->tanggal);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->status);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->lang);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->problem);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->answer);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->answer_by);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->answer_date);
            $rowCount++;
        }
        $filename = "Problem List". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');

    }

    public function username($sort, $page = null)
    {
        $data['title']	= 'Problem Support';
        $data['content']	= $this->problemsupport->select(
            [
                'tbl_support.id', 'tbl_support.username AS username', 'tbl_support.tanggal AS request_date',
                'tbl_support.status AS status', 'tbl_support.lang AS language', 'tbl_support.problem AS problem',
                'tbl_support.answer AS answer', 'tbl_support.answer_by AS answer_by', 'tbl_support.answer_date AS answer_date',
                'tbl_support.answer_img AS answer_img'
            ]
        )
            ->orderBy('tbl_support.username', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->problemsupport->count();
        $data['pagination']	= $this->problemsupport->makePagination(
            base_url("/administrator/problemsupport/username/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/additional/problem/index';

        $this->view($data);
    }

    public function date($sort, $page = null)
    {
        $data['title']	= 'Problem Support';
        $data['content']	= $this->problemsupport->select(
            [
                'tbl_support.id', 'tbl_support.username AS username', 'tbl_support.tanggal AS request_date',
                'tbl_support.status AS status', 'tbl_support.lang AS language', 'tbl_support.problem AS problem',
                'tbl_support.answer AS answer', 'tbl_support.answer_by AS answer_by', 'tbl_support.answer_date AS answer_date',
                'tbl_support.answer_img AS answer_img'
            ]
        )
            ->orderBy('tbl_support.tanggal', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->problemsupport->count();
        $data['pagination']	= $this->problemsupport->makePagination(
            base_url("/administrator/problemsupport/date/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/additional/problem/index';

        $this->view($data);
    }

    public function problem($sort, $page = null)
    {
        $data['title']	= 'Problem Support';
        $data['content']	= $this->problemsupport->select(
            [
                'tbl_support.id', 'tbl_support.username AS username', 'tbl_support.tanggal AS request_date',
                'tbl_support.status AS status', 'tbl_support.lang AS language', 'tbl_support.problem AS problem',
                'tbl_support.answer AS answer', 'tbl_support.answer_by AS answer_by', 'tbl_support.answer_date AS answer_date',
                'tbl_support.answer_img AS answer_img'
            ]
        )
            ->orderBy('tbl_support.problem', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->problemsupport->count();
        $data['pagination']	= $this->problemsupport->makePagination(
            base_url("/administrator/problemsupport/problem/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/additional/problem/index';

        $this->view($data);
    }

    public function language($sort, $page = null)
    {
        $data['title']	= 'Problem Support';
        $data['content']	= $this->problemsupport->select(
            [
                'tbl_support.id', 'tbl_support.username AS username', 'tbl_support.tanggal AS request_date',
                'tbl_support.status AS status', 'tbl_support.lang AS language', 'tbl_support.problem AS problem',
                'tbl_support.answer AS answer', 'tbl_support.answer_by AS answer_by', 'tbl_support.answer_date AS answer_date',
                'tbl_support.answer_img AS answer_img'
            ]
        )
            ->orderBy('tbl_support.lang', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->problemsupport->count();
        $data['pagination']	= $this->problemsupport->makePagination(
            base_url("/administrator/problemsupport/language/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/additional/problem/index';

        $this->view($data);
    }

    public function status($sort, $page = null)
    {
        $data['title']	= 'Problem Support';
        $data['content']	= $this->problemsupport->select(
            [
                'tbl_support.id', 'tbl_support.username AS username', 'tbl_support.tanggal AS request_date',
                'tbl_support.status AS status', 'tbl_support.lang AS language', 'tbl_support.problem AS problem',
                'tbl_support.answer AS answer', 'tbl_support.answer_by AS answer_by', 'tbl_support.answer_date AS answer_date',
                'tbl_support.answer_img AS answer_img'
            ]
        )
            ->orderBy('tbl_support.status', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->problemsupport->count();
        $data['pagination']	= $this->problemsupport->makePagination(
            base_url("/administrator/problemsupport/status/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/additional/problem/index';

        $this->view($data);
    }

}

/* End of file Problemsupport.php */
