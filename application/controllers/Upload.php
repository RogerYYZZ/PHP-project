<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Upload extends CI_Controller{

 		public function __construct()
		{	
			parent::__construct();
			$this->load->helper('url');
		}

 		public function Image_upload(){

 		// 	$config['upload_path'] = "./images/";
 		// 	$config['allowed_types'] = 'jpg|jpeg|gif|png';
 	
 		// 	$this->load->library('upload',$config);
 		// 	$this->upload->initialize($config);
 		// 	$this->upload->do_upload();
 		// 	$file_data = $this->upload->data();
 		// 	$config['image_library'] = 'gd2';
 		// 	$config['source_image'] = $file_data['full_path'];
   //      	$config['maintain_ratio'] = TRUE;
   //      	$config['width']     = 500;
   //      	$config['height']   = 300;
			// $this->load->library('image_lib', $config); 
			// $this->image_lib->resize();
 		// 	echo base_url().'images/'.$file_data['file_name'];
 			$this->load->library('aws_sdk');
 			 $filePath = $_FILES["userfile"]["tmp_name"];
 			 $filename = $_FILES["userfile"]["name"];
 			// echo $fileName;
    		try{
    			$aws_object=$this->aws_sdk->saveObject(array(
        				'Bucket'      => 'zyang-image',
        				 'Key'         => 'images/'.$filename,
       					 'ACL'         => 'public-read',
       					 'SourceFile'  => $filePath,
       					 'ContentType' => 'image/jpeg/png/jpg'
    				))->toArray();
    			echo $aws_object['ObjectURL'];
    		//	echo $filename;
				}catch (Exception $e){
    				$error = "Something went wrong saving your file.\n".$e;
					}

 			
 		}


 }