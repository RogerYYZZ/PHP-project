<?php

class User_model extends CI_Model{
	
	//private $username;
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
		
		$this->load->library('session');
	}

	// public function login(){

	// 	$username = $_POST['username'];
	// 	$password = md5($_POST['password']);
	// 	$query = $this->db->query("SELECT * FROM users Where username = '$username'");
		
	// 		$num = $query->num_rows();
	// 		if($num !== 0){
	// 			if($password == $query->row()->password)
	// 			{	$this->session->set_userdata("username",$username);
	// 				return true;
	// 			}
				
	// 			else
	// 				return false;
	// 				//return $password;
	// 		}
	// 		else
	// 			return false;
		

	// }
	 public function login(){

		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query = $this->db->query("SELECT * FROM users Where username = '$username'");
		
			$num = $query->num_rows();
			if($num !== 0){
				if($password == $query->row()->password)
				{	$this->session->set_userdata("username",$username);
					return $password."sb";
				}
				
				else
					//return $password."+".$query->row()->password;
					//return $password;
					return strlen($query->row()->password);
			}
			else
				return $num;
		

	}

	public function create_new(){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$Email = $_POST['email'];
		$query = $this->db->query("SELECT * FROM users Where username = '$username'");
		if($query->num_rows() == 0){
			$this->db->query("INSERT INTO users (username,Email,password) VALUES('$username', '$Email', '$password')");
			return true;
		}

		else{
			return false;
		}

	}






}