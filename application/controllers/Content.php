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
			$query_comment = $this->content_model->find_comment($row->post_id)->result();
			
				foreach($query_comment as $k => $row){
					// $time_array = explode(":",explode(" ", $row->date)[1]);
					// $day_array = explode("-",explode(" ", $row->date)[0]);
					// $time = $time_array[0].":".$time_array[1];
					// $day = $day_array[1]."-".$day_array[2];
					// $day_time = $day." ".$time;
					// $query_comment[$k]->minutes = $day_time;
				
					$query_comment[$k]->minutes = $this->date_style($row->date);
				}

			$query_result[$key]->date = $this->style_date($row->date);
			$query_result[$key]->username = $username;
			$query_result[$key]->comment = $query_comment;

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

	public function post_comment(){
		if(!$this->session->userdata("username")){
			$array = array('error'=>'false');
			echo json_encode($array);
		}
		 else{

			$this->content_model->comment_submit();
			$array = array('username'=>$this->session->userdata("username"));
			echo json_encode($array);
			// echo "true";
		   }



		
	}
		public function get_profile(){
		$this->load->model("content_model");
		$my_post = $this->content_model->find_post($this->session->userdata("username"));
		$my_comment = $this->content_model->find_comment_ByName($this->session->userdata("username"))->result();
		foreach($my_comment as $key=>$row){
			$post = $this->content_model->find_single_post($row->post_id)->title;
			$my_comment[$key]->post = $post;
		}
		$data["user"] = $this->session->userdata("username");
		$data["my_post"] = $my_post;
		$data["my_comment"] = $my_comment;
		$this->load->view('head',$data);
		$this->load->view('profile',$data);

	}

	public function post($id){
		$this->load->model("content_model");
		$data["user"] = $this->session->userdata("username");
		$data["single_post"] = $this->content_model->find_single_post($id);
		$single_comment = $this->content_model->find_comment($id)->result();
		foreach ($single_comment as $key => $row) {
			$single_comment[$key]->minutes = $this->date_style($row->date);
		}
		$data["single_comment"] = $single_comment;
		$this->load->view('head',$data);
		$this->load->view('single_post',$data);
	}


	public function style_date($date){
		$time = explode(".",explode(" ",$date)[1])[0];
		$day = explode(" ",$date)[0];
		$m_d = explode("-",$day)[1]."-".explode("-",$day)[2];
		$h_m = explode(":",$time)[0].":".explode(":",$time)[1];
		return $m_d." ".$h_m;
	}

	 public function date_style($date){
 		$time_array = explode(":",explode(" ", $date)[1]);
		$day_array = explode("-",explode(" ", $date)[0]);
		$time = $time_array[0].":".$time_array[1];
		$day = $day_array[1]."-".$day_array[2];
		$day_time = $day." ".$time;
		return $day_time;


 }
	
}