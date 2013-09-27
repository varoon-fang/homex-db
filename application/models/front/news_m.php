<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class News_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        	//$this->load->helper('text')
    }

    public function get_all()
	{
		// Get all
	 	$query_1="select * from news order by news_id desc";
  			$rs_1=$this->db->query($query_1)->result_array();

  				return $rs_1;
	}

	public function get($limit)
	{
		// get limit
	 	$query_2="select * from news order by news_id desc limit $limit";
  			$rs_2=$this->db->query($query_2)->result_array();

			return $rs_2;

	}

	public function get_by($id)
	{
		// get id
	 	$query_3="select * from news where news_id = '$id' ";
  			$rs_3=$this->db->query($query_3)->row_array();

  				return $rs_3;

	}

	public function get_album_by($id)
	{
		// get id
	 	$query_3="select * from news_album where news_id = '$id' order by news_album_num asc limit 1 ";
  			$rs_3=$this->db->query($query_3)->row_array();

  				return $rs_3;

	}

	public function get_album($id)
	{
		// get album id
		$query_4 = "select * from news_album where news_id = '$id'";
			$res = $this->db->query($query_4)->result_array();

  				return $res;
	}
	public function join_table($limit)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('news_album', 'news.news_id = news_album.news_id');
		$this->db->order_by('news.news_id', 'desc');
		$this->db->group_by('news_album.news_id', 'desc');
		$this->db->limit($limit);

		$query = $this->db->get()->result_array();

		return $query;
	}

	public function get_page()
	{
		$get_page = $this->uri->segment(3);
		$this->load->library("pagination");

		$query = $this->db->get('news');
		$count = $query->num_rows();

		$config['base_url']=site_url()."news/pages";
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
		$this->db->from('news');
		$this->db->join('news_album', 'news.news_id = news_album.news_id');
		$this->db->order_by('news.news_id', 'desc');
		$this->db->group_by('news_album.news_id', 'desc');
		$this->db->limit($config['per_page'],$get_page);

		$query = $this->db->get()->result_array();

		return $query;


	}

} // end class

?>