<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class User extends CI_Controller {

	 
	 function __construct()
	{
		parent::__construct();
		 
	}
	
	public function index()
	{
		
		
		$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		$this->load->view('partials/header', $data);
		$this->load->view('user');
		$this->load->view('partials/footer');
	}
}
