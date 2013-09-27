<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->library('image_moo');

    }
// ------------------------ news Mode ------------------------
	function insert(){
		if($this->input->post('send')!=NULL){
		$path = 'images/news/';

        $upload_conf = array(
            'upload_path'   => $path,
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
            );

        $this->upload->initialize( $upload_conf );

        //add data
	    	$data = array(
	    	   'news_title' 	=> ($this->input->post('name')),
			   'news_detail' 	=> ($this->input->post('editor2')),
			   'news_date' 		=> date('Y-m-d H:i:s'),
			);
		$query = $this->db->insert("news", $data);

        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
            $j = 1;
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

		$name = $j++.time();

		$this->image_moo->load($image_data['full_path'])->resize(740, 442)->save_pa('resize/'.$name);
		$this->image_moo->load($image_data['full_path'])->resize(360, 270)->save_pa('thumbs/'.$name);

		unlink($path.$image_data['file_name']);
                  // select news
                  $sql="select * from news order by news_id desc limit 1";
		    		$rs=$this->db->query($sql)->result();

		    		foreach($rs as $row){
		    			$idd=$row->news_id;

		    		}
    		// add images
                    $data_img=array(
                	'news_id' => "$idd",
                	'news_album_name' => $name.$image_data['file_ext'],
                	'news_album_num' => $j++,
                );
                $query1 = $this->db->insert('news_album', $data_img);

            }
        } // end loop upload images

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
			    $query = $this->db->get_where('news', array('news_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->news_img;
				     $del = unlink("images/news/thumbs/$img");
				     $del2 = unlink("images/news/resize/$img");

				}
					$data = array(
						'news_img' => "NULL",
					);
			    $this->db->where('news_id', $value);
			    $this->db->update('news', $data);

		    endforeach;


    	}
    	if($this->input->post('send')!=NULL){

        //add data
	    	$data = array(
	    	   'news_title' 	=> ($this->input->post('name')),
			   'news_detail' 	=> ($this->input->post('editor2')),
			);
			$this->db->where('news_id', $id);

			$query = ($this->db->update("news", $data));

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

	function update_pic(){
		$id=$this->input->post('id_news');

	    if($this->input->post('upload_img')!=NULL){

	    $path = 'images/news/';
        $upload_conf = array(
            'upload_path'   => realpath($path),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=>TRUE,
            );


       $this->upload->initialize($upload_conf);
       		$this->image_lib->initialize($upload_conf);
			$this->image_lib->resize();
      // $this->image_lib->initialize($upload_conf);

        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
            $img=0;
           // $j = 1;
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

			$this->image_moo->load($image_data['full_path'])->resize(740, 442)->save_pa('resize/'.$name);
			$this->image_moo->load($image_data['full_path'])->resize(360, 270)->save_pa('thumbs/'.$name);

			unlink($path.$image_data['file_name']);

             //count img
             	$sql = $this->db->get_where('news_album', array('news_id' => $id));
             		$count= $sql->num_rows();
			 		$j=$count+1;
    		// add images
    			$idd=$this->input->post('id_news');
                    $data_img=array(
                	'news_album_num' => $j++,
                	'news_album_name' => $name.$image_data['file_ext'],
                	'news_id' =>$id
                );
               // $this->db->where('news_id', $id);
                $query = $this->db->insert('news_album', $data_img);

            }
        }
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
	}// end function

function delete_img($id)
    {
    	$id = $this->uri->segment(4);
    	$query = $this->db->get_where('news_album', array('news_album_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->news_album_name;
				     $del = unlink("images/news/thumbs/$img");
				     $del2 = unlink("images/news/resize/$img");

				}

        $this->db->where('news_album_id', $id);
        $query = $this->db->delete('news_album');

        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ลบรูปภาพสำเร็จ.</strong>
		    </div>');


	    }else{
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ไม่สามารถลบรูปภาพได้!</strong>
		    </div>');
	    }

        return ($query);

    }

function delete($id)
    {

    	$query = $this->db->get_where('news_album', array('news_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->news_album_name;
				     $del = unlink("images/news/thumbs/$img");
				     $del2 = unlink("images/news/resize/$img");

				}

        $this->db->where('news_album_id', $id);
        $this->db->delete('news_album');

         $this->db->where('news_id', $id);
        $query = $this->db->delete('news');
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