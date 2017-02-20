<?php
class Image extends CI_Model
{
	public $id;
	public $post;
	public $filename;
	public $timestamp;
	
	function __construct() 
	{
		parent::__construct();
	}
	
	function insert_image($filename, $post, $timestamp)
	{
		$images = array(
			'filename' => $filename,
			'post' => $post,
			'timestamp' => $timestamp
		);
		$this->db->insert('images', $images);
		
		return $this->db->insert_id();
	}
	
	function rename_image($filename, $randomString)
	{
		$idx = strpos($filename,'.');
		$ext = substr($filename,$idx);
				
		$filename=$randomString.$ext;
		
		return $filename;
	}
}
?>