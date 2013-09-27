<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        	$this->data['meta_title'] = 'SCG Solution Center | Services';
        	$this->load->model('front/product_m');
                	// menu
			$this->data['cate_list'] = $this->product_m->get_group();
    }
	public function index()
	{
		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/service');
		$this->load->view('front/temp/footer');
	}
}
