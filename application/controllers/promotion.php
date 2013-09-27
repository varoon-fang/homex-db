<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotion extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        	$this->data['meta_title'] = 'SCG Solution Center | Promotion';
        	$this->load->model('front/product_m');
        	$this->load->model('front/promotion_m');
        	// menu
			$this->data['cate_list'] = $this->product_m->get_group();
    }
	public function index()
	{
		$data['list_promotion'] = $this->promotion_m->get_all();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/promotion', $data);
		$this->load->view('front/temp/footer');
	}
}
