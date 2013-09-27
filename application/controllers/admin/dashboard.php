<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    	$this->load->model("backend/user");
	    $this->data['meta_title'] = 'Dashboard';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';
  }

  public function index()
  {

    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];

		$sql="select * from product group by product_group asc limit 6 ";
		$res=$this->db->query($sql);
		$data['rs_product'] = $res->result_array();

		$sql_2="select * from promotion order by promotion_id desc limit 6 ";
		$res2=$this->db->query($sql_2);
		$data['rs_promotion'] = $res2->result_array();

		$sql_3="select * from news order by news_id desc limit 6";
		$res3=$this->db->query($sql_3);
		$data['rs_news'] = $res3->result_array();

		$sql_4="select * from knowledge order by knowledge_id desc limit 6";
		$res4=$this->db->query($sql_4);
		$data['rs_knowledge'] = $res4->result_array();

		$sql_5="select * from admin where admin_type='user'";
		$res5=$this->db->query($sql_5);
		$data['rs_management'] = $res5->result_array();

      $this->load->view('admin/components/header', $this->data);
      $this->load->view('admin/dashboard', $data);
      $this->load->view('admin/components/tail');
    }
    else
    {
      //If no session, redirect to login page
      redirect('admin/login');
	}
  }

  public function logout()
  {
  	session_destroy();
    $this->session->unset_userdata('logged_in');
    redirect('admin/dashboard');
  }


}

?>