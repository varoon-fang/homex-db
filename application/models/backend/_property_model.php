<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Property_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
    }
    
    	
	function insert(){
		if($this->input->post('send')!=NULL){
        $upload_conf = array(
            'upload_path'   => ('./images/property/'),
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '30000',
            'quality' 		=> '80',
            'encrypt_name'	=> TRUE,
            'width'			=> 800,
            'hieght'		=> 800
            );
            
        $this->upload->initialize( $upload_conf );
        
        $query = $this->db->get_where('province', array('province_id' => $this->input->post('options')));
        	foreach($query->result() as $row)
        	{
	        	$geo_id=$row->geo_id;
        	}
        //add data		
	    	$data = array(
	    	   'property_title' 	=> serialize($this->input->post('title_th')),
			   'property_detail' 	=> serialize($this->input->post('detail_th')),
			   'property_geo' 		=> $geo_id,
			   'property_province'	=> $this->input->post('options'),
			   'property_amphur'	=> $this->input->post('suboptions'),
			   'property_type'		=> $this->input->post('type'),
			   'property_cate'		=> $this->input->post('category'),
			   'property_room'		=> $this->input->post('room'),
			   'property_car'		=> $this->input->post('car'),
			   'property_toilet'	=> $this->input->post('toilet'),
			   'property_latitude'	=> $this->input->post('lat_value'),
			   'property_longitude'	=> $this->input->post('lon_value'),
			   'property_zoom'		=> $this->input->post('zoom_value'),
			   'property_price'		=> $this->input->post('prices'),
			   'property_date' 		=> date('Y-m-d H:i:s'),
			);
		$this->db->insert("property", $data);
				
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
                    'remove_spaces' => TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
                    'width'         => 700,
                    'height'        => 360
                    );
                
										
                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 220,
					    'height' => 138
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
                  // select property
                  $sql="select * from property order by property_id desc limit 1";
		    		$rs=$this->db->query($sql)->result();
		    		
		    		foreach($rs as $row){  
		    			$idd=$row->property_id;
		    			
		    		} 
    		// add images 
                    $data_img=array(
                	'property_id' => "$idd",
                	'property_album_name' => $upload_data['file_name'],
                	'property_album_num' => $j++,
                );
                $this->db->insert('property_album', $data_img);
                
                    
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
        
       redirect('backoffice/property/', 'refresh');
		exit(); 
    }
	} // end function
	
	function edit_data(){
		$id =$this->uri->segment(4);
		
		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):
		    
			    //echo $value;
			    $query = $this->db->get_where('property', array('property_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->property_img;
				     $del = unlink("images/property/thumbs/$img");
				     $del2 = unlink("images/property/resize/$img");
				     
				} 
					$data = array(
						'property_img' => "NULL",
					);
			    $this->db->where('property_id', $value);
			    $this->db->update('property', $data);
		
		    endforeach;
		       
	   
    	}
    	if($this->input->post('send')!=NULL){
	    	 $query = $this->db->get_where('province', array('province_id' => $this->input->post('group_car')));
        	foreach($query->result() as $row)
        	{
	        	$geo_id=$row->geo_id;
        	}
        //add data		
	    	$data = array(
	    	   'property_title' 	=> serialize($this->input->post('title_th')),
			   'property_detail' 	=> serialize($this->input->post('detail_th')),
			   'property_geo' 		=> $geo_id,
			   'property_province'	=> $this->input->post('group_car'),
			   'property_amphur'	=> $this->input->post('sub_car'),
			   'property_type'		=> $this->input->post('type'),
			   'property_cate'		=> $this->input->post('category'),
			   'property_room'		=> $this->input->post('room'),
			   'property_car'		=> $this->input->post('car'),
			   'property_toilet'	=> $this->input->post('toilet'),
			   'property_latitude'	=> $this->input->post('lat_value'),
			   'property_longitude'	=> $this->input->post('lon_value'),
			   'property_zoom'		=> $this->input->post('zoom_value'),
			   'property_price'		=> $this->input->post('prices'),
			   'property_date' 		=> date('Y-m-d H:i:s'),
			);
			$this->db->where('property_id', $id);
			
			if($this->db->update("property", $data))
			{
			  redirect("backoffice/property/edit/$id",'refresh');
			  exit();	
			}else{
				//print_r($data);
				echo "<script>alert('Update data fail.');</script>";
				//echo "<script>window.location.href = '" . base_url() . "backoffice/property/';</script>";
			} 
		
		}
		
	}// end function
	
	function update_pic(){
		$id=$this->input->post('id_property');
    	
	    if($this->input->post('upload_img')!=NULL){	
        $upload_conf = array(
            'upload_path'   => realpath('images/property/'),
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
                    'width'         => 700,
                    'height'        => 360
                    );
                
                
                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 220,
					    'height' => 138
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
             //count img
             	$sql = $this->db->get_where('property_album', array('property_id' => $id));
             		$count= $sql->num_rows();    
			 		$j=$count+1;
    		// add images 
    			$idd=$this->input->post('id_property');
                    $data_img=array(
                	'property_album_num' => $j++,
                	'property_album_name' => $upload_data['file_name'],
                	'property_id' =>$id
                );
               // $this->db->where('property_id', $id);
                $query = $this->db->insert('property_album', $data_img);
                
                    
                }
            }
        }
		return ($query);
        
      }
	}// end function
	
	function delete()
    {
    	$id = $this->uri->segment(4);
    	$query = $this->db->get_where('property_album', array('property_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->property_album_name;
				     $del = unlink("images/property/thumbs/$img");
				     $del2 = unlink("images/property/resize/$img");
				     
				} 
				
        $this->db->where('property_album_id', $id);
        $this->db->delete('property_album');
         
         $this->db->where('property_id', $id);
        return ($this->db->delete('property'));
    }
    
	function delete_img()
    {
    	$id = $this->uri->segment(4);
    	$query = $this->db->get_where('property_album', array('property_album_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->property_album_name;
				     $del = unlink("images/property/thumbs/$img");
				     $del2 = unlink("images/property/resize/$img");
				     
				} 
				
        $this->db->where('property_album_id', $id);
        return ($this->db->delete('property_album'));
    }
    
	
	

} // end class	
	
?>