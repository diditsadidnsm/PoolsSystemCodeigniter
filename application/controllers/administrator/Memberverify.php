<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Memberverify extends MY_Controller
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
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberverify->select(
            [
                'tbl_member.id', 'tbl_member.img_ktp AS img_ktp', 'tbl_member.img_selfie AS img_selfie',
                'tbl_member.username AS username', 'tbl_member.nama AS name', 'tbl_member.no_ktp AS no_ktp'
            ]
        )
            ->where('can_wd', 0)
            ->orderBy('tbl_member.id', 'desc')
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberverify->count();
        $data['pagination']	= $this->memberverify->makePagination(
            base_url('/administrator/memberverify'), 2, $data['total_rows']
        );
        $data['page']	= 'admin/memberverify/index';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('/administrator/memberverify'));
        }

        $keyword	= $this->session->userdata('keyword');
        $data['title']		= $keyword;
        $data['content']	= $this->memberverify->select(
            [
                'tbl_member.id', 'tbl_member.img_ktp AS img_ktp', 'tbl_member.img_selfie AS img_selfie',
                'tbl_member.username AS username', 'tbl_member.nama AS name', 'tbl_member.no_ktp AS no_ktp'
            ]
        )
            ->like('tbl_member.nama', $keyword)
            ->orLike('tbl_member.username', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberverify->like('tbl_member.nama', $keyword)->orLike('tbl_member.username', $keyword)->count();
        $data['pagination']	= $this->memberverify->makePagination(
            base_url('/administrator/memberverify/search'), 3, $data['total_rows']
        );
        $data['page']		= 'admin/memberverify/index';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('/administrator/memberverify'));
    }

    public function edit()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('can_wd', 'can_wd', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Failed to Edit");
            redirect('Modal');
        }else{
            $data=array(
                "can_wd"=>$_POST['can_wd'],
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('tbl_member',$data);
            $this->session->set_flashdata('sukses',"Data Edited Successfully");
            redirect('/administrator/memberverify');
        }
    }

    public function generateXls() {
        $fileName = 'data-'.time().'.xlsx';
        $this->load->library('excel');
        $listInfo = $this->memberverify->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Profile');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'ID Card');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'ID Number');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Fullname');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Username');
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->img_selfie);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->img_ktp);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->no_ktp);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->nama);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->username);
            $rowCount++;
        }
        $filename = "Member KYC". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');

    }

    public function profile($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberverify->select(
            [
                'tbl_member.id', 'tbl_member.img_ktp AS img_ktp', 'tbl_member.img_selfie AS img_selfie',
                'tbl_member.username AS username', 'tbl_member.nama AS name', 'tbl_member.no_ktp AS no_ktp'
            ]
        )
            ->where('can_wd', 0)
            ->orderBy('tbl_member.img_selfie', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberverify->where('can_wd', 0)->count();
        $data['pagination']	= $this->memberverify->makePagination(
            base_url("/administrator/memberverify/profile/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberverify/index';

        $this->view($data);
    }

    public function idcard($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberverify->select(
            [
                'tbl_member.id', 'tbl_member.img_ktp AS img_ktp', 'tbl_member.img_selfie AS img_selfie',
                'tbl_member.username AS username', 'tbl_member.nama AS name', 'tbl_member.no_ktp AS no_ktp'
            ]
        )
            ->where('can_wd', 0)
            ->orderBy('tbl_member.img_ktp', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberverify->where('can_wd', 0)->count();
        $data['pagination']	= $this->memberverify->makePagination(
            base_url("/administrator/memberverify/idcard/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberverify/index';

        $this->view($data);
    }

    public function idnumber($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberverify->select(
            [
                'tbl_member.id', 'tbl_member.img_ktp AS img_ktp', 'tbl_member.img_selfie AS img_selfie',
                'tbl_member.username AS username', 'tbl_member.nama AS name', 'tbl_member.no_ktp AS no_ktp'
            ]
        )
            ->where('can_wd', 0)
            ->orderBy('tbl_member.no_ktp', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberverify->where('can_wd', 0)->count();
        $data['pagination']	= $this->memberverify->makePagination(
            base_url("/administrator/memberverify/idnumber/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberverify/index';

        $this->view($data);
    }

    public function fullname($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberverify->select(
            [
                'tbl_member.id', 'tbl_member.img_ktp AS img_ktp', 'tbl_member.img_selfie AS img_selfie',
                'tbl_member.username AS username', 'tbl_member.nama AS name', 'tbl_member.no_ktp AS no_ktp'
            ]
        )
            ->where('can_wd', 0)
            ->orderBy('tbl_member.nama', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberverify->where('can_wd', 0)->count();
        $data['pagination']	= $this->memberverify->makePagination(
            base_url("/administrator/memberverify/fullname/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberverify/index';

        $this->view($data);
    }

    public function username($sort, $page = null)
    {
        $data['title']	= 'Member KYC';
        $data['content']	= $this->memberverify->select(
            [
                'tbl_member.id', 'tbl_member.img_ktp AS img_ktp', 'tbl_member.img_selfie AS img_selfie',
                'tbl_member.username AS username', 'tbl_member.nama AS name', 'tbl_member.no_ktp AS no_ktp'
            ]
        )
            ->where('can_wd', 0)
            ->orderBy('tbl_member.username', $sort)
            ->paginate($page)
            ->get();
        $data['total_rows']	= $this->memberverify->where('can_wd', 0)->count();
        $data['pagination']	= $this->memberverify->makePagination(
            base_url("/administrator/memberverify/username/$sort"), 4, $data['total_rows']
        );
        $data['page']	= 'admin/memberverify/index';

        $this->view($data);
    }
    
}

/* End of file Memberverify.php */
