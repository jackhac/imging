<?php
class Topic extends CI_Model
{
	public $id;
	public $topic;
	public $status;
	public $time_stamp;
	
	function get_topics()
	{
		$query = $this->db->query('SELECT id, topic, status, time_stamp FROM topics order by id');
 
		 return $query->result();
	}
}
?>