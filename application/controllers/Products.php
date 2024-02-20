<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
    public function index(){
        $this->load->view('home');
    }
    public function item(){
        $this->load->view('item/item');
    }
    public function cart(){
        $this->load->view('admin/products');
    }
}
?>