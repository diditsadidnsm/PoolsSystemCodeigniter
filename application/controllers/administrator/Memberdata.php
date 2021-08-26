<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Memberdata extends MY_Controller
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
        $data['title']	= 'Member Data';
        $data['content']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan', 'tbl_member.active_total AS active'
            ]
        )
            ->where('can_wd', 1)
            ->orderBy('tbl_member.id', 'desc')
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberdata->where('can_wd', 1)->count();
        $data['pagination']	= $this->memberdata->makePagination(
            base_url('/administrator/memberdata'), 2, $data['total_rows']
        );
        $data['page']	= 'admin/memberdata/index';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('/administrator/memberdata'));
        }

        $keyword	= $this->session->userdata('keyword');
        $data['title']		= $keyword;
        $data['content']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan', 'tbl_member.active_total AS active'
            ]
        )
            ->like('tbl_member.nama', $keyword)
            ->orLike('tbl_member.username', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberdata->like('tbl_member.nama', $keyword)->orLike('tbl_member.username', $keyword)->count();
        $data['pagination']	= $this->memberdata->makePagination(
            base_url('/administrator/memberdata/search'), 3, $data['total_rows']
        );
        $data['page']		= 'admin/memberdata/index';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('/administrator/memberdata'));
    }

    public function edit($id)
    {
        $data['content'] = $this->memberdata->where('trxpin', $id)->first();

        if (! $data['content']) {
            $this->session->set_flashdata('warning', 'Sorry! Data not found!');
            redirect(base_url('/administrator/memberdata'));
        }

        if (!$_POST) {
            $data['input']	= $data['content'];
        } else {
            $data['input']	= (object) $this->input->post(null, true);
        }

        if (!$this->memberdata->validate()) {
            $data['title']			= 'Edit Member Data';
            $data['form_action']	= base_url("/administrator/memberdata/edit/$id");
            $data['page']			= 'admin/memberdata/form';

            $this->view($data);
            return;
        }

        if ($this->memberdata->where('trxpin', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Member Data updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Oops! An error occurred.');
        }

        redirect(base_url('/administrator/memberdata'));
    }

    public function detail($id)
    {
        $data['rows']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan',
                'tbl_member.id_member', 'tbl_member.register_by', 'tbl_member.last_activity', 'tbl_member.last_login',
                'tbl_member.date_active', 'tbl_member.date_expired', 'tbl_member.alamat AS address', 'tbl_member.kabkota AS kabupaten',
                'tbl_member.provinsi AS provinsi', 'tbl_member.negara AS negara',
                'tbl_member.alamat AS address', 'tbl_member.active_bonus AS active_bonus', 'tbl_member.bonus_referral AS bonus_referral',
                'tbl_member.bonus_royalti AS bonus_royalty', 'tbl_member.bonus_topsponsor AS bonus_topsponsor',
                'tbl_member.bonus_pns AS bonus_pns', 'tbl_member.bonus_nsp AS bonus_nsp', 'tbl_member.active_total AS active_total',
                'tbl_member.enable_bonus AS enable_bonus', 'tbl_member.active_claimed AS active_claimed'
            ]
        )
            ->where('tbl_member.trxpin', $id)
            ->get();
        $data['page']		= 'admin/memberdata/detail';
        $this->view($data);
        return;
    }

    public function generateXls() {
        $fileName = 'data-'.time().'.xlsx';
        $this->load->library('excel');
        $listInfo = $this->memberdata->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Register Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Username');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact No');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Balance');
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->date_created);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->username);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->nama);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->phone);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->active_total);
            $rowCount++;
        }
        $filename = "Member Data". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');

    }

    public function date($sort, $page = null)
    {
        $data['title']	= 'Member Data';
        $data['content']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan', 'tbl_member.active_total AS active'
            ]
        )
            ->where('can_wd', 1)
            ->orderBy('tbl_member.date_created', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberdata->where('can_wd', 1)->count();
        $data['pagination']	= $this->memberdata->makePagination(
            base_url("/administrator/memberdata/date/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberdata/index';

        $this->view($data);
    }

    public function username($sort, $page = null)
    {
        $data['title']	= 'Member Data';
        $data['content']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan', 'tbl_member.active_total AS active'
            ]
        )
            ->where('can_wd', 1)
            ->orderBy('tbl_member.username', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberdata->where('can_wd', 1)->count();
        $data['pagination']	= $this->memberdata->makePagination(
            base_url("/administrator/memberdata/username/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberdata/index';

        $this->view($data);
    }

    public function name($sort, $page = null)
    {
        $data['title']	= 'Member Data';
        $data['content']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan', 'tbl_member.active_total AS active'
            ]
        )
            ->where('can_wd', 1)
            ->orderBy('tbl_member.nama', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberdata->where('can_wd', 1)->count();
        $data['pagination']	= $this->memberdata->makePagination(
            base_url("/administrator/memberdata/name/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberdata/index';

        $this->view($data);
    }

    public function email($sort, $page = null)
    {
        $data['title']	= 'Member Data';
        $data['content']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan', 'tbl_member.active_total AS active'
            ]
        )
            ->where('can_wd', 1)
            ->orderBy('tbl_member.email', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberdata->where('can_wd', 1)->count();
        $data['pagination']	= $this->memberdata->makePagination(
            base_url("/administrator/memberdata/email/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberdata/index';

        $this->view($data);
    }

    public function balance($sort, $page = null)
    {
        $data['title']	= 'Member Data';
        $data['content']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan', 'tbl_member.active_total AS active'
            ]
        )
            ->where('can_wd', 1)
            ->orderBy('tbl_member.active_total', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberdata->where('can_wd', 1)->count();
        $data['pagination']	= $this->memberdata->makePagination(
            base_url("/administrator/memberdata/balance/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberdata/index';

        $this->view($data);
    }

    public function status($sort, $page = null)
    {
        $data['title']	= 'Member Data';
        $data['content']	= $this->memberdata->select(
            [
                'tbl_member.id', 'tbl_member.date_created AS date_created', 'tbl_member.username AS username', 'tbl_member.trxpin AS trxpin',
                'tbl_member.nama AS name', 'tbl_member.email AS email', 'tbl_member.gratisan AS gratisan', 'tbl_member.active_total AS active'
            ]
        )
            ->where('can_wd', 1)
            ->orderBy('tbl_member.gratisan', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberdata->where('can_wd', 1)->count();
        $data['pagination']	= $this->memberdata->makePagination(
            base_url("/administrator/memberdata/status/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberdata/index';

        $this->view($data);
    }

}

/* End of file Home.php */
