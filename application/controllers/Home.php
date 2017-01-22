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
		$this->load->model('post','',TRUE);
		 $this->load->library('s3');
	}
	
	public function index()
	{
		//var_dump($this->s3->listBuckets());
		//$this->s3->putBucket('teatfaddfafaf325423', 'public-read-write');
		
		$result = $this->post->get_posts(20);
		
		if($result)
	    {
		 $data['post'] = $result;
		}
		
		$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		$this->load->view('partials/header', $data);
		$this->load->view('home');
		$this->load->view('partials/footer');
	}
	
	public function upload() 
	{
		
		$this->load->model('Post');
		$this->Post->form_insert($this->input->post('title2'));
		
    }
}
