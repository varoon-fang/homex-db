<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Knowledge_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

		$this->load->library('image_moo');
    }

// ---------------- knowledge ----------------
public function list_group()
	{
		$sql= "select * from knowledge_group order by knowledge_group_name asc";
    		$query = $this->db->query($sql);

    		return ($query);
	}
public function get_list($id)
	{
		$sql2="select * from knowledge where knowledge_id='$id' ";
			$rs=$this->db->query($sql2);

			if($rs->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/knowledge'</script>";
			}

				return ($rs->row_array());
	}

public function insert()
	{
		if($this->input->post('send')!=NULL){

			$path = 'images/knowledge/';
			$config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['encrypt_name']= TRUE;

            $this->upload->initialize($config);

            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {

                $config = array(
			    	'allowed_types' => 'jpg|jpeg|gif|png',
			        'upload_path' => $path,
			        'overwrite' => true,
			        'encrypt_name' => TRUE,
			    );

			    $this->load->library('upload', $config);
			    $this->upload->do_upload();
			    $image_data = $this->upload->data();

				$name = time();

				$this->image_moo->load($image_data['full_path'])->resize(720, 480)->save_pa('resize/'.$name);
				$this->image_moo->load($image_data['full_path'])->resize(270, 180)->save_pa('thumbs/'.$name);

				unlink($path.$image_data['file_name']);
			}
		}

    		//add data
	    	$data = array(
	    	   'knowledge_title' 		 => $this->input->post('name'),
			   'knowledge_detail'      => $this->input->post('detail'),
			   'knowledge_img'         => $name.$image_data['file_ext'],
			   'knowledge_date'        => date('Y-m-d H:i:s'),
			);
		$query = $this->db->insert("knowledge", $data);


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
		}// end if send
	} // end function

public function edit_data($id)
	{
    	if($this->input->post('send')!=NULL){

        //add data
	    	$data = array(
	    	   'knowledge_title' 	   => $this->input->post('name'),
			   'knowledge_detail'      => $this->input->post('detail'),
			);
			$this->db->where('knowledge_id', $id);

			$query = $this->db->update("knowledge", $data);

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

public function update_pic()
	{
		$id=$this->input->post('id_knowledge');

	    if($this->input->post('upload_img')!=NULL){

			$path = 'images/knowledge/';

			$config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['encrypt_name']= TRUE;

            $this->upload->initialize($config);

            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
                  	$config = array(
				    	'allowed_types' => 'jpg|jpeg|gif|png',
				        'upload_path' => $path,
				        'overwrite' => true,
				        'encrypt_name' => TRUE,
				    );

				    $this->load->library('upload', $config);
				    $this->upload->do_upload();
				    $image_data = $this->upload->data();

					$name = time();

					$this->image_moo->load($image_data['full_path'])->resize(720, 480)->save_pa('resize/'.$name);
					$this->image_moo->load($image_data['full_path'])->resize(270, 180)->save_pa('thumbs/'.$name);

					unlink($path.$image_data['file_name']);
               }
			}

    		// add images
    			$idd=$this->input->post('id_knowledge');
                    $data_img=array(
                	'knowledge_img' => $name.$image_data['file_ext'],

                );
                $this->db->where('knowledge_id', $id);
                $query = $this->db->update('knowledge', $data_img);

				if($query)
		        {
		        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>อัพโหลดรูปภาพสำเร็จ.</strong>
				    </div>');

			    }else{
		        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>ไม่สามารถอัพโหลดรูปภาพได้!</strong>
				    </div>');
			    }

				return ($query);

      }
	}// end function

public function delete($id)
    {
    	$query = $this->db->get_where('knowledge', array('knowledge_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->knowledge_img;
				     $del = unlink("images/knowledge/thumbs/$img");
				     $del2 = unlink("images/knowledge/resize/$img");

				}

         $this->db->where('knowledge_id', $id);
        $query = $this->db->delete('knowledge');
		if(!$query)
		{
			$this->session->set_flashdata('feedback', ' <div class="alert alert-warning" id="alert-message">
								<button class="close" data-dismiss="alert"></button>
								ไม่สามารถลบข้อมูลได้ !</div>');
		}else {
			$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
								<button class="close" data-dismiss="alert"></button>
								ลบข้อมูลสำเร็จ.</div>');
		}
		return($query);
    }

public function delete_img($id)
    {
    	error_reporting(0);
    	$query = $this->db->get_where('knowledge', array('knowledge_img' => $id));

				foreach ($query->result() as $row)
				{
					 $idd = $row->knowledge_id;
				     $img = $row->knowledge_img;
				     $del = unlink("images/knowledge/thumbs/$img");
				     $del2 = unlink("images/knowledge/resize/$img");

				}
				$data = array(
					'knowledge_img' => NULL,
				);
        $this->db->where('knowledge_id', $idd);
        $query = $this->db->update('knowledge', $data);

        if(!$query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-warning" id="alert-message">
									<button class="close" data-dismiss="alert"></button>
									ไม่สามารถลบข้อมูลได้ !</div>');
		}else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
									<button class="close" data-dismiss="alert"></button>
									ลบข้อมูลสำเร็จ.</div>');
		}
	return($query);
    }


} // end class

?>