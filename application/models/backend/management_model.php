<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Management_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

	function insert(){
		 if($this->input->post('send')!=NULL){


    			if($this->input->post('product')=='1'){
	    			$product ='yes';
    			}else{
	    			$product='no';
    			}
    			if($this->input->post('promotion')=='1'){
	    			$promotion ='yes';
    			}else{
	    			$promotion='no';
    			}
    			if($this->input->post('banner')=='1'){
	    			$banner ='yes';
    			}else{
	    			$banner ='no';
    			}
    			if($this->input->post('news')=='1'){
	    			$news ='yes';
    			}else{
	    			$news ='no';
    			}
    			if($this->input->post('jobs')=='1'){
	    			$jobs ='yes';
    			}else{
	    			$jobs ='no';
    			}
    			if($this->input->post('knowledge')=='1'){
	    			$knowledge ='yes';
    			}else{
	    			$knowledge ='no';
    			}
                 //add data
			    	$data = array(
			    	   'admin_user' => $this->input->post('name'),
					   'admin_pass' => md5($this->input->post('password')),
					   'admin_email' => $this->input->post('email'),
					   'admin_type' => 'user',
					   'admin_status' => 'yes',
					   'product' =>  $product,
					   'promotion' => $promotion,
					   'banner'	=> $banner,
					   'news'	=> $news,
					   'jobs' => $jobs,
					   'knowledge' => $knowledge

					);


          if($query = $this->db->insert("admin", $data)){
          	//define the subject of the email
          	$to = $this->input->post('email');
   			$subject = "Register Management User";
			//define the message to be sent. Each line should be separated with \n
			$messages = "Username : ".$this->input->post('username') ." \nPassword: ". $this->input->post('password') ."\n Email: ". $this->input->post('email') ."\n
					 ";

			$headers = 'Content-type: text/plain; charset=UTF-8' . "\r\n";

			mail($to, $subject, $messages, $headers);

			$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>เพิ่มผู้จัดการระบบเรียบร้อย.</strong>
		    </div>');

          }else{
          	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ไม่สามารถเพิ่มผู้จัดการระบบได้!</strong>
		    </div>');
		  }

		  return ($query);

     }
	}// end function

	function edit_data(){
		$id =$this->uri->segment(4);


    	if($this->input->post('send')!=NULL){

	    		if($this->input->post('product')=='1'){
	    			$product ='yes';
    			}else{
	    			$product='no';
    			}
    			if($this->input->post('promotion')=='1'){
	    			$promotion ='yes';
    			}else{
	    			$promotion='no';
    			}
    			if($this->input->post('banner')=='1'){
	    			$banner ='yes';
    			}else{
	    			$banner ='no';
    			}
    			if($this->input->post('news')=='1'){
	    			$news ='yes';
    			}else{
	    			$news ='no';
    			}
    			if($this->input->post('jobs')=='1'){
	    			$jobs ='yes';
    			}else{
	    			$jobs ='no';
    			}
    			if($this->input->post('knowledge')=='1'){
	    			$knowledge ='yes';
    			}else{
	    			$knowledge ='no';
    			}
                 //Edit data
                   $data = array(
					   'admin_status' => $this->input->post('status'),
					   'product' =>  $product,
					   'promotion' => $promotion,
					   'banner'	=> $banner,
					   'news'	=> $news,
					   'jobs' => $jobs,
					   'knowledge' => $knowledge

					);

			$this->db->where('admin_id', $id);
			if( $query = $this->db->update("admin", $data))
			{
			  $this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>เพิ่มผู้จัดการระบบเรียบร้อย.</strong></div>');

			  }else{
			  	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
				    <button class="close" data-dismiss="alert"></button>
				    <strong>ไม่สามารถเพิ่มผู้จัดการระบบได้!</strong></div>');
			  }
			  return ($query);
		}

	}// end function


	function delete($id){
		$query = $this->db->get_where('admin', array('admin_id' => $id));
			foreach ($query->result() as $row)
			{
			     $status = $row->admin_type;

			}
		if($status=='admin'){
				$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
				    <button class="close" data-dismiss="alert"></button>
				    <strong>ไม่สามารถลบผู้จัดการระบบได้!</strong></div>');
		}else{

		$this->db->where('admin_id', $id);
		if($query=$this->db->delete('admin'))
			{
			  $this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ลบผู้จัดการระบบเรียบร้อย.</strong></div>');
			}else{
				$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
				    <button class="close" data-dismiss="alert"></button>
				    <strong>ไม่สามารถลบผู้จัดการระบบได้!</strong></div>');
			}
		}// end if
			return ($query);
	} //end function



} // end class

?>