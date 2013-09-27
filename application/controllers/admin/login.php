<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    	$this->load->model('backend/user', '', TRUE);
    	$this->data['meta_title'] = "Login";
		$this->data['footer_title'] = '2013 &copy; Metronic by keenthemes.';

  }

  public function index()
  {

  	$this->load->view('admin/components/header', $this->data);
    $this->load->view('admin/login');
    $this->load->view('admin/components/tail');

  }

  public function verify()
  {
  	//This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');

    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
     redirect('admin/login');
    }
    else
    {
      //Go to private area

       redirect('admin/dashboard');
    }

  }

  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');

    //query the database
    $result = $this->user->login($username, $password);

    if($result)
    {
       // log file
        $data = array(
        	'log_activity' => mysql_to_unix(date('YmdHis')),
        	'log_detail'   => $this->agent->agent_string(),
        	'log_ip'       => $this->input->ip_address(),
        	'log_date'     => date("Y-m-d H:i:s"),
        	'log_member'   => $username,

        );

        $this->db->insert('logfile', $data);
      foreach($result as $row)
      {
        $sess_array = array(
          'id'          => $row->admin_id,
          'username'    => $row->admin_user,
		  'status'      => $row->admin_status,
		  'type'		=> $row->admin_type,
		  'product'     => $row->product,
          'promotion'   => $row->promotion,
          'banner'      => $row->banner,
          'news'        => $row->news,
          'jobs'        => $row->jobs,
          'knowledge'   => $row->knowledge,
        );
        $session_data = $this->session->set_userdata('logged_in', $sess_array);

      }
      return TRUE;

    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    }
  }

}

?>