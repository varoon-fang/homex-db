<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

     function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['product']!='yes'){
			redirect('admin/dashboard');
			exit;
		}

		$this->load->helper(array('form', 'url', 'date'));
        $this->load->library('upload');
        $this->load->library('image_lib');
		$this->data['meta_title'] = 'Product';
	  	$this->data['footer_title'] = '2013 &copy; RGB7 Team.';

		$this->load->model("backend/product_model");
		$this->load->model('backend/drop_list');


    }


// ------------------------ Category Mode ------------------------
function category()
	{

		$sql_cate="select * from product_group ";
			$rs=$this->db->query($sql_cate);

			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->result_array();
			}
		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/product/view_cate', $data);
		$this->load->view('admin/components/tail');
	}

function add_category()
	{
		$this->load->view('admin/components/header', $this->data);
	 	$this->load->view('admin/product/add_cate');
	 	$this->load->view('admin/components/tail');

	    $add_head = new product_model();
	        if($add_head->insert_cate())
	        {
	        	redirect('admin/product/category');
	        }
	}

function edit_category($id)
	{

		$sql_cate="select * from product_group where product_group_id='$id'  ";
			$rs=$this->db->query($sql_cate);
			foreach($rs->result_array() as $row){
				$data['title_name'] = $row['product_group_name'];
			}
		$this->load->view('admin/components/header', $this->data);
	 	$this->load->view('admin/product/edit_cate', $data);
	 	$this->load->view('admin/components/tail');

	    $add_head = new product_model();
	        if($add_head->edit_cate($id))
	        {
	        	redirect('admin/product/category', $data);
	         }
	}

function delete_category($id)
	{
	 	$post = new product_model();
        if ($post->del_cate($id)) {
            redirect('admin/product/category');
        }
    }
// ------------------------ Sub Category Mode ------------------------
function sub_category()
	{
		$sql_cate="select * from product_sub group by product_group desc";
			$rs=$this->db->query($sql_cate);
			$data['rs']=$rs->result_array();

		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/product/view_sub_cate', $data);
		$this->load->view('admin/components/tail');
	}

function list_subcategory($groupID)
	{
		$data['get_group'] = $this->product_model->get_group($groupID);

		$sql_cate="select * from product_sub where product_group='$groupID'";
			$rs=$this->db->query($sql_cate);

			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->result_array();
			}
		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/product/view_sub_list', $data);
		$this->load->view('admin/components/tail');
	}

function add_subcategory()
	{
		$data['list_group'] = $this->product_model->list_group();

		$this->load->view('admin/components/header', $this->data);
	 	$this->load->view('admin/product/add_sub_cate', $data);
	 	$this->load->view('admin/components/tail');

	    $add_head = new product_model();
	        if($add_head->insert_sub())
	        {
	        	redirect('admin/product/sub_category');
	        }
	}

function edit_subcategory($id)
	{
		$data['list_group'] = $this->product_model->list_group();

		$sql_cate="select * from product_sub where product_sub_id='$id'  ";
			$data['sub_cate'] = $rs=$this->db->query($sql_cate)->row_array();

		$this->load->view('admin/components/header', $this->data);
	 	$this->load->view('admin/product/edit_sub', $data);
	 	$this->load->view('admin/components/tail');

	    $add_head = new product_model();
	        if($add_head->edit_sub($id))
	        {
	        	redirect("admin/product/list_subcategory/$rs[product_group]");
	         }
	}

function delete_subcategory($id)
	{
	 	$post = new product_model();
        if ($post->del_sub($id)) {
            redirect('admin/product/sub_category');
        }
    }

// ------------------------ product Mode ------------------------

function getsuboptions($option_id){
		$this->drop_list->option_id = $option_id;
		$suboptions = $this->drop_list->getSubOptions();

		header('Content-Type: application/x-json; charset=utf-8');
      	echo json_encode($suboptions);
	}

function index()
	 {
	 	$sql="select * from product group by product_group asc ";
			$res=$this->db->query($sql);
				$data['rs_product'] = $res->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/product/index', $data);
    	$this->load->view('admin/components/tail');

    }

function view_sub($group_id)
	 {

		$data['get_group'] = $this->product_model->get_group($group_id);

	 	$sql2="select * from product where product_group='$group_id' group by product_sub desc ";
			$rs=$this->db->query($sql2);

			$data['rs_product'] = $rs->result_array();


		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/product/list_sub', $data);
    	$this->load->view('admin/components/tail');
    }
function view_more($sub_id)
	 {
	 	$data['get_sub'] = $this->product_model->get_sub($sub_id);

	 	$sql2="select * from product where product_sub='$sub_id' ";
			$rs=$this->db->query($sql2);

			$data['rs_product'] = $rs->result_array();

		$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/product/list_more', $data);
    	$this->load->view('admin/components/tail');
    }

function add()
    {
    	$data['product_group'] = $this->product_model->list_group();
		$data['options'] = $this->drop_list->getOptions();

    	$this->load->view('admin/components/header', $this->data);
    	$this->load->view('admin/product/add', $data);
		$this->load->view('admin/components/tail');

	    $add_head = new product_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/product');
	         }
	} // end function

function edit($id)
	{
		$data['product_group'] = $this->product_model->list_group();

		$data['rs_product'] = $this->product_model->get_list($id);

		$this->load->view('admin/components/header', $this->data);
		$this->load->view('admin/product/edit', $data);
		$this->load->view('admin/components/tail');

		$add_head = new product_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/product/edit/$id", $data);
	         }

	}// end function edit

	public function upload_pic(){
		$post = new product_model();
        $id = $this->input->post('id_product');
        if ($post->update_pic()) {
            redirect("admin/product/edit/$id");
        }

	} //end function edit pic


    public function delete($id)
    {
    	$sql2="select * from product where product_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$product_group = $row['product_group'];
			}
        $post = new product_model();
        if($post->delete($id)) {
            redirect("admin/product/view/$product_group");
        }
    }

    public function delete_image($id)
    {
    	$sql2="select * from product where product_img='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$product_id = $row['product_id'];
			}
        $post = new product_model();
        if ($post->delete_img($id)) {
            redirect("admin/product/edit/$product_id");
        }
    }


}// end class