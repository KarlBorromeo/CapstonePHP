<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('product');
    }
    public function index()
    {
        $this->load->view('/admin/orders');
    }

    /* fetch all product */
    public function products()
    {
        $products = $this->product->fetch_all_product();
        $this->load->view('admin/products',array('products'=>$products));
    }

    /*add product */
    public function add_product()
    {
        $errors = $this->adminmodel->validate();
        if($errors){
            $this->session->set_flashdata('errors', $errors);
        }else{
            $images = $this->adminmodel->image_path_getter();
            $this->adminmodel->add_product($images);
        }
        redirect('/admin/products');
    }

    /* delete product using product id*/
    public function delete_product($product_id)
    {
        $this->adminmodel->delete_product($product_id);
        redirect('/admin/products');
    }

    /* fetch specific product details */
    public function fetch_one_product($product_id)
    {
        $product = $this->product->fetch_one_product($product_id);
        var_dump($product);
    }

}
?>