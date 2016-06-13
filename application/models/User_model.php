<?php

class User_model extends CI_Model{
	
	//private $username;
	
	public function __construct()
	{	
		parent::__construct();
		$this->load->database();
		
		$this->load->library('session');
	}

	public function login(){

		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query = $this->db->query("SELECT * FROM users Where username = '$username'");
		
			$num = $query->num_rows();
			if($num !== 0){
				if($password == $query->row()->password)
				{	$this->session->set_userdata("username",$username);
					return true;
				}
				
				else
					return false;
			}
			else
				return false;
		

	}

	public function create_new(){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$query = $this->db->query("SELECT * FROM users Where username = '$username'");
		if($query->num_rows() == 0){
			$this->db->query("INSERT INTO users (username,Email,password) VALUES('$username', '$email', '$password')");
			return true;
		}

		else{
			return false;
		}

	}




}