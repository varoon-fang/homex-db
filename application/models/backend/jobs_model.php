<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class jobs_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

// ------------------------ jobs Mode ------------------------
	function insert(){
		if($this->input->post('send')!=NULL){

    		// add data
                    $data=array(
                	'jobs_name' => $this->input->post('name'),
                	'jobs_education' => $this->input->post('education'),
                	'jobs_amount' => $this->input->post('amount'),
                	'jobs_expert' => $this->input->post('experience'),
                	'jobs_date_end' => $this->input->post('date_end'),
                	'jobs_detail' => $this->input->post('detail'),
                	'jobs_ability' => $this->input->post('ability'),
                	'jobs_date' => date("Y-m-d H:i:s"),

                );
                $query = $this->db->insert('jobs', $data);

        if($query)
		        {
		        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>เพิ่มข้อมูลสำเร็จ.</strong>
				    </div>');


			    }else{
		        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>ไม่สามารถเพิ่มข้อมูลได้!</strong>
				    </div>');
			    }

				return ($query);
		}
	} // end function

	function edit_data($id){
		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):

			    //echo $value;
			    $query = $this->db->get_where('jobs', array('jobs_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->jobs_img;
				     $del = unlink("images/jobs/thumbs/$img");
				     $del2 = unlink("images/jobs/resize/$img");

				}
					$data = array(
						'jobs_img' => "NULL",
					);
			    $this->db->where('jobs_id', $value);
			    $this->db->update('jobs', $data);

		    endforeach;


    	}
    	if($this->input->post('send')!=NULL){

        //add data
	    	$data = array(
	    	   'jobs_name' => $this->input->post('name'),
                	'jobs_education' => $this->input->post('education'),
                	'jobs_amount' => $this->input->post('amount'),
                	'jobs_expert' => $this->input->post('experience'),
                	'jobs_date_end' => $this->input->post('date_end'),
                	'jobs_detail' => $this->input->post('detail'),
                	'jobs_ability' => $this->input->post('ability'),
			);
			$this->db->where('jobs_id', $id);

			$query = ($this->db->update("jobs", $data));

			 if($query)
		        {
		        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>แก้ไขข้อมูลสำเร็จ.</strong>
				    </div>');


			    }else{
		        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>ไม่สามารถแก้ไขข้อมูลได้!</strong>
				    </div>');
			    }

				return ($query);

		}

	}// end function

	

function delete($id)
    {

         $this->db->where('jobs_id', $id);
        $query = $this->db->delete('jobs');
        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ลบข้อมูลสำเร็จ.</strong>
		    </div>');


	    }else{
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ไม่สามารถลบข้อมูลได้!</strong>
		    </div>');
	    }

        return ($query);
    }




} // end class

?>