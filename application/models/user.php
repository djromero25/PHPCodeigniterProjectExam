<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');
	}
	function get_all_users()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
	}
	function get_user_by_id($user_id)
	{
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
	}
	function get_user_by_email($email)
	{
		return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
	}
	function add_user($user)
	{
		$query = "INSERT INTO users (name, alias, email, password, birth_date, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
		$values = array($user['name'], $user['alias'], $user['email'], $user['password'], date_format(date_create($user['birth_date']),"Y-m-d"), date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
		return $this->db->query($query, $values);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */