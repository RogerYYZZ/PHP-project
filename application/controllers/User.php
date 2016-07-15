<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	}

	public function register()
	{	$this->load->view('head');
		$this->load->view('new_user');
	}

	public function index()
	{	
		if(!$this->session->userdata("username"))
		{
		$this->load->view('head');
		$this->load->view('login');
		}
		else{
			redirect("/user/content");
		}
	//$this->load->view('welcome_message');
	}

	public function login(){
		$this->load->model("User_model");
		
	//	$this->load->view('new_user');
		$right = $this->User_model->login();
		$data = array();
		$data["alert"] = $right;
		$data["user"] = $this->session->userdata("username");
		if(!$right){
			$this->load->view('head',$data);
			$this->load->view('login', $data);
		}

		else{
			redirect("user/content");
		}
		
	}

	public function logout(){
		$this->session->unset_userdata('username');
		redirect('/');
	}

	public function post(){
		if(!$this->session->userdata("username")){
			redirect("/");
		}
		else{
			$data["user"] = $this->session->userdata("username");
			$this->load->view('head',$data);
			$this->load->view('post');
		}
		
	}

	public function new_user(){
		$this->load->model("User_model");
		$result = $this->User_model->create_new();
		$data["user"] = $this->session->userdata("username");
		$data["isNew"] = $result;
		$this->load->view('head',$data);
		$this->load->view('new_user',$data);

	}

	public function get_resume(){
		$data["user"] = $this->session->userdata("username");
		$this->load->view('head',$data);
		$this->load->view('resume');

	}


	
}
