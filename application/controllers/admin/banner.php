<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {

     function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['banner']!='yes'){
			redirect('admin/dashboard');
			exit;
		}

        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');

		$this->data['meta_title'] = 'banner';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';

		$this->load->model("backend/banner_model");


    }

// ------------------------ banner Mode ------------------------
public function index()
	 {
	 	$sql="select * from banner ";
			$res=$this->db->query($sql);
				$data['rs_banner'] = $res->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/banner/index', $data);
    	$this->load->view('admin/components/tail');
    }

public function view_data($group_id)
	 {
	 	$sql2="select * from banner where banner_group='$group_id' ";
			$rs=$this->db->query($sql2);

			$data['rs_banner'] = $rs->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/banner/list_more', $data);
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
    	$this->load->view('admin/banner/add');
    	$this->load->view('admin/components/tail');

	    $add_head = new banner_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/banner');
	         }
	} // end function

public function edit($id)
	{
		$sql="select * from banner where banner_id='$id' ";
			$rs=$this->db->query($sql);

			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/banner'</script>";
			}

				$data['rs_banner']=$rs->row_array();

		$sql2="select * from banner_album where banner_id='$id' order by banner_album_num asc ";
			$res=$this->db->query($sql2);

				$data['rs_act_img']=$res->result_array();

		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/banner/edit', $data);
		$this->load->view('admin/components/tail');

	    $add_head = new banner_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/banner/edit/$id", $data);
	         }
	}// end function edit

public function upload_pic(){
		$post = new banner_model();
		 if($post->insert()) {
            redirect("admin/banner");
        }

	} //end function edit pic


public function delete($id)
    {
        $post = new banner_model();
        if($post->delete($id)) {
            redirect("admin/banner");
        }
    }




}// end class