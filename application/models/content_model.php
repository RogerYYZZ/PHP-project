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
		$content = mysql_real_escape_string($_POST['content']);
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
}