<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Package_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }
    	
	function insert(){
		 if($this->input->post('send')!=NULL){
        		
                 //add data		
			    	$data = array(
			    	   'package_name' => $this->input->post('title_th'),
			    	   'package_price' => $this->input->post('prices'),
			    	   'package_range_job' => $this->input->post('range_job'),
			    	   'package_position' => $this->input->post('amount_job'),
			    	   'package_newsletter' => $this->input->post('news_job'),
			    	   'package_change' => $this->input->post('change_job'),
			    	   'package_map' => $this->input->post('map'),
			    	   'package_logo' => $this->input->post('logo'),
			    	   'package_img' => $this->input->post('img')
					);
				
                if($this->db->insert("package", $data))
			{
			  redirect('backoffice/package/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Insert data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/package/add';</script>";
			}     
                }// eddn check submit
         
	}// end function
	
	function edit_data(){
		$id =$this->uri->segment(4);
		
		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):
		    
			    $query = $this->db->get_where('package', array('package_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->package_img;
				     $del = unlink("images/package/thumbs/$img");
				     $del2 = unlink("images/package/resize/$img");
				     
				} 
					$data = array(
						'package_img' => "NULL",
					);
			    $this->db->where('package_id', $value);
			    $this->db->update('package', $data);
		
		    endforeach;
		       
	   
    	}
    	if($this->input->post('send')!=NULL){
	    	$data = array(
			   'package_name' => $this->input->post('title_th'),
	    	   'package_price' => $this->input->post('prices'),
	    	   'package_range_job' => $this->input->post('range_job'),
	    	   'package_position' => $this->input->post('amount_job'),
	    	   'package_newsletter' => $this->input->post('news_job'),
	    	   'package_change' => $this->input->post('change_job'),
	    	   'package_map' => $this->input->post('map'),
	    	   'package_logo' => $this->input->post('logo'),
	    	   'package_img' => $this->input->post('img')
			);
			
			$this->db->where('package_id', $id);
			
			if($this->db->update("package", $data))
			{
			  redirect("backoffice/package/",'refresh');
			  exit();	
			}else{
				//print_r($data);
				echo "<script>alert('Update data fail.');</script>";
				//echo "<script>window.location.href = '" . base_url() . "backoffice/work/';</script>";
			} 
		
		}
		
	}// end function
	
	function update_pic(){
		$id=$this->input->post('id_package');
    	
	    if($this->input->post('upload_img')!=NULL){	
        $upload_conf = array(
            'upload_path'   => realpath('images/package/'),
            'allowed_types' => 'gif|jpg|png',
            'quality' 		=> '80',
            'max_size'      => '0',
            'encrypt_name'	=> TRUE,
            'encrypt_name'	=>TRUE,
            'width'         => 600,
            'height'        => 400
            );
       
               
       $this->upload->initialize($upload_conf);
       		$this->image_lib->initialize($upload_conf);              
			$this->image_lib->resize(); 
      // $this->image_lib->initialize($upload_conf);	 
      
        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
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
            	
				
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();
                               
                // set the resize config
               $resize = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['file_path'].$upload_data['file_name'], 
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                   // 'create_thumbs' => true,
                    'quality' => '80',
                    'remove_spaces' =>TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
                    'width'         => 300,
                    'height'        => 300
                    );
                
                
                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 150,
					    'height' => 150
					);              
					$this->image_lib->initialize($config);              
					$this->image_lib->resize();

                    // initializing
                $this->image_lib->initialize($resize);
                
                
                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                	// otherwise, put each upload data to an array.
                    $success[] = $upload_data;
                    unlink($upload_data['full_path']);
                 
                 
    		// add images 
    			$idd=$this->input->post('id_package');
                    $data_img=array(
                	
                	'package_img' => $upload_data['file_name'],
                );
                $this->db->where('package_id', $idd);
                $this->db->update('package', $data_img);
                
                    
                }
            }
        }

        // see what we get
        if(count($error > 0))
        {
            $data['error'] = $error;
        }
        else
        {
            $data['success'] = $upload_data;
        }
        
        redirect("backoffice/package/edit/$idd",'refresh');
			exit(); 
      }
	}// end function
	
	function delete()
    {
    	$query = $this->db->get_where('package', array('package_id' => $this->id));

				foreach ($query->result() as $row)
				{
				     $img = $row->package_img;
				     $del = unlink("images/package/thumbs/$img");
				     $del2 = unlink("images/package/resize/$img");
				     
				} 
				
        $this->db->where('package_id', $this->id);
        return $this->db->delete('package');
    }
    
} // end class	
	
?>