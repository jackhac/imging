<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('post','',TRUE);
	}

	public function index($id = NULL)
	{
		if ($id==null)
		{
			show_404();
		}
		
		$result = $this->post->get_post($id);
		
		
		
		if($result)
	    {
			//$sess_array = array();
			foreach($result as $row)
			{
				$data['filename'] = $row->filename;
				$data['code'] = $row->code;
				$data['title2'] = $row->title;
				$data['user'] = $row->user;
		  $data['views'] = $row->views;
				$datenow=new DateTime(date("Y-m-d H:i:s"));
				$date=$datenow->diff(new DateTime($row->timestamp));
				$data['timesince'] = $date->days.' day(s)';
			}
		}

		$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		$data['id'] = $id;
		$this->load->view('partials/header', $data);
		$this->load->view('post',$data);
		$this->load->view('partials/footer');
		
	}
}