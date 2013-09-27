<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        	$this->load->model('front/product_m');
			$this->load->helper('osdate');

			// menu
			$this->data['cate_list'] = $this->product_m->get_group();
    }
	public function group()
	{

		$data['group_list'] = $this->product_m->get_cate($this->uri->segment(2));
		$data['sub_list'] = $this->product_m->get_sub($this->uri->segment(2));

		$this->data['meta_title'] = 'SCG Solution Center | '. $data['group_list']['product_group_name'];
		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/product-group', $data);
		$this->load->view('front/temp/footer');
	}

	public function pages()
	{

		$data['sub_list'] = $this->product_m->get_sub_page($this->uri->segment(2));

		$data['list_sub'] = $this->product_m->get_sub_by($this->uri->segment(2));
		$group = $data['list_sub']['product_group'];
		$data['group_list'] = $this->product_m->get_cate($group);

		$data['sub_more'] = $this->product_m->get_sub($group);

		$this->data['meta_title'] = 'SCG Solution Center | product';

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/product-list', $data);
		$this->load->view('front/temp/footer');
	}

	public function search()
	{
		$keyword = $this->input->get('keyword');

		$this->db->select('*');
		$this->db->from('product_group');
		$this->db->like('product_group_name' , $keyword);
		$query_group = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('product_sub');
		$this->db->like('product_sub_name' , $keyword);
		$query_sub = $this->db->get()->row_array();

		$data['search_list'] = $this->product_m->search_by($keyword);

		$this->data['meta_title'] = 'SCG Solution Center | Search';

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/product-search', $data);
		$this->load->view('front/temp/footer');
	}

	public function detail()
	{
		$data['list_product'] = $this->product_m->get_by($this->uri->segment(2));
		$sub_id = $data['list_product']['product_sub'];
		$group = $data['list_product']['product_group'];

		$data['group_list'] = $this->product_m->get_cate($group);
		$data['sub_list'] = $this->product_m->get_sub_by($sub_id);

		$data['res_product'] = $this->product_m->get_sub_detail($sub_id,18);

		$this->data['meta_title'] = 'SCG Solution Center | '.$data['list_product']['product_title'];
		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/product-detail', $data);
		$this->load->view('front/temp/footer');
	}

}
