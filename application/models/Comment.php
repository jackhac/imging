<?php
class Comment extends CI_Model
{
	public $id;
	public $comment;
	public $post
	public $user;
	public $timestamp;	
	
	function getComments($post)
	{
		$this -> db -> select('id, comment, post, user, timestamp');
		$this -> db -> from('comments');
		$this -> db -> where('post', $post);
 
		$query = $this -> db -> get();
 
		if($query -> num_rows() >0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
}
?>