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
        var_dump($errors);
        if($errors){
            $this->session->set_flashdata('errors', $errors);
        }else{
            $upload_error = $this->adminmodel->move_images();
            var_dump($upload_error);
            if($upload_error ){
                $this->session->set_flashdata('errors', $upload_error );
            }else{
                $images = $this->adminmodel->image_path_getter();
                $this->adminmodel->add_product($images);                
            }
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
        $this->session->set_flashdata('edit_product', $product);
        redirect('admin/products');
    }

    /* update product details */
    public function save_update()
    {
        $this->output->enable_profiler(TRUE);
        $errors = $this->adminmodel->validate();
        if(!$errors){
            $this->adminmodel->save_product_update();
        }
        redirect('admin/products');
    }
}
?>