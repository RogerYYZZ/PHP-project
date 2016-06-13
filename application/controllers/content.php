<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{	parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("content_model");
	}

	public function show(){
		
		$query_result = $this->content_model->get_content()->result();
		foreach ($query_result as $key => $row) {
			$username = $this->content_model->find_user($row->user_id);
		//	$row[] = array("username"=>$username);
			$query_result[$key]->username = $username;
		}
	//	$data['content'] = $this->content_model->get_content();
		$data['content'] = $query_result;
		$data["user"] = $this->session->userdata("username");
		$this->load->view("head", $data);
		$this->load->view("content_view",$data);
	}

	public function submit(){
		$this->content_model->post_submit();
		$data["user"] = $this->session->userdata("username");
		redirect("/user/content");
	}
	
}