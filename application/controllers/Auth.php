<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		// $this->load->view('auth/login');
		$this->load->view('auth/signup');
		// $this->load->view('widgets/header');
		// $this->load->view('home');
		// $this->load->view('item/item');
		// $this->load->view('cart/cart');
	}
	public function render_signup(){	
		$this->load->view('auth/signup');
	}
}
