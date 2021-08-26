<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historywithdrawal extends MY_Controller
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
        $data['title']	= 'History Withdrawal Pools';
        $data['content']	= $this->historywithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.tgl AS date', 'tbl_withdrawal.trx_id AS trx_id',
                'tbl_withdrawal.send_to AS send_to', 'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status'
            ]
        )
            ->where('tbl_withdrawal.status', 1,2)
            ->orderBy('tbl_withdrawal.id', 'desc')
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historywithdrawal->count();
        $data['pagination']	= $this->historywithdrawal->makePagination(
            base_url('/administrator/historywithdrawal'), 2, $data['total_rows']
        );
        $data['page']	= 'admin/history/withdrawalpools';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('/administrator/historywithdrawal'));
        }

        $keyword	= $this->session->userdata('keyword');
        $data['title']		= $keyword;
        $data['content']	= $this->historywithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.tgl AS date', 'tbl_withdrawal.trx_id AS trx_id',
                'tbl_withdrawal.send_to AS send_to', 'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status'
            ]
        )
            ->like('tbl_withdrawal.username', $keyword)
            ->orLike('tbl_withdrawal.tgl', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historywithdrawal->like('tbl_withdrawal.username', $keyword)->orLike('tbl_withdrawal.tgl', $keyword)->count();
        $data['pagination']	= $this->historywithdrawal->makePagination(
            base_url('/administrator/historywithdrawal/search'), 3, $data['total_rows']
        );
        $data['page']		= 'admin/history/withdrawalpools';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('/administrator/historywithdrawal'));
    }

    public function generateXls() {
        $fileName = 'data-'.time().'.xlsx';
        $this->load->library('excel');
        $listInfo = $this->historywithdrawal->exportList();
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
        $filename = "History Withdrawal". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');

    }

    public function date($sort, $page = null)
    {
        $data['title']	= 'History Withdrawal Pools';
        $data['content']	= $this->historywithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.tgl AS date', 'tbl_withdrawal.trx_id AS trx_id',
                'tbl_withdrawal.send_to AS send_to', 'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status'
            ]
        )
            ->where('tbl_withdrawal.status', 1,2)
            ->orderBy('tbl_withdrawal.tgl', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historywithdrawal->where('tbl_withdrawal.status', 1,2)->count();
        $data['pagination']	= $this->historywithdrawal->makePagination(
            base_url("/administrator/historywithdrawal/date/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/withdrawalpools';

        $this->view($data);
    }

    public function username($sort, $page = null)
    {
        $data['title']	= 'History Withdrawal Pools';
        $data['content']	= $this->historywithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.tgl AS date', 'tbl_withdrawal.trx_id AS trx_id',
                'tbl_withdrawal.send_to AS send_to', 'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status'
            ]
        )
            ->where('tbl_withdrawal.status', 1,2)
            ->orderBy('tbl_withdrawal.username', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historywithdrawal->where('tbl_withdrawal.status', 1,2)->count();
        $data['pagination']	= $this->historywithdrawal->makePagination(
            base_url("/administrator/historywithdrawal/username/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/withdrawalpools';

        $this->view($data);
    }

    public function trxid($sort, $page = null)
    {
        $data['title']	= 'History Withdrawal Pools';
        $data['content']	= $this->historywithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.tgl AS date', 'tbl_withdrawal.trx_id AS trx_id',
                'tbl_withdrawal.send_to AS send_to', 'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status'
            ]
        )
            ->where('tbl_withdrawal.status', 1,2)
            ->orderBy('tbl_withdrawal.trx_id', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historywithdrawal->where('tbl_withdrawal.status', 1,2)->count();
        $data['pagination']	= $this->historywithdrawal->makePagination(
            base_url("/administrator/historywithdrawal/trxid/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/withdrawalpools';

        $this->view($data);
    }

    public function address($sort, $page = null)
    {
        $data['title']	= 'History Withdrawal Pools';
        $data['content']	= $this->historywithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.tgl AS date', 'tbl_withdrawal.trx_id AS trx_id',
                'tbl_withdrawal.send_to AS send_to', 'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status'
            ]
        )
            ->where('tbl_withdrawal.status', 1,2)
            ->orderBy('tbl_withdrawal.send_to', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historywithdrawal->where('tbl_withdrawal.status', 1,2)->count();
        $data['pagination']	= $this->historywithdrawal->makePagination(
            base_url("/administrator/historywithdrawal/address/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/withdrawalpools';

        $this->view($data);
    }

    public function amount($sort, $page = null)
    {
        $data['title']	= 'History Withdrawal Pools';
        $data['content']	= $this->historywithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.tgl AS date', 'tbl_withdrawal.trx_id AS trx_id',
                'tbl_withdrawal.send_to AS send_to', 'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status'
            ]
        )
            ->where('tbl_withdrawal.status', 1,2)
            ->orderBy('tbl_withdrawal.amount', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historywithdrawal->where('tbl_withdrawal.status', 1,2)->count();
        $data['pagination']	= $this->historywithdrawal->makePagination(
            base_url("/administrator/historywithdrawal/amount/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/withdrawalpools';

        $this->view($data);
    }

    public function status($sort, $page = null)
    {
        $data['title']	= 'History Withdrawal Pools';
        $data['content']	= $this->historywithdrawal->select(
            [
                'tbl_withdrawal.id', 'tbl_withdrawal.username AS username', 'tbl_withdrawal.tgl AS date', 'tbl_withdrawal.trx_id AS trx_id',
                'tbl_withdrawal.send_to AS send_to', 'tbl_withdrawal.amount AS amount', 'tbl_withdrawal.status AS status'
            ]
        )
            ->where('tbl_withdrawal.status', 1,2)
            ->orderBy('tbl_withdrawal.status', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historywithdrawal->where('tbl_withdrawal.status', 1,2)->count();
        $data['pagination']	= $this->historywithdrawal->makePagination(
            base_url("/administrator/historywithdrawal/status/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/withdrawalpools';

        $this->view($data);
    }

}

/* End of file Historywithdrawal.php */
