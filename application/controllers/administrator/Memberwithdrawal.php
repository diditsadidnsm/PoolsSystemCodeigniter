<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Memberwithdrawal extends MY_Controller
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
        $data['title']	= 'Member Withdrawal';
        $data['content']	= $this->memberwithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.send_to AS send_to',
                'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status', 'tbl_withdrawal.tgl AS tgl'
            ]
        )
            ->where('status', 0)
            ->orderBy('tbl_withdrawal.id', 'desc')
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberwithdrawal->where('status', 0)->count();
        $data['pagination']	= $this->memberwithdrawal->makePagination(
            base_url('/administrator/memberwithdrawal'), 2, $data['total_rows']
        );
        $data['page']	= 'admin/memberwithdrawal/index';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('/administrator/memberwithdrawal'));
        }

        $keyword	= $this->session->userdata('keyword');
        $data['title']		= $keyword;
        $data['content']	= $this->memberwithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.send_to AS send_to',
                'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status', 'tbl_withdrawal.tgl AS tgl'
            ]
        )
            ->like('tbl_withdrawal.username', $keyword)
            ->orLike('tbl_withdrawal.amount', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberwithdrawal->like('ttbl_withdrawal.username', $keyword)->orLike('tbl_withdrawal.amount', $keyword)->count();
        $data['pagination']	= $this->memberwithdrawal->makePagination(
            base_url('/administrator/memberwithdrawal/search'), 3, $data['total_rows']
        );
        $data['page']		= 'admin/memberwithdrawal/index';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('/administrator/memberwithdrawal'));
    }

    public function edit()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Failed to Edit");
            redirect('Modal');
        }else{
            $data=array(
                "status"=>$_POST['status'],
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('tbl_withdrawal',$data);
            $this->session->set_flashdata('sukses',"Data Edited Successfully");
            redirect('/administrator/memberwithdrawal');
        }
    }

    public function generateXls() {
        $fileName = 'data-'.time().'.xlsx';
        $this->load->library('excel');
        $listInfo = $this->memberwithdrawal->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Username');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Send to');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Amount');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Status');
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->tgl);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->username);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->send_to);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->amount);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->status);
            $rowCount++;
        }
        $filename = "Member Withdrawal". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');

    }

    public function date($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberwithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.send_to AS send_to',
                'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status', 'tbl_withdrawal.tgl AS tgl'
            ]
        )
            ->where('status', 0)
            ->orderBy('tbl_withdrawal.tgl', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberwithdrawal->where('status', 0)->count();
        $data['pagination']	= $this->memberwithdrawal->makePagination(
            base_url("/administrator/memberwithdrawal/date/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberwithdrawal/index';

        $this->view($data);
    }

    public function username($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberwithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.send_to AS send_to',
                'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status', 'tbl_withdrawal.tgl AS tgl'
            ]
        )
            ->where('status', 0)
            ->orderBy('tbl_withdrawal.username', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberwithdrawal->where('status', 0)->count();
        $data['pagination']	= $this->memberwithdrawal->makePagination(
            base_url("/administrator/memberwithdrawal/username/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberwithdrawal/index';

        $this->view($data);
    }

    public function sendto($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberwithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.send_to AS send_to',
                'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status', 'tbl_withdrawal.tgl AS tgl'
            ]
        )
            ->where('status', 0)
            ->orderBy('tbl_withdrawal.send_to', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberwithdrawal->where('status', 0)->count();
        $data['pagination']	= $this->memberwithdrawal->makePagination(
            base_url("/administrator/memberwithdrawal/sendto/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberwithdrawal/index';

        $this->view($data);
    }

    public function amount($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberwithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.send_to AS send_to',
                'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status', 'tbl_withdrawal.tgl AS tgl'
            ]
        )
            ->where('status', 0)
            ->orderBy('tbl_withdrawal.amount', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberwithdrawal->where('status', 0)->count();
        $data['pagination']	= $this->memberwithdrawal->makePagination(
            base_url("/administrator/memberwithdrawal/amount/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberwithdrawal/index';

        $this->view($data);
    }

    public function status($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberwithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.send_to AS send_to',
                'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status', 'tbl_withdrawal.tgl AS tgl'
            ]
        )
            ->where('status', 0)
            ->orderBy('tbl_withdrawal.status', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberwithdrawal->where('status', 0)->count();
        $data['pagination']	= $this->memberwithdrawal->makePagination(
            base_url("/administrator/memberwithdrawal/status/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberwithdrawal/index';

        $this->view($data);
    }

}

/* End of file Home.php */
