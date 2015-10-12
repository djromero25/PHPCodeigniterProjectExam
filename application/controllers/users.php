<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE); 
		date_default_timezone_set('America/Los_Angeles');
		$this->load->model('User');
	}

	function index()
	{
		if($this->session->userdata('email'))
		{
			redirect('/friends');
		}
		else{$this->load->view('new');}
	}
	function new_user()
	{
		$this->load->view('new');
	}
	function edit_user($user_id)
	{
		redirect('/');
	}
	function show_user($user_id)
	{
		$data['data'] = $this->User->get_user_by_id($user_id);
		$this->load->view('show', $data);
	}
	function create_user()
	{
		if(!$this->input->post()){$this->load->view('/views/index.html');}
		$data = $this->input->post();
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules("name", "Name", "max_length[45]|required|alpha_dash_space");
		$this->form_validation->set_rules("alias", "Alias", "max_length[45]|required|alpha_numeric");
		$this->form_validation->set_rules("email", "E-mail", "max_length[255]|required,valid_email");
		$this->form_validation->set_rules("password", "Password", "min_length[8]|max_length[45]|required|matches[confirm]");
		$this->form_validation->set_rules("confirm", "Password Confirmation", "min_length[8]|max_length[45]|required");
		$this->form_validation->set_rules('birth_date', 'Birth Date', 'date_valid|required');
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}
		$this->User->add_user($data);
		$data = $this->User->get_user_by_email($data['email']);
		$this->session->set_userdata('id', $data['id']);
		$this->session->set_userdata('email', $data['email']);
		$this->session->set_userdata('name', $data['name']);
		$this->session->set_userdata('alias', $data['alias']);
		redirect('/');
	}
	function destroy_user($user_id)
	{
		redirect('/');
	}
	function update_user($user_id)
	{
		redirect('/');
	}
	function login()
	{
		if(!$this->input->post()){$this->load->view('/views/index.html');}
		$post = $this->input->post();
		$data = $this->User->get_user_by_email($post['email']);
		if(!$data)
		{
			$this->session->set_flashdata('errors', "<p class='error'>Username or password incorrect.</p>");
			redirect("/");
		}
		if($data['password'] == $post['password'])
		{
			$this->session->set_userdata('id', $data['id']);
			$this->session->set_userdata('email', $data['email']);
			$this->session->set_userdata('name', $data['name']);
			$this->session->set_userdata('alias', $data['alias']);

		}
		redirect('/');
	}
	function logoff()
	{
		$this->session->unset_userdata('first_name');
		$this->session->unset_userdata('last_name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id');
		redirect("/");
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */