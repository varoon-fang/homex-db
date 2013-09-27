<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        	$this->data['meta_title'] = 'SCG Solution Center | Contact';
        	$this->load->model('front/product_m');
                	// menu
			$this->data['cate_list'] = $this->product_m->get_group();
    }
	public function index()
	{
		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/contactus');
		$this->load->view('front/temp/footer');
	}
}
