<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_all()
	{
		// Get all
	 	$query_1="select * from jobs order by jobs_id desc";
  			$rs_1=$this->db->query($query_1)->result_array();

  				return $rs_1;
	}

	public function get($limit)
	{
		// get limit
	 	$query_2="select * from jobs order by jobs_id desc limit $limit";
  			$rs_2=$this->db->query($query_2)->result_array();

  				return $rs_2;
	}

	public function get_by($id)
	{
		// get limit
	 	$query_3="select * from jobs where jobs_id='$id' ";
  			$rs_3=$this->db->query($query_3)->row_array();

  				return $rs_3;
	}

	public function get_page()
	{
		$get_page = $this->uri->segment(3);
		$this->load->library("pagination");

		$query = $this->db->get('jobs');
		$count = $query->num_rows();

		$config['base_url']=site_url()."jobs/pages";
		$config['per_page']=4;
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

		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->order_by('jobs_id', 'desc');
		$this->db->limit($config['per_page'],$get_page);

		$query = $this->db->get()->result_array();

		return $query;


	}

} // end class

?>