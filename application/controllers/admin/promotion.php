<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Promotion extends CI_Controller {

     function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['promotion']!='yes'){
			redirect('admin/dashboard');
			exit;
		}

		$this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');
		$this->data['meta_title'] = 'Promotion';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';

		$this->load->model("backend/promotion_model");


    }
// ------------------------ promotion Mode ------------------------

public function index()
	 {
	 	$sql="select * from promotion ";
			$res=$this->db->query($sql);
				$data['rs_promotion'] = $res->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/promotion/index', $data);
    	$this->load->view('admin/components/tail');

    }

public function view($group_id)
	 {
	 	$sql="select * from promotion_group where promotion_group_id='$group_id' ";
			$res=$this->db->query($sql);
				foreach($res->result_array() as $fett){
					$data['group_name'] = $fett['promotion_group_name'];
				}
	 	$sql2="select * from promotion where promotion_group='$group_id' ";
			$rs=$this->db->query($sql2);

			$data['rs_promotion'] = $rs->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/promotion/list_more', $data);
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
    	$this->load->view('admin/promotion/add');
		$this->load->view('admin/components/tail');

	    $add_head = new promotion_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/promotion');
	         }
	} // end function

public function edit($id)
	{
		$data['rs_promotion'] = $this->promotion_model->get_list($id);

		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/promotion/edit', $data);
		$this->load->view('admin/components/tail');

		$add_head = new promotion_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/promotion/edit/$id", $data);
	         }

	}// end function edit

public function upload_pic()
	{
		$id = $this->input->post('id_promotion');

		$post = new promotion_model();
        if ($post->update_pic()) {
            redirect("admin/promotion/edit/$id");
        }

	} //end function edit pic

public function upload_pdf()
	{
		$id = $this->input->post('id_promotion');

		$post = new promotion_model();
        if ($post->update_pdf()) {
            redirect("admin/promotion/edit/$id");
        }

	} //end function edit pic

public function delete($id)
    {
        $post = new promotion_model();
        if($post->delete($id)) {
            redirect("admin/promotion");
        }
    }

public function delete_image($id)
    {
    	$sql2="select * from promotion where promotion_img='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$promotion_id = $row['promotion_id'];
			}
        $post = new promotion_model();
        if ($post->delete_img($id)) {
            redirect("admin/promotion/edit/$promotion_id");
        }
    }

public function delete_pdf($id)
    {
    	$sql2="select * from promotion where promotion_pdf='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$promotion_id = $row['promotion_id'];
			}
        $post = new promotion_model();
        if ($post->delete_pdf($id)) {
            redirect("admin/promotion/edit/$promotion_id");
        }
    }


}// end class