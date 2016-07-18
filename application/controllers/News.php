<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class News extends CI_Controller {

		public function __construct()
		{	
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');

		}

		public function get_zhihu(){
			
			$this->load->library('curl');
			$result = json_decode($this->curl->simple_get('http://news-at.zhihu.com/api/2/news/latest'));
			// foreach($result->stories as $key => $row){
			// 	$full_content = json_decode($this->curl->simple_get('http://news-at.zhihu.com/api/4/news/'.$row->id));
			// 	$result->stories[$key]->full_content = $full_content;
			// }

			$data["user"] = $this->session->userdata("username");
			$data['article'] =  $result;
			// $this->output->cache(300);
			$this->load->view('head',$data);
			$this->load->view("zhihu",$data);


		}

		public function get_zhihu_single($id){
			
			$this->load->library('curl');
			$result = json_decode($this->curl->simple_get('http://news-at.zhihu.com/api/4/news/'.$id));

			$data["user"] = $this->session->userdata("username");
			$data['article'] =  $result;
			// $this->output->cache(300);
			$this->load->view('head',$data);
			$this->load->view("zhihu_single",$data);


		}








	}