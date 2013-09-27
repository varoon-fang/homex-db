<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Knowledge_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_all()
	{
		// Get all
	 	$query_1="select * from knowledge order by knowledge_id desc";
  			$rs_1=$this->db->query($query_1)->result_array();

  				return $rs_1;
	}

	public function get($limit)
	{
		// get limit
	 	$query_2="select * from knowledge order by knowledge_id desc limit $limit";
  			$rs_2=$this->db->query($query_2)->result_array();

  				return $rs_2;
	}

	public function get_by($id)
	{
		// get limit
	 	$query_3="select * from knowledge where knowledge_id='$id'";
  			$rs_3=$this->db->query($query_3)->row_array();

  				return $rs_3;
	}

	public function get_page()
	{
		$get_page = $this->uri->segment(3);
		$this->load->library("pagination");

		$query = $this->db->get('knowledge');
		$count = $query->num_rows();

		$config['base_url']=site_url()."knowledge/pages/";
		$config['per_page']=1;
		$config['total_rows']=$count;
		$config['uri_segment'] = 3;

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

		$rs_knowledge = $res_book = $this->db->select('*')->from('knowledge')->order_by('knowledge_id', 'desc')->limit($config['per_page'],$get_page)->get()->result_array();

		return $rs_knowledge;
	}

} // end class

?>