<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Product_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_all()
	{
		// Get all
	 	$query_1="select * from product order by product_id desc";
  			$rs_1=$this->db->query($query_1)->result_array();

  				return $rs_1;
	}

	public function get_group()
	{
		// Get all
	 	$query_1="select * from product_group order by product_group_id desc";
  			$rs_1=$this->db->query($query_1)->result_array();

  				return $rs_1;
	}

	public function get($limit)
	{
		// get limit
	 	$query_2="select * from product order by product_id desc limit $limit";
  			$rs_2=$this->db->query($query_2)->result_array();

  				return $rs_2;
	}

	public function get_cate($cate)
	{
		// get limit
		$query_2="select * from product_group where product_group_id='$cate' order by product_group_id desc";
  			$rs_2=$this->db->query($query_2);
  				if($rs_2->num_rows()==0){
	  				show_error("This Not Data <br /><a href=".site_url().">Return HomePage.");
  				}else{
	  				return $rs_2->row_array();
  				}


	}

	public function get_sub($sub)
	{
		// get limit
	 	$query_2 = "select * from product_sub where product_group='$sub' order by product_sub_id desc";
  			$rs_2 = $this->db->query($query_2)->result_array();

  				return $rs_2;
	}

	public function get_sub_detail($sub,$limit)
	{
		// get limit
	 	$query_2 = "select * from product where product_sub='$sub' order by RAND() limit $limit";
  			$rs_2 = $this->db->query($query_2)->result_array();

  				return $rs_2;
	}

	public function get_sub_by($sub)
	{
		// get limit
		$query_2="select * from product_sub where product_sub_id='$sub' order by product_sub_id desc";
  			$rs_2=$this->db->query($query_2);
  				if($rs_2->num_rows()==0){
	  				show_error("This Not Data <br /><a href=".site_url().">Return HomePage.");
  				}else{
	  				return $rs_2->row_array();
  				}
	}


	public function join_table($cate, $limit)
	{
		$this->db->select('*');
		$this->db->from('product');

		$this->db->join('product_group', 'product.product_group = product_group.product_group_id');
		$this->db->join('product_sub', 'product.product_sub = product_sub.product_sub_id');
		$this->db->where('product.product_group', $cate);
		$this->db->order_by('product.product_id', 'desc');
		$this->db->limit($limit);

		$query = $this->db->get()->result_array();

		return $query;
	}

	public function get_type($type, $limit)
	{
		// get limit
	 	$query_2="select * from product where product_type='$type' order by product_id desc limit $limit";
  			$rs_2=$this->db->query($query_2)->result_array();

  				return $rs_2;
	}

	public function get_by($id)
	{
		// get limit
	 	$query_3="select * from product where product_id='$id' ";
  			$rs_3=$this->db->query($query_3)->row_array();

  				return $rs_3;
	}

	public function get_sub_page()
	{
		$id = $this->uri->segment(2);
		$sub = $this->uri->segment(3);
		$get_page = $this->uri->segment(5);

		$this->load->library("pagination");

		$query = $this->db->get_where('product', array('product_sub' => "$id"));
		$count = $query->num_rows();

		$config['base_url']=site_url()."product_list/$id/$sub/pages";
		$config['per_page']=16;
		$config['total_rows']=$count;
		$config['uri_segment'] = 5;

		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '›';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '‹';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';


		$this->pagination->initialize($config);

		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product_sub' , $id);
		$this->db->order_by('product_id', 'desc');


		$this->db->limit($config['per_page'],$get_page);

		$query = $this->db->get()->result_array();

		return $query;

	}

	public function search_by($keyword)
	{

		$per_page= $this->input->get('per_page');

		$this->load->library("pagination");

		$this->db->select('*');
		$this->db->from('product');
		$this->db->like('product_codename' , $keyword);
		$this->db->or_like('product_title' , $keyword);
		$this->db->or_like('product_detail' , $keyword);
		$this->db->or_like('product_type' , $keyword);

		$query = $this->db->get();
		$count = $query->num_rows();

		$config['base_url']=site_url()."product/search?keyword=$keyword";
		$config['per_page']=18;
		$config['total_rows']=$count;
		$config['uri_segment'] = $per_page;
		$config['page_query_string'] = TRUE;

		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '›';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '‹';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';


		$this->pagination->initialize($config);



		$this->db->select('*');
		$this->db->from('product');
		$this->db->like('product_codename' , $keyword);
		$this->db->or_like('product_title' , $keyword);
		$this->db->or_like('product_detail' , $keyword);
		$this->db->or_like('product_type' , $keyword);

		$this->db->limit($config['per_page'],$per_page);

		$query = $this->db->get()->result_array();

		return $query;

	}

} // end class

?>