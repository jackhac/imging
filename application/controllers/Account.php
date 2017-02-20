<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Account extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
	}
	function index()
	{
	}
	
	public function login()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_check_database');
 
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'IMGing';
			$data['base_url'] = base_url();
			$this->load->view('partials/header', $data);
			$this->load->view('Login');
			$this->load->view('partials/footer');
		}
		else
		{
		//Go to private area
		redirect('/home');
		}
	}
	
	public function loginform()
	{
		//This method will have the credentials validation
		
		$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		 $this->load->view('partials/header', $data);
		$this->load->view('Login');
		$this->load->view('partials/footer'); 
	}
	
	public function registerform()
	{
		//This method will have the credentials validation
		
		$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		 $this->load->view('partials/header', $data);
		$this->load->view('Register');
		$this->load->view('partials/footer'); 
	}
	
	function check_database($password)
	{
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');
	 
	   //query the database
	   $result = $this->user->login($username, $password);
	 
	   if($result)
	   {
		 //$sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array=$row->username;
		   $this->session->set_userdata('logged_in', $sess_array);
		 }
		 return TRUE;
	   }
	   else
	   {
		 $this->form_validation->set_message('check_database', 'Invalid username or password');
		 return false;
	   }
 }
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('/home');
	}
	
	public function register()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Retype Password', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
 
		if($this->form_validation->run() == FALSE)
		{
		$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		$this->load->view('partials/header', $data);
		$this->load->view('Register');
		$this->load->view('partials/footer');
		}
		else
		{
		//Go to private area
		redirect('/home');
		}
	}
	
	public function profile()
	{
		if (isset($_SESSION['logged_in']))
		{
			$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		$this->load->view('partials/header', $data);
		$this->load->view('Profile');
		$this->load->view('partials/footer');
		}
		else
		{
			redirect('/home');
		}
	}
}
