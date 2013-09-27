<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_all()
	{
		// banner top
	 	$query_banner1="select * from banner order by RAND() limit 5";
  			$rs_banner1=$this->db->query($query_banner1)->result_array();

  				return $rs_banner1;
	}


} // end class

?>