<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->library('image_moo');
    }
// ---------------- categories ----------------
public function insert_cate()
{
	// add data
	if($this->input->post('send')!=NULL)
	{
            $data=array(
        	'product_group_name' => $this->input->post('title'),

        );
        $query = $this->db->insert('product_group', $data);


        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>บันทึกข้อมูลสำเร็จ.</strong>
		    </div>');
        	//$data = "Successful";

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ไม่สามารถบันทึกข้อมูลได้!</strong>
		    </div>');

	    }
	     return ($query);
    }

}// end function

public function edit_cate($id)
{
	// add data
	if($this->input->post('send')!=NULL)
	{
		$data = array(
			'product_group_name' => $this->input->post('title'),
		);
			$this->db->where('product_group_id', "$id");
		$sql = $this->db->update('product_group', $data);

		if(!$sql)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
									<button class="close" data-dismiss="alert"></button>
									ไม่สามารถแก้ไขข้อมูลได้ !</div>');

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-success" id="alert-message">
									<button class="close" data-dismiss="alert"></button>
									แก้ไขข้อมูลสำเร็จ.</div>');

	    }

		return ($sql);
	}
}

public function del_cate($id)
{
	$query = $this->db->get_where('product', array('product_group' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->product_img;
				     $del = unlink("images/product/thumbs/$img");
				     $del2 = unlink("images/product/resize/$img");

				}

         $this->db->where('product_group', $id);
        $query = $this->db->delete('product');

	$this->db->where('product_group_id', $id);
	$query = $this->db->delete('product_group');
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

// ---------------- Subcategories ----------------
public function insert_sub()
{
	// add data
	if($this->input->post('send')!=NULL)
	{
            $data=array(
            'product_group' => $_POST['category'],
        	'product_sub_name' => $this->input->post('title'),

        );
        $query = $this->db->insert('product_sub', $data);


        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>บันทึกข้อมูลสำเร็จ.</strong>
		    </div>');

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button class="close" data-dismiss="alert"></button>
			    <strong>ไม่สามารถบันทึกข้อมูลได้!</strong>
		    </div>');

	    }
	     return ($query);
    }

}// end function

public function edit_sub($id)
{
	// add data
	if($this->input->post('send')!=NULL)
	{
		$data = array(
			'product_group' => $_POST['category'],
			'product_sub_name' => $this->input->post('title'),
		);
			$this->db->where('product_sub_id', "$id");
		$sql = $this->db->update('product_sub', $data);

		if(!$sql)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
									<button class="close" data-dismiss="alert"></button>
									ไม่สามารถแก้ไขข้อมูลได้ !</div>');

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-success" id="alert-message">
									<button class="close" data-dismiss="alert"></button>
									แก้ไขข้อมูลสำเร็จ.</div>');

	    }

		return ($sql);
	}
}

