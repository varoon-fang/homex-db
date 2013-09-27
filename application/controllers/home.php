<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        	$this->data['meta_title'] = 'SCG Solution Center | Landing page';
        	$this->load->model('front/banner');
        	$this->load->model('front/knowledge_m');
        	$this->load->model('front/promotion_m');
        	$this->load->model('front/news_m');
        	$this->load->model('front/product_m');
        	$this->load->model('front/jobs_m');

        	// menu
			$this->data['cate_list'] = $this->product_m->get_group();
    }
	public function index()
	{
		$data['banner_list'] = $this->banner->get_all();
		$data['knowledge_list'] = $this->knowledge_m->get(2);
		$data['news_list'] = $this->news_m->join_table(1);
		$data['product_new'] = $this->product_m->get_type("สินค้าใหม่",8);
		$data['product_best'] = $this->product_m->get_type("สินค้าขายดี",8);
		$data['jobs_list'] = $this->jobs_m->get(1);
		$data['promotion_list'] = $this->promotion_m->get(1);

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/landingpage', $data);
		$this->load->view('front/temp/footer');
	}
}
