<?php
class Post extends CI_Model
{
	public $id;
	public $filename;
	public $code;
	public $user;
	public $views;
	public $timestamp;
	
	function __construct() 
	{
		parent::__construct();
		$this->load->library('s3');
	}
	
	function form_insert($title2)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		
		for ($i = 0; $i <10; $i++) 
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
					
		$idx = strpos($_FILES['file']['name'],'.');
		$ext = substr($_FILES['file']['name'],$idx);
				
		$_FILES['file']['name']=$randomString.$ext;
			
		$this->s3->putObject($this->s3->inputFile($_FILES['file']['tmp_name']), 'imgingdata', $_FILES['file']['name'], 'public-read', 'REDUCED_REDUNDANCY');
		
		//insert into database
		
		$data = array(
			'filename' => $_FILES['file']['name'],
			'code' => $randomString,
			'user' => $_SESSION['logged_in'],
			'timestamp' => date("Y-m-d H:i:s"),
			'title' => $title2
		);
		$this->db->insert('images', $data);
		
		//do status logic
		
		$this->session->set_flashdata('status',0);
				
		redirect('A/index/'.$this->db->insert_id());
	}
	
	function get_post($id=null)
	{
		$query = $this->db->query('SELECT id, filename, code, title, user, (select count(*) from views where post='.$id.') views, timestamp FROM images where id='.$id.'');
		
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
	}
	
	function get_posts($num=null)
	{
		$query = $this->db->query('SELECT id, filename, code, title, user, (select count(*) from views views where post=images.id) views, timestamp FROM images images limit '.$num);
		
		return $query->result();
	}
}
?>