public function del_sub($id)
{
	$query = $this->db->get_where('product', array('product_sub' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->product_img;
				     $del = unlink("images/product/thumbs/$img");
				     $del2 = unlink("images/product/resize/$img");

				}

         $this->db->where('product_sub', $id);
        $query = $this->db->delete('product');

	$this->db->where('product_sub_id', $id);
	$query = $this->db->delete('product_sub');
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

// ------------------------ GET Category -------------------------
function get_group($group_id)
	{
		$sql="select * from product_group where product_group_id='$group_id' ";
			$res=$this->db->query($sql)->row_array();

			return ($res);

	}

function get_sub($sub_id)
	{
		$sql="select * from product_sub where product_sub_id='$sub_id' ";
			$res=$this->db->query($sql)->row_array();

			return ($res);

	}

// ---------------- product ----------------
public function list_group()
	{
		$sql= "select * from product_group order by product_group_name asc";
    		$query = $this->db->query($sql);

    		return ($query);
	}

public function get_list($id)
	{
		$sql2="select * from product where product_id='$id' ";
			$rs=$this->db->query($sql2);

			if($rs->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/product'</script>";
			}

				return ($rs->row_array());
	}

public function insert()
	{
		if($this->input->post('send')!=NULL){

		  $this->db->where('product_codename', $this->input->post('codename'));
			  $query = $this->db->get('product');
		    if ( $query->num_rows() > 0 ) {
		       $this->session->set_flashdata('feedback', ' <div class="alert alert-warning" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>รหัสสินค้าซ้ำ.</strong>
				    </div>');
				    redirect('admin/product/add');
					//return ($query);
					exit();
		    } else {


		$path ="images/product/";

        $upload_conf = array(
            'upload_path'   => $path,
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '30000',

            );

        $this->upload->initialize( $upload_conf );

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

        // Unset the useless one ;)
        unset($_FILES['userfile']);

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

		$this->image_moo->load($image_data['full_path'])->resize(500, 500)->save_pa('resize/'.$name);
		$this->image_moo->load($image_data['full_path'])->resize(162, 162)->save_pa('thumbs/'.$name);

		unlink($path.$image_data['file_name']);
    		//add data
	    	$data = array(
	    	   'product_title' 		 => $this->input->post('name'),
			   'product_detail'      => $this->input->post('editor2'),
			   'product_price'       => $this->input->post('price'),
			   'product_codename'    => $this->input->post('codename'),
			   'product_group'       => $this->input->post('category'),
			   'product_sub'	     => $this->input->post('subcategory'),
			   'product_type'        => $this->input->post('type'),
			   'product_img'         => $name.$image_data['file_ext'],
			   'product_date'        => date('Y-m-d H:i:s'),
			);
		$query = $this->db->insert("product", $data);

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
	 }// end check codename
	} // end function

public function edit_data($id)
	{
		//$id =$this->uri->segment(4);

		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):

			    //echo $value;
			    $query = $this->db->get_where('product', array('product_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->product_img;
				     $del = unlink("images/product/thumbs/$img");
				     $del2 = unlink("images/product/resize/$img");

				}
					$data = array(
						'product_img' => "NULL",
					);
			    $this->db->where('product_id', $value);
			    $this->db->update('product', $data);

		    endforeach;
		}

    	if($this->input->post('send')!=NULL){

        //add data
	    	$data = array(
	    	   'product_title' 		 => $this->input->post('name'),
			   'product_detail'      => $this->input->post('editor2'),
			   'product_price'       => $this->input->post('price'),
			   'product_codename'    => $this->input->post('codename'),
			   'product_group'       => $this->input->post('category'),
			   'product_sub'         => $this->input->post('subcategory'),
			   'product_type'        => $this->input->post('type'),
			);
			$this->db->where('product_id', $id);

			$query = $this->db->update("product", $data);

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
		$id=$this->input->post('id_product');

	    if($this->input->post('upload_img')!=NULL){

	    $path = 'images/product/';

        $upload_conf = array(
            'upload_path'   => realpath($path),
            'allowed_types' => 'gif|jpg|png',
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

		$this->image_moo->load($image_data['full_path'])->resize(500, 500)->save_pa('resize/'.$name);
		$this->image_moo->load($image_data['full_path'])->resize(162, 162)->save_pa('thumbs/'.$name);

		unlink($path.$image_data['file_name']);

    		// add images
    			$idd=$this->input->post('id_product');
                    $data_img=array(
                	'product_img' => $name.$image_data['file_ext'],

                );
                $this->db->where('product_id', $id);
                $query = $this->db->update('product', $data_img);



            }
        }
		return ($query);

      }
	}// end function

public function delete($id)
    {
    	$query = $this->db->get_where('product', array('product_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->product_img;
				     $del = unlink("images/product/thumbs/$img");
				     $del2 = unlink("images/product/resize/$img");

				}

         $this->db->where('product_id', $id);
        $query = $this->db->delete('product');
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
    	$query = $this->db->get_where('product', array('product_img' => $id));

				foreach ($query->result() as $row)
				{
					 $idd = $row->product_id;
				     $img = $row->product_img;
				     $del = unlink("images/product/thumbs/$img");
				     $del2 = unlink("images/product/resize/$img");

				}
				$data = array(
					'product_img' => NULL,
				);
        $this->db->where('product_id', $idd);
        $query = $this->db->update('product', $data);

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