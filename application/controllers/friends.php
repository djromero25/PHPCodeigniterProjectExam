<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/friend_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE); 
		date_default_timezone_set('America/Los_Angeles');
		$this->load->model('Friend');
	}

	function index()
	{
		if($this->session->userdata('email'))
		{
			$data['friends'] = $this->Friend->get_friends($this->session->userdata('id'));
			$data['non_friends'] = $this->Friend->get_non_friends($this->session->userdata('id'));
			$this->load->view('index',$data);
		}
	}
	function new_friend()
	{
		redirect('/');	}
	function edit_friend($friend_id)
	{
		redirect('/');
	}
	function show_friend()
	{
		redirect('/');
	}
	function create_friend($friend_id)
	{
		if(!$this->Friend->get_friend_by_id($friend_id)){redirect('/views/index.html');}
		$this->Friend->add_friend($this->session->userdata('id'), $friend_id);
		redirect('/');
	}
	function destroy_friend($friend_id)
	{
		if(!$this->Friend->get_friend_by_id($friend_id)){redirect('/views/index.html');}
		$this->Friend->remove_friend_by_id($this->session->userdata('id'), $friend_id);
		redirect('/');
	}
	function update_friend($friend_id)
	{
		redirect('/');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */