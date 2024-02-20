<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('authcontroller');
	}
	public function index()
	{
		$this->load->view('auth/login');
	}
	public function render_signup()
	{
		$this->load->view('auth/signup');
		
	}

	/* singup user */
	public function signup()
	{
		$errors = $this->authcontroller->validate();
		if(!$errors){
			if($this->authcontroller->create_account()){
				$this->login();
			}else{
				$this->session->set_flashdata('error', '<p class="error">Creating Account Failed</p>'); 
				redirect('/auth/render_signup');
			}
		}else{
			$this->session->set_flashdata('error', $errors);
			redirect('/auth/render_signup');
		}
	}

	/* login user */
	public function login()
	{
		$user = $this->authcontroller->login();
		if($user){
			$this->session->set_userdata(array('user'=>$user));
			if($user['role'] == 'admin'){
				redirect('/admin');
			}
			redirect('/products');
		}else{
			$this->session->set_flashdata('error', '<p class="error">Credentials Error..</p>'); 
			redirect('/auth');
		}
	}

	/* log out */
	public function logout(){
		$this->session->unset_userdata('user');
		redirect('/products');
	}
}
