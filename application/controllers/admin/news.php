<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

     function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['news']!='yes'){
			redirect('admin/dashboard');
			exit;
		}

        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');

		$this->data['meta_title'] = 'News';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';

		$this->load->model("backend/news_model");


    }

// ------------------------ news Mode ------------------------
public function index()
	 {
	 	$sql="select * from news ";
			$res=$this->db->query($sql);
				$data['rs_news'] = $res->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/news/list_more', $data);
    	$this->load->view('admin/components/tail');
    }

public function view_data($group_id)
	 {
	 	$sql2="select * from news where news_group='$group_id' ";
			$rs=$this->db->query($sql2);

			$data['rs_news'] = $rs->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/news/list_more', $data);
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
    	$this->load->view('admin/news/add');
    	$this->load->view('admin/components/tail');

	    $add_head = new news_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/news');
	         }
	} // end function

public function edit($id)
	{
		$sql="select * from news where news_id='$id' ";
			$rs=$this->db->query($sql);

			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/news'</script>";
			}

				$data['rs_news']=$rs->row_array();

		$sql2="select * from news_album where news_id='$id' order by news_album_num asc ";
			$res=$this->db->query($sql2);

				$data['rs_act_img']=$res->result_array();

		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/news/edit', $data);
		$this->load->view('admin/components/tail');

	    $add_head = new news_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/news/edit/$id", $data);
	         }
	}// end function edit

public function upload_pic(){
		$post = new news_model();
        $id = $this->input->post('id_news');
        if ($post->update_pic()) {
            redirect("admin/news/edit/$id");
        }

	} //end function edit pic


public function delete($id)
    {
        $post = new news_model();
        if($post->delete($id)) {
            redirect("admin/news");
        }
    }

public function delete_image($id)
    {
    	$sql2="select * from news_album where news_album_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$news_id = $row['news_id'];
			}
        $post = new news_model();
        if ($post->delete_img($id)) {
            redirect("admin/news/edit/$news_id");
        }
    }


}// end class