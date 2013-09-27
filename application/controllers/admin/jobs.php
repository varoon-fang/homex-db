<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {

     function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['jobs']!='yes' ){
			redirect('admin/dashboard');
			exit;
		}

        $this->load->helper(array('form', 'url', 'date'));

		$this->data['meta_title'] = 'jobs';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';

		$this->load->model("backend/jobs_model");


    }
// ------------------------ jobs Mode ------------------------
public function index()
	 {
	 	$sql="select * from jobs ";
			$res=$this->db->query($sql);
				$data['rs_jobs'] = $res->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/jobs/list_more', $data);
    	$this->load->view('admin/components/tail');
    }

public function view_data($group_id)
	 {
	 	$sql2="select * from jobs where jobs_group='$group_id' ";
			$rs=$this->db->query($sql2);

			$data['rs_jobs'] = $rs->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/jobs/list_more', $data);
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
    	$this->load->view('admin/jobs/add');
    	$this->load->view('admin/components/tail');

	    $add_head = new jobs_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/jobs');
	         }
	} // end function

public function edit($id)
	{
		$sql="select * from jobs where jobs_id='$id' ";
			$rs=$this->db->query($sql);

			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/jobs'</script>";
			}

				$data['rs_jobs']=$rs->row_array();

		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/jobs/edit', $data);
		$this->load->view('admin/components/tail');

	    $add_head = new jobs_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/jobs/edit/$id", $data);
	         }
	}// end function edit

public function upload_pic(){
		$post = new jobs_model();
        $id = $this->input->post('id_jobs');
        if ($post->update_pic()) {
            redirect("admin/jobs/edit/$id");
        }

	} //end function edit pic


public function delete($id)
    {
        $post = new jobs_model();
        if($post->delete($id)) {
            redirect("admin/jobs");
        }
    }

public function delete_image($id)
    {
    	$sql2="select * from jobs_album where jobs_album_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$jobs_id = $row['jobs_id'];
			}
        $post = new jobs_model();
        if ($post->delete_img($id)) {
            redirect("admin/jobs/edit/$jobs_id");
        }
    }


}// end class