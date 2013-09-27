<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Knowledge extends CI_Controller {

     function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['knowledge']!='yes'){
			redirect('admin/dashboard');
			exit;
		}

		$this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');
		$this->data['meta_title'] = 'knowledge';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';

		$this->load->model("backend/knowledge_model");


    }


// ------------------------ knowledge Mode ------------------------

function index()
	 {
	 	$sql="select * from knowledge ";
			$res=$this->db->query($sql);
				$data['rs_knowledge'] = $res->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/knowledge/index', $data);
    	$this->load->view('admin/components/tail');

    }

function view($group_id)
	 {
	 	$sql="select * from knowledge_group where knowledge_group_id='$group_id' ";
			$res=$this->db->query($sql);
				foreach($res->result_array() as $fett){
					$data['group_name'] = $fett['knowledge_group_name'];
				}
	 	$sql2="select * from knowledge where knowledge_group='$group_id' ";
			$rs=$this->db->query($sql2);

			$data['rs_knowledge'] = $rs->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/knowledge/list_more', $data);
    	$this->load->view('admin/components/tail');
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
			$this->load->view('admin/components/header', $this->data);
			$this->load->view('admin/property/search-data', $data);
			$this->load->view('admin/components/tail');
		}
	}

function add()
    {

    	$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/knowledge/add');
		$this->load->view('admin/components/tail');

	    $add_head = new knowledge_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/knowledge');
	         }
	} // end function

function edit($id)
	{

		$data['rs_knowledge'] = $this->knowledge_model->get_list($id);

		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/knowledge/edit', $data);
		$this->load->view('admin/components/tail');

		$add_head = new knowledge_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/knowledge/edit/$id", $data);
	         }

	}// end function edit

	public function upload_pic(){
		$post = new knowledge_model();
        $id = $this->input->post('id_knowledge');
        if ($post->update_pic()) {
            redirect("admin/knowledge/edit/$id");
        }

	} //end function edit pic


    public function delete($id)
    {

        $post = new knowledge_model();
        if($post->delete($id)) {
            redirect("admin/knowledge");
        }
    }

    public function delete_image($id)
    {
    	$sql2="select * from knowledge where knowledge_img='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$knowledge_id = $row['knowledge_id'];
			}
        $post = new knowledge_model();
        if ($post->delete_img($id)) {
            redirect("admin/knowledge/edit/$knowledge_id");
        }
    }


}// end class