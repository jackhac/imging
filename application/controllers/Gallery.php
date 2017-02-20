<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('post','',TRUE);
		//$this->load->model('comment','',TRUE);
	}

	public function index($code = NULL)
	{
		if ($code==null)
		{
			show_404();
		}
		
		$result = $this->post->get_post($code);
		
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
				$data['description'] = $row->description;
				$datenow=new DateTime(date("Y-m-d H:i:s"));
				$date=$datenow->diff(new DateTime($row->timestamp));
				$data['timesince'] = $date->days.' day(s)';
			}
		}
		
		//$result2 = $this->comment->getComments($code);
		
		

		$data['title'] = 'IMGing';
		$data['base_url'] = base_url();
		$data['code'] = $code;
		$this->load->view('partials/header', $data);
		$this->load->view('GalleryPost',$data);
		//$this->load->view('Comments');
		$this->load->view('partials/footer');
		
	}
}