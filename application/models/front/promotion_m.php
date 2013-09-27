<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Promotion_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_all()
	{
		// Get all
	 	$query_1="select * from promotion order by promotion_id desc";
  			$rs_1=$this->db->query($query_1)->result_array();

  				return $rs_1;
	}

	public function get($limit)
	{
		if($limit==1){
			// get limit
	 	$query_2="select * from promotion order by promotion_id desc limit $limit";
  			$rs_2=$this->db->query($query_2)->row_array();
		}else{
			// get limit
	 	$query_2="select * from promotion order by promotion_id desc limit $limit";
  			$rs_2=$this->db->query($query_2)->result_array();
		}


  				return $rs_2;
	}

	public function get_by($id)
	{
		// get limit
	 	$query_3="select * from promotion where promotion_id = '$id' ";
  			$rs_3=$this->db->query($query_3)->result_array();

  				return $rs_3;
	}


} // end class

?>