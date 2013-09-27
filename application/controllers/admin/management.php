<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class management extends CI_Controller {

     function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['type']!='admin' ){
			redirect('admin/dashboard');
			exit;
		}

        $this->load->helper(array('form', 'url', 'date'));

		$this->data['meta_title'] = 'management';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';

		$this->load->model("backend/management_model");


    }
// ------------------------ management Mode ------------------------
public function index()
	 {
	 	$sql="select * from admin where admin_type='user'";
			$res=$this->db->query($sql);
				$data['rs_management'] = $res->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/management/list_more', $data);
    	$this->load->view('admin/components/tail');
    }

public function view_data($group_id)
	 {
	 	$sql2="select * from admin where management_group='$group_id' ";
			$rs=$this->db->query($sql2);

			$data['rs_management'] = $rs->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/management/list_more', $data);
    	$this->load->view('admin/components/tail');
    }


public function search()
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
			$this->load->view('admin/components/header', $this->data);
			$this->load->view('admin/property/search-data', $data);
			$this->load->view('admin/components/tail');
		}
	}

public function add()
    {
    	$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/management/add');
    	$this->load->view('admin/components/tail');

	    $add_head = new management_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/management');
	         }
	} // end function

public function edit($id)
	{
		$sql="select * from admin where admin_id='$id' ";
			$rs=$this->db->query($sql);

			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/management'</script>";
			}

				$data['rs_management']=$rs->row_array();

		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/management/edit', $data);
		$this->load->view('admin/components/tail');

	    $add_head = new management_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/management/edit/$id", $data);
	         }
	}// end function edit

public function upload_pic(){
		$post = new management_model();
        $id = $this->input->post('id_management');
        if ($post->update_pic()) {
            redirect("admin/management/edit/$id");
        }

	} //end function edit pic


public function delete($id)
    {
        $post = new management_model();
        if($post->delete($id)) {
            redirect("admin/management");
        }
    }

public function delete_image($id)
    {
    	$sql2="select * from management_album where management_album_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$management_id = $row['management_id'];
			}
        $post = new management_model();
        if ($post->delete_img($id)) {
            redirect("admin/management/edit/$management_id");
        }
    }


}// end class