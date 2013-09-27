<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

// ------------------------ Profile Mode ------------------------
public function update_data($id)
	{
		if($this->input->post('send')!=NULL){
    		//$id= $this->input->post('profiles');

    		if($this->input->post('password')!=""){
    			//send mail
			$to = "regulators13@gmail.com".',';
            $to .= $this->input->post('email').',';

			//define the subject of the email
			$subject = "Change Username / Password ";
			//define the message to be sent. Each line should be separated with \n
			$messages = "User : ".$this->input->post('username') ." \n\n Password: ". $this->input->post('password') ."\n\n ";

			//require('sendmail.asp');
			 mail($to, $subject, $messages );

	    		$data = array(
				   'admin_user' => $this->input->post('name'),
				   'admin_email' => $this->input->post('email'),
				   'admin_pass' => md5($this->input->post('pass')) ,
				);
    		}else{
	    		$data = array(
				   'admin_user' => $this->input->post('name'),
				   'admin_email' => $this->input->post('email'),
				);
    		}

			$this->db->where('admin_id', $id);
			$query = $this->db->update("admin", $data);

		$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>เพิ่มผู้จัดการระบบเรียบร้อย.</strong></div>');
			return ($query);
		}
    }




} // end class

?>