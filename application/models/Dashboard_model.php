<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends MY_Model
{

    public function graph()
    {
        $data = $this->db->query("SELECT username as username, doc->'$.amount' as amount from tbl_deposit where status = 1 order by id DESC limit 22");
        return $data->result();
    }

    function problem_support(){
        $data = $this->db->query("select * from tbl_support where status = 0 order by id DESC LIMIT 5");
        if($data->num_rows() > 0){
            foreach($data->result() as $baris){
                $array[] = $baris;
            }
            return $array;
        }
    }

    function member_kyc(){
        $data = $this->db->query("select * from tbl_member where can_wd = 0 order by id DESC LIMIT 5");
        if($data->num_rows() > 0){
            foreach($data->result() as $baris){
                $array[] = $baris;
            }
            return $array;
        }
    }

    function total_member(){
        $data = $this->db->query("select * from tbl_member where banned = 0 and can_wd = 1");
        if($data->num_rows() > 0){
            return $data->num_rows();
        } else {
            return 0;
        }
    }

    function total_member_kyc(){
        $data = $this->db->query("select * from tbl_member where can_wd = 0");
        if($data->num_rows() > 0){
            return $data->num_rows();
        } else {
            return 0;
        }
    }

    function total_withdrawal_req(){
        $query = $this->db->query("SELECT SUM(amount) AS amount FROM tbl_withdrawal where status= 0");
        if($query->num_rows()>0)
        {
            return number_format($query->row()->amount);
        }
        else
        {
            return 0;
        }
    }

    function total_member_paid(){
        $data = $this->db->query("select * from tbl_member where gratisan = 1 and banned = 0 and can_wd = 1");
        if($data->num_rows() > 0){
            return $data->num_rows();
            } else {
            return 0;
        }
    }

    function total_member_free(){
        $data = $this->db->query("select * from tbl_member where gratisan = 0 and banned = 0 and can_wd = 1");
        if($data->num_rows() > 0){
            return $data->num_rows();
        } else {
            return 0;
        }
    }

    function total_member_banned(){
        $data = $this->db->query("select * from tbl_member where banned = 1");
        if($data->num_rows() > 0){
            return $data->num_rows();
        } else {
            return 0;
        }
    }

    function total_withdrawal(){
        $query = $this->db->query("SELECT SUM(amount) AS amount FROM tbl_withdrawal where status= 1");
        if($query->num_rows()>0)
        {
            return number_format($query->row()->amount);
        }
        else
        {
            return 0;
        }
    }

    function total_deposit(){
        $query = $this->db->query("SELECT SUM(doc->'$.amount') AS amount FROM tbl_deposit where status= 1");
        if($query->num_rows()>0)
        {
            return number_format($query->row()->amount);
        }
        else
        {
            return 0;
        }
    }

    function hasil_survey() {
        $sql = "SELECT gratisan AS gratis, COUNT(*) total FROM tbl_member GROUP BY gratis ";
        return $this->db->query($sql);
    }

}

/* End of file Historydeposit_model.php */
