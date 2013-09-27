<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        	$this->data['meta_title'] = 'SCG Solution Center | News';
        	$this->load->model('front/product_m');
        	$this->load->model('front/news_m');
        	$this->load->helper('osdate');
        	// menu
			$this->data['cate_list'] = $this->product_m->get_group();
    }

	public function index()
	{
		$data['news_list'] = $this->news_m->get_page();
		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/news-list', $data);
		$this->load->view('front/temp/footer');
	}

    public function pages()
	{
		$data['news_list'] = $this->news_m->get_page();
		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/news-list', $data);
		$this->load->view('front/temp/footer');
	}

	public function detail()
	{
		$news_id = $this->uri->segment(2);

		$data['list_news'] = $this->news_m->get_by($news_id);
		$data['album_news'] = $this->news_m->get_album_by($news_id);
		$data['list_album'] = $this->news_m->get_album($news_id);
		$data['news_more'] = $this->news_m->join_table(3);

		$this->data['meta_title'] = 'SCG Solution Center | '. $data['list_news']['news_title'];

		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/news-detail', $data);
		$this->load->view('front/temp/footer');
	}

}
