<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Upload extends CI_Controller{

 		public function __construct()
		{	
			parent::__construct();
			$this->load->helper('url');
		}

 		public function Image_upload(){

 			$config['upload_path'] = "./images/";
 			$config['allowed_types'] = 'jpg|jpeg|gif|png';
 			// $config['max_size'] = '100';
    // 		$config['max_width']  = '1024';
    // 		$config['max_height']  = '768';
 			$this->load->library('upload',$config);
 			$this->upload->do_upload();
 			$file_data = $this->upload->data();
 			echo base_url().'images/'.$file_data['file_name'];
 			// if(!$this->upload->do_upload()){
 			// 	$data['error'] = $this->upload->display_errors();
 		// 	$this->load->view('post',$data);
 			// }
 		//	$this->load->view('content_view');
 		}


 }