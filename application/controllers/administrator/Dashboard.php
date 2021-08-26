<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index($page = null)
    {
        $data['title']	= $this->session->userdata('name');
        $data['graph'] = $this->dashboard_model->graph();
        $data['problem'] = $this->dashboard_model->problem_support();
        $data['kyc'] = $this->dashboard_model->member_kyc();
        $data['member'] = $this->dashboard_model->total_member();
        $data['member_kyc'] = $this->dashboard_model->total_member_kyc();
        $data['withdrawal_request'] = $this->dashboard_model->total_withdrawal_req();
        $data['paid'] = $this->dashboard_model->total_member_paid();
        $data['free'] = $this->dashboard_model->total_member_free();
        $data['banned'] = $this->dashboard_model->total_member_banned();
        $data['withdrawal'] = $this->dashboard_model->total_withdrawal();
        $data['deposit'] = $this->dashboard_model->total_deposit();

        $data['page']	= 'admin/dashboard/index';
        $this->view($data);
    }

    function survey_member() {
        foreach($this->dashboard_model->hasil_survey()->result_array() as $row)
        {
            $data[] = array(
                'hasil' => $row['hasil'],
                'total' => $row['total']
            );
        }
        echo json_encode($data);
    }

}

/* End of file Home.php */
