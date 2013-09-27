<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller {
	
     function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("property_model");
		$this->load->model('dropdown_model');
		
		if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }
	
	function getsuboptions($option_id){
		$this->dropdown_model->option_id = $option_id;
		$suboptions = $this->dropdown_model->getSubOptions();

		header('Content-Type: application/x-json; charset=utf-8');
      	echo json_encode($suboptions);
	}
	 function index() 
	 {
	 	
    	$sql="select * from property group by property_geo desc ";
			$rs=$this->db->query($sql);
						
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->result_array();
			}   
		
    	$this->load->view('backoffice/property/index', $data);
    }
    
    function province() {
	 	$province_id=$this->uri->segment(4);	 	
		    $sql="select * from property where property_geo='$province_id' group by property_province desc";
			$rs=$this->db->query($sql);
				
			   			
		if($rs->num_rows()==0){
			$data['rs']=array();
		}else{
            $data['rs']=$rs->result_array();
		}   
		
    	$this->load->view('backoffice/property/province', $data);
    }
    
    function district() {
     	$amphur_id=$this->uri->segment(4);	 	
		    $sql="select * from property where property_province='$amphur_id' group by property_amphur desc ";
			$res=$this->db->query($sql);
				
			   			
		if($res->num_rows()==0){
			$data['res']=array();
		}else{
            $data['res']=$res->result_array();
		}   
		
    	$this->load->view('backoffice/property/district', $data);
    }
	
	function list_data() {
     	$list_id =$this->uri->segment(4);	 	
		    $sql="select * from property where property_amphur='$list_id' ";
			$res=$this->db->query($sql);
				
			   			
		if($res->num_rows()==0){
			$data['res']=array();
		}else{
            $data['res']=$res->result_array();
		}   
		
    	$this->load->view('backoffice/property/list-data', $data);
    }

	function search()
	{
		if($this->input->post('submit')!=NULL)
		{
			//$sql="select * from property where property_amphur='$list_id' ";
			//$res=$this->db->query($sql);
			$data_search = ($this->input->post('search'));
			$this->db->like('property_title', $data_search);
			$query_cate = $this->db->or_like('property_detail', $data_search)->get('property');	
			   			
		if($query_cate->num_rows()==0){
			$data['res']=array();
		}else{
            $data['res']=$query_cate->result_array();
		}
			$this->load->view('backoffice/property/search-data', $data);	   	
		}
		
		
    	
	}
	
	function add()
    {
    	$data['options'] = $this->dropdown_model->getOptions();	
	    $this->load->view('backoffice/property/add', $data);
	    
	    $this->property_model->insert();
	} // end function
	
     function edit($id){
		$this->property_model->edit_data();
		
				
		$sql="select * from property where property_id='$id' ";
			$rs=$this->db->query($sql);
			
			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูลสินค้า')</script>";
				echo "<script>window.location.href='". base_url() ."backoffice/property'</script>";
				
			}
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$data['options'] = $this->dropdown_model->getOptions();
				
			$this->load->view('backoffice/property/edit', $data); 
			
			
		
    }// end function edit
    
	public function upload_pic(){
		$post = new property_model();
        $id = $this->input->post('id_property');
        if ($post->update_pic()) {
            redirect("backoffice/property/edit/$id", 'refresh');
        }
		//$this->property_model->update_pic();
	
	} //end function edit pic


    public function delete()
    {
        $post = new property_model();
        $post->id = $this->uri->segment(4);
        if ($post->delete()) {
            redirect('backoffice/property');
        }
    }
    
     public function delete_image()
    {
        $post = new property_model();
        $id = $this->uri->segment(4);
        	$query = $this->db->get_where('property_album', array('property_album_id' => $id));
        		foreach($query->result() as $row){
	        		$id_property= $row->property_id;
        		}
        if ($post->delete_img()) {
            redirect("backoffice/property/edit/$id_property");
        }
    }
     
    
    function upload(){
    	
    	$this->property_model->delete_data();
   } 	
  
}// end class