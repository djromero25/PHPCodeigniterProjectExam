<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friend extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');
	}
	function get_all_friends()
	{
		return $this->db->query("SELECT * FROM friends")->result_array();
	}
	function get_friend_by_id($user_id)
	{
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
	}
	function get_friends($user_id)
	{
		return $this->db->query("SELECT users.id, friends.user_id, friends.friend_id, users2.alias FROM users
								LEFT JOIN friends ON users.id = friends.user_id
								LEFT JOIN users as users2 ON users2.id = friends.friend_id
								WHERE users.id = ?", array($user_id))->result_array();

	}
	function get_non_friends($user_id)
	{
		return $this->db->query("SELECT friends.user_id, users.alias FROM friends
								LEFT JOIN users ON friends.user_id = users.id
								WHERE friends.friend_id != ? AND friends.user_id NOT IN (SELECT friends.friend_id FROM friends LEFT JOIN users ON friends.user_id = users.id WHERE friends.user_id = ?)
								AND user_id != ?
								GROUP BY users.alias", array($user_id, $user_id, $user_id))->result_array();
		
	}
	function add_friend($user_id, $friend_id)
	{
		$query1 = "INSERT INTO friends (user_id, friend_id, created_at, updated_at) VALUES (?,?,?,?)";
		$values1 = array($user_id, $friend_id, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$query2 = "INSERT INTO friends (user_id, friend_id, created_at, updated_at) VALUES (?,?,?,?)";
		$values2 = array($friend_id, $user_id, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
		return $this->db->query($query1, $values1) AND $this->db->query($query2, $values2);
	}
	function remove_friend_by_id($user_id, $friend_id)
	{
		$query = "DELETE FROM friends WHERE user_id = ? && friend_id = ?";
		$values1 = array($user_id, $friend_id);
		$values2 = array($friend_id, $user_id);
		return $this->db->query($query, $values1) AND $this->db->query($query, $values2);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */