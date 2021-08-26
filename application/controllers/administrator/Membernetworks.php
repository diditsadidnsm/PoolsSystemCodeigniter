<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Membernetworks extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index($page = null)
    {
        $data['title']	= 'Member Networks';

        $this->load->view('admin/membernetworks/index', $data);
    }

    public function getMembers()
    {
        $data = [];
        $parent_key = 'PLS000001';
        $row = $this->db->query('SELECT id_member, username from tbl_member');

        if($row->num_rows() > $parent_key)
        {
            $data = $this->membersTree($parent_key);
        }else{
            $data=["id"=>"PLS000000","pid"=>"None","username"=>"No Members is presnt in list","nodes"=>[]];
        }
        echo json_encode(array_values($data));
    }

    public function membersTree($parent_key)
    {
        $row1 = [];
        $row = $this->db->query('SELECT id_member, id_upline, username from tbl_member WHERE id_upline="'.$parent_key.'"')->result_array();

        foreach($row as $key => $value)
        {
            $value['id_member'];
            $row1[$key]['id'] = $value['id_member'];
            $row1[$key]['pid'] = $value['id_upline'];
            $row1[$key]['username'] = $value['username'];
        }
        return $row1;
    }
}

/* End of file Membernetwokrs.php */
