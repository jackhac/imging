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
	
	function insert_post($code, $user, $timestamp, $type, $public_status)
	{
		$post = array(
			'code' => $code,
			'user' => $user,
			'timestamp' => $timestamp,
			'type' => $type,
			'public_status' => $public_status
		);
		
		$this->db->insert('posts', $post);
		
		return $this->db->insert_id();
	}
	
	function delete_post($id)
	{
		
	}
	
	function generate_code()
	{
		$randomString = '';
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		
		for ($i = 0; $i <10; $i++) 
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		return $randomString;
	}
	
	function get_post($code=null)
	{
		$query = $this->db->query('SELECT id, code, title, description, user, (select filename from images images where post=posts.id limit 1) filename, (select count(*) from views where post=posts.id) views, timestamp FROM posts posts where code="'.$code.'"');
		
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
	}
	
	function get_posts($num=null)
	{
		$query = $this->db->query('SELECT id, code, title, description, user, (select filename from images images where post=posts.id limit 1) filename, (select count(*) from views views where post=posts.id) views, timestamp FROM posts posts limit '.$num);
		
		return $query->result();
	}
}
?>