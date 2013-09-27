<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('image_moo');
    }

public function insert()
	{
		$path = 'images/banner/';
        $upload_conf = array(
            'upload_path'   => $path,
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
            );

        $this->upload->initialize( $upload_conf );

        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
			$img = 1;
            foreach($val as $v)
            {
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }

        }
        // Unset the useless one ;)
        unset($_FILES['userfile']);

        // Put each errors and upload data to an array
        $error = array();
        $success = array();

        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error
                $error['upload'][] = $this->upload->display_errors();
            }
            else
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

				$name = $img++.time();

				$this->image_moo->load($image_data['full_path'])->resize(760, 335)->save_pa('resize/'.$name);
				$this->image_moo->load($image_data['full_path'])->resize(350,180)->save_pa('thumbs/'.$name);

				unlink($path.$image_data['file_name']);

					//count img
					$sql = $this->db->get_where('banner');
             		$count= $sql->num_rows();
			 		$j=$count+1;

		    		// add images
                    $data_img=array(
                	'banner_name' => $name.$image_data['file_ext'],
                	'banner_num' => $j++,

                );
                $query = $this->db->insert('banner', $data_img);

            }
        }
        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>อัพโหลดรูปภาพสำเร็จ.</strong>
		    </div>');

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ไม่สามารถอัพโหลดรูปภาพได้!</strong>
		    </div>');
	    }
	   return ($query);


	}// end function

public function delete($id)
	{

		$query = $this->db->get_where('banner', array('banner_id' => $id));

			foreach ($query->result() as $row)
			{
			     $img = $row->banner_name;
			     $del = unlink("images/banner/thumbs/$img");
			     $del2 = unlink("images/banner/resize/$img");

			}

		$this->db->where('banner_id', $id);
		$del_query = ($this->db->delete('banner'));

		if($del_query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ลบรูปภาพสำเร็จ.</strong>
		    </div>');

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ไม่สามารถลบรูปภาพได้!</strong>
		    </div>');

	    }

		return ($del_query);
	} //end function


} // end class

?>