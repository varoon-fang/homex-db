<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Promotion_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

// ---------------- promotion ----------------
public function list_group()
	{
		$sql= "select * from promotion_group order by promotion_group_name asc";
    		$query = $this->db->query($sql);

    		return ($query);
	}
public function get_list($id)
	{
		$sql2="select * from promotion where promotion_id='$id' ";
			$rs=$this->db->query($sql2);

			if($rs->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/promotion'</script>";
			}

				return ($rs->row_array());
	}

public function insert()
	{
		if (isset($_POST['send']))
        {
			$path = 'images/promotion';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['encrypt_name']= TRUE;

            $this->upload->initialize($config);

            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
                        $data[$field] = $this->upload->data();

                // set the resize config
                $resize_conf = array(
                	'remove_spaces' => TRUE,
				    'quality' => 80,
                    'source_image'  => $data['userfile']['full_path'],
                    'new_image'     => $data['userfile']['file_path'].'img/'.$data['userfile']['file_name'],
                    'width'         => 255,
                    'height'        => 335
                    );

                // initializing
                $this->image_lib->initialize($resize_conf);


                    $this->image_lib->resize();
                    }
                    else
                    {
                        $errors = $this->upload->display_errors();
                    }
                }
              }
			  unlink("images/promotion/".$data['userfile']['file_name']);
    		//add data
	    	$data = array(
	    	   'promotion_title' 	=> $this->input->post('name'),
			   'promotion_detail'   => $this->input->post('detail'),
			   'promotion_img'      => $data['userfile']['file_name'],
			   'promotion_pdf'      => $data['file']['file_name'],
			   'promotion_date'     => date('Y-m-d H:i:s'),
			);
		$query = $this->db->insert("promotion", $data);



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

public function edit_data($id)
	{
		if($this->input->post('send')!=NULL){

        //add data
	    	$data = array(
	    	   'promotion_title' 		 => $this->input->post('name'),
			   'promotion_detail'      => $this->input->post('detail'),
			);
			$this->db->where('promotion_id', $id);

			$query = $this->db->update("promotion", $data);

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
	    if($this->input->post('upload_img')!=NULL){
        	$config['upload_path'] = './images/promotion';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']= TRUE;

            $this->upload->initialize($config);

            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
                        $data[$field] = $this->upload->data();

                // set the resize config
                $resize_conf = array(
                	'remove_spaces' => TRUE,
				    'maintain_ratio' => false,
                    'source_image'  => $data['userfile']['full_path'],
                    'new_image'     => $data['userfile']['file_path'].'img/'.$data['userfile']['file_name'],
                    'width'         => 255,
                    'height'        => 335
                    );

                // initializing
                $this->image_lib->initialize($resize_conf);


                    $this->image_lib->resize();
                    }
                    else
                    {
                        $errors = $this->upload->display_errors();
                    }
                }
               // print_r($data);

            }
			unlink("images/promotion/".$data['userfile']['file_name']);
    		// add images
    			$idd=$this->input->post('id_promotion');
                    $data_img =array(
                	'promotion_img' => $data['userfile']['file_name'],

                );
                $this->db->where('promotion_id', $idd);
                $query = $this->db->update('promotion', $data_img);

				if(!$query)
				{
					$this->session->set_flashdata('feedback', ' <div class="alert alert-warning" id="alert-message">
										<button class="close" data-dismiss="alert"></button>
										ไม่สามารถเพิ่มรูปภาพได้ !</div>');
				}else {
					$this->session->set_flashdata('feedback', '<div class="alert alert-success" id="alert-message">
										<button class="close" data-dismiss="alert"></button>
										เพิ่มรูปภาพสำเร็จ.</div>');
				}

				return ($query);

		}
	}// end function

public function update_pdf()
	{
	    if($this->input->post('upload_img')!=NULL){
        	$config['upload_path'] = './images/promotion';
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name']= TRUE;

            $this->upload->initialize($config);

            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
                        $data[$field] = $this->upload->data();

					}
                    else
                    {
                        $errors = $this->upload->display_errors();
                    }
                }
               // print_r($data);

            }

    		// add images
    			$idd=$this->input->post('id_promotion');
                    $data_img =array(
                	'promotion_pdf' => $data['file']['file_name'],

                );
                $this->db->where('promotion_id', $idd);
                $query = $this->db->update('promotion', $data_img);

				if(!$query)
				{
					$this->session->set_flashdata('feedback', ' <div class="alert alert-warning" id="alert-message">
										<button class="close" data-dismiss="alert"></button>
										ไม่สามารถเพิ่มไฟล์ PDF ได้ !</div>');
				}else {
					$this->session->set_flashdata('feedback', '<div class="alert alert-success" id="alert-message">
										<button class="close" data-dismiss="alert"></button>
										เพิ่มไฟล์ PDF สำเร็จ.</div>');
				}

				return ($query);

	      }
	}// end function

public function delete($id)
    {
    	error_reporting(0);
    	$query = $this->db->get_where('promotion', array('promotion_id' => $id));

				foreach ($query->result_array() as $row)
				{
				     $img = $row['promotion_img'];
				     $pdf = $row['promotion_pdf'];

				     $del = unlink("images/promotion/$img");
				     $del2 = unlink("images/promotion/img/$img");
				     $del_pdf = unlink("images/promotion/$pdf");

				}

        $this->db->where('promotion_id', $id);
        $query = $this->db->delete('promotion');
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
    	$query = $this->db->get_where('promotion', array('promotion_img' => $id));

				foreach ($query->result_array() as $row)
				{
					 $idd = $row['promotion_id'];
				     $img = $row['promotion_img'];
				    // $del = unlink("images/promotion/$img");
				     $del2 = unlink("images/promotion/img/$img");

				}
				$data = array(
					'promotion_img' => NULL,
				);
        $this->db->where('promotion_id', $idd);
        $query = $this->db->update('promotion', $data);

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

public function delete_pdf($id)
    {
    	$query = $this->db->get_where('promotion', array('promotion_pdf' => $id));

				foreach ($query->result_array() as $row)
				{
					 $idd = $row['promotion_id'];
				     $pdf = $row['promotion_pdf'];
				     $del = unlink("images/promotion/$pdf");

				}
				$data = array(
					'promotion_pdf' => NULL,
				);
        $this->db->where('promotion_id', $idd);
        $query = $this->db->update('promotion', $data);

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