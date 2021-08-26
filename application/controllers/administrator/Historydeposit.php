<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historydeposit extends MY_Controller
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
        $data['title']	= 'History Deposit Pools';
        $data['content']	= $this->historydeposit->select(
            [
                'tbl_deposit.id', 'tbl_deposit.username AS username', 'tbl_deposit.tgl AS date',
                'tbl_deposit.doc AS doc', "tbl_deposit.doc->'$.amount' AS amount", "tbl_deposit.doc->'$.txn_id' AS txn_id", "tbl_deposit.doc->'$.wallet_to' AS wallet_to", 'tbl_deposit.status AS status'
            ]
        )
            ->orderBy('tbl_deposit.id', 'desc')
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historydeposit->count();
        $data['pagination']	= $this->historydeposit->makePagination(
            base_url('/administrator/historydeposit'), 2, $data['total_rows']
        );
        $data['page']	= 'admin/history/depositpools';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('/administrator/historydeposit'));
        }

        $keyword	= $this->session->userdata('keyword');
        $data['title']		= $keyword;
        $data['content']	= $this->historydeposit->select(
            [
                'tbl_deposit.id', 'tbl_deposit.username AS username', 'tbl_deposit.tgl AS date',
                'tbl_deposit.doc AS doc', 'tbl_deposit.status AS status'
            ]
        )
            ->like('tbl_deposit.username', $keyword)
            ->orLike('tbl_deposit.tgl', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historydeposit->like('tbl_deposit.username', $keyword)->orLike('tbl_deposit.tgl', $keyword)->count();
        $data['pagination']	= $this->historydeposit->makePagination(
            base_url('/administrator/historydeposit/search'), 3, $data['total_rows']
        );
        $data['page']		= 'admin/history/depositpools';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('/administrator/historydeposit'));
    }

    public function generateXls() {
        $fileName = 'data-'.time().'.xlsx';
        $this->load->library('excel');
        $listInfo = $this->historydeposit->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Username');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Documents');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Status');
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->tgl);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->username);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->doc);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->status);
            $rowCount++;
        }
        $filename = "History Deposit". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');

    }

    public function date($sort, $page = null)
    {
        $data['title']	= 'History Deposit Pools';
        $data['content']	= $this->historydeposit->select(
            [
                'tbl_deposit.id', 'tbl_deposit.username AS username', 'tbl_deposit.tgl AS date',
                'tbl_deposit.doc AS doc', "tbl_deposit.doc->'$.amount' AS amount", "tbl_deposit.doc->'$.txn_id' AS txn_id", "tbl_deposit.doc->'$.wallet_to' AS wallet_to", 'tbl_deposit.status AS status'
            ]
        )
            ->orderBy('tbl_deposit.tgl', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historydeposit->count();
        $data['pagination']	= $this->historydeposit->makePagination(
            base_url("/administrator/historydeposit/date/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/depositpools';

        $this->view($data);
    }

    public function username($sort, $page = null)
    {
        $data['title']	= 'History Deposit Pools';
        $data['content']	= $this->historydeposit->select(
            [
                'tbl_deposit.id', 'tbl_deposit.username AS username', 'tbl_deposit.tgl AS date',
                'tbl_deposit.doc AS doc', "tbl_deposit.doc->'$.amount' AS amount", "tbl_deposit.doc->'$.txn_id' AS txn_id", "tbl_deposit.doc->'$.wallet_to' AS wallet_to", 'tbl_deposit.status AS status'
            ]
        )
            ->orderBy('tbl_deposit.username', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historydeposit->count();
        $data['pagination']	= $this->historydeposit->makePagination(
            base_url("/administrator/historydeposit/username/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/depositpools';

        $this->view($data);
    }

    public function trxid($sort, $page = null)
    {
        $data['title']	= 'History Deposit Pools';
        $data['content']	= $this->historydeposit->select(
            [
                'tbl_deposit.id', 'tbl_deposit.username AS username', 'tbl_deposit.tgl AS date',
                'tbl_deposit.doc AS doc', "tbl_deposit.doc->'$.amount' AS amount", "tbl_deposit.doc->'$.txn_id' AS txn_id", "tbl_deposit.doc->'$.wallet_to' AS wallet_to", 'tbl_deposit.status AS status'
            ]
        )
            ->orderBy("tbl_deposit.doc->'$.txn_id'", $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historydeposit->count();
        $data['pagination']	= $this->historydeposit->makePagination(
            base_url("/administrator/historydeposit/trxid/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/depositpools';

        $this->view($data);
    }

    public function address($sort, $page = null)
    {
        $data['title']	= 'History Deposit Pools';
        $data['content']	= $this->historydeposit->select(
            [
                'tbl_deposit.id', 'tbl_deposit.username AS username', 'tbl_deposit.tgl AS date',
                'tbl_deposit.doc AS doc', "tbl_deposit.doc->'$.amount' AS amount", "tbl_deposit.doc->'$.txn_id' AS txn_id", "tbl_deposit.doc->'$.wallet_to' AS wallet_to", 'tbl_deposit.status AS status'
            ]
        )
            ->orderBy("tbl_deposit.doc->'$.wallet_to'", $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historydeposit->count();
        $data['pagination']	= $this->historydeposit->makePagination(
            base_url("/administrator/historydeposit/address/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/depositpools';

        $this->view($data);
    }

    public function amount($sort, $page = null)
    {
        $data['title']	= 'History Deposit Pools';
        $data['content']	= $this->historydeposit->select(
            [
                'tbl_deposit.id', 'tbl_deposit.username AS username', 'tbl_deposit.tgl AS date',
                'tbl_deposit.doc AS doc', "tbl_deposit.doc->'$.amount' AS amount", "tbl_deposit.doc->'$.txn_id' AS txn_id", "tbl_deposit.doc->'$.wallet_to' AS wallet_to", 'tbl_deposit.status AS status'
            ]
        )
            ->orderBy("tbl_deposit.doc->'$.amount'", $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historydeposit->count();
        $data['pagination']	= $this->historydeposit->makePagination(
            base_url("/administrator/historydeposit/amount/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/depositpools';

        $this->view($data);
    }

    public function status($sort, $page = null)
    {
        $data['title']	= 'History Deposit Pools';
        $data['content']	= $this->historydeposit->select(
            [
                'tbl_deposit.id', 'tbl_deposit.username AS username', 'tbl_deposit.tgl AS date',
                'tbl_deposit.doc AS doc', "tbl_deposit.doc->'$.amount' AS amount", "tbl_deposit.doc->'$.txn_id' AS txn_id", "tbl_deposit.doc->'$.wallet_to' AS wallet_to", 'tbl_deposit.status AS status'
            ]
        )
            ->orderBy('tbl_deposit.status', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->historydeposit->count();
        $data['pagination']	= $this->historydeposit->makePagination(
            base_url("/administrator/historydeposit/status/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/history/depositpools';

        $this->view($data);
    }

}

/* End of file historydeposit.php */
