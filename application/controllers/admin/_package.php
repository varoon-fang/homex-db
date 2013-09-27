<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Package extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("Package_model");
        
        if($this->session->userdata['logged_in']['package']=="no"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }

	public function index() {
    	
    	$this->load->view('backoffice/package/index');
    }
    
	public function add()
    {
	    $this->load->view('backoffice/package/add');
	    
		
		$this->Package_model->insert();
	} // end function
	
    public function edit($id){
		$this->Package_model->edit_data();
			
		$sql="select * from package where package_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/package/edit', $data); 
			
			
		
    }// end function edit
    
	public function edit_pic($id){
	
		$this->Package_model->update_pic();
	
	} //end function edit pic

	public function delete()
    {
        $post = new Package_model();
        $post->id = $this->uri->segment(4);
        if ($post->delete()) {
            redirect('backoffice/package/');
        }
    }   
    
   public function upload(){
    	
    	$this->Package_model->delete_data();
   } 	
  
}// end class