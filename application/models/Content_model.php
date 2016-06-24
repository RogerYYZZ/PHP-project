<?php

class content_model extends CI_Model{
	
	//private $username;
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
		
		$this->load->library('session');
	}


	public function post_submit(){
		$username = $this->session->userdata("username");
		$title = $_POST['title'];
		//$content = mysql_real_escape_string($_POST['content']);
		$content = pg_escape_string($_POST['content']);
		$query = $this->db->query("SELECT user_id FROM users WHERE username = '".$username."'");
		$result = $query->row_array();
		$user_id = $result['user_id'];

		$this->db->query("INSERT INTO post (user_id,title,content) VALUES('$user_id', '$title', '$content')");
	}

	public function get_content(){
		$result = $this->db->query("SELECT * FROM post ORDER BY date DESC");
		return $result;
		
	}

	public function find_user($id){
		$query = $this->db->query("SELECT username FROM users WHERE user_id = '".$id."'");
		$result = $query->row_array();
		$username = $result['username'];
		return $username;
	}

	public function find_comment($post_id){
		$query = $this->db->query("SELECT username, comment_content,date FROM comment WHERE post_id = '".$post_id."'");
		return $query;
	}

	public function comment_submit(){
		// $json = $_POST["result"];
		// $json = json_decode("json",true);
		$comment = $_POST['comment'];
		$id = $_POST['id'];
		$username = $this->session->userdata("username");
		// $comment = $json['comment'];
		//  $id = $json['id'];
		$this->db->query("INSERT INTO comment(username,post_id,comment_content) VALUES('$username','$id','$comment')");

	}

	public function find_post($username){
		$user_id_query = $this->db->query("SELECT user_id FROM users WHERE username = '".$username."'");
		$user_id_array = $user_id_query->row_array();
		$user_id = $user_id_array['user_id'];
		$my_post = $this->db->query("SELECT title,date,post_id FROM post WHERE user_id = '".$user_id."'");
		return $my_post->result();
	}

	public function find_single_post($post_id){
		$single_post = $this->db->query("SELECT * FROM post WHERE post_id = '".$post_id."'");
		return $single_post->row();

	}

}