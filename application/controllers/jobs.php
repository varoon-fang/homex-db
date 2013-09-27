<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        	$this->load->helper('osdate');

        	$this->data['meta_title'] = 'SCG Solution Center | Jobs';
        	$this->load->model('front/product_m');
        	$this->load->model('front/jobs_m');
        	// menu
			$this->data['cate_list'] = $this->product_m->get_group();
    }
	public function index()
	{
		$data['list_jobs'] = $this->jobs_m->get_page();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/jobs-list', $data);
		$this->load->view('front/temp/footer');
	}

	public function detail()
	{
		$data['list_jobs'] = $this->jobs_m->get_by($this->uri->segment(2));
		$this->data['meta_title'] = 'SCG Solution Center | '. $data['list_jobs']['jobs_name'];

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/jobs-detail', $data);
		$this->load->view('front/temp/footer');
	}
}
