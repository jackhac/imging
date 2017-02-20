<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Home extends CI_Controller {

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
	 
	 function __construct()
	{
		parent::__construct();
		$this->load->model('post');
		$this->load->model('image');
		$this->load->library('s3');
	}
	
	public function index()
	{
		//var_dump($this->s3->listBuckets());
		//$this->s3->putBucket('teatfaddfafaf325423', 'public-read-write');
		
		$result = $this->post->get_posts(20);
		
		//$result = $this->post->ge
		
		if($result)
	    {
		 $data['post'] = $result;
		}
		
		$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		$this->load->view('partials/header', $data);
		$this->load->view('Home');
		$this->load->view('partials/footer');
	}
	
	public function upload() 
	{
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		
		if (($file_size > 2097152))
		{      
			$this->session->set_flashdata('status',300);
			redirect('/home');
		}
		else
		{
			$randomString=$this->post->generate_code();
			
			$_FILES['file']['name']=$this->image->rename_image($_FILES['file']['name'],$randomString);
					
			$this->s3->putObject($this->s3->inputFile($_FILES['file']['tmp_name']), 'imgingdata', $_FILES['file']['name'], 'public-read', 'REDUCED_REDUNDANCY');
			
			//insert into database
			
			$post_id=$this->post->insert_post($randomString, $this->session->logged_in, date("Y-m-d H:i:s"), 1, 0);
			
			$this->image->insert_image($_FILES['file']['name'], $post_id, date("Y-m-d H:i:s"));
					
			redirect('A/'.$randomString);
		}
		
    }
}
