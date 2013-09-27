<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Knowledge extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        	$this->load->model('front/knowledge_m');
        	$this->load->model('front/product_m');
			$this->load->helper('osdate');

			// menu
			$this->data['cate_list'] = $this->product_m->get_group();
    }

	public function index()
	{
		$this->data['meta_title'] = 'SCG Solution Center | Knowledge';

		$data['knowledge_list'] = $this->knowledge_m->get_page();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/knowledge-list', $data);
		$this->load->view('front/temp/footer');
	}

	public function pages()
	{
		$this->data['meta_title'] = 'SCG Solution Center | Knowledge';

		$data['knowledge_list'] = $this->knowledge_m->get_page();

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/knowledge-list', $data);
		$this->load->view('front/temp/footer');
	}

	public function detail()
	{
		$data['rs_know'] = $this->knowledge_m->get_by($this->uri->segment(3));
		$data['know_list'] = $this->knowledge_m->get(10);

		$this->data['meta_title'] = 'SCG Solution Center | '.$data['rs_know']['knowledge_title'];

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/knowledge-detail', $data);
		$this->load->view('front/temp/footer');
	}

}
