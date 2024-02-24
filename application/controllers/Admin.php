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
        $orders = $this->adminmodel->fetch_orders();
        $this->load->view('/admin/orders',array('orders'=> $orders));
    }

    /* fetch filtered category status orders */
    public function all_orders_categorized($status='')
    {
        $orders = $this->adminmodel->categorized_fetch_orders($status);
        $this->load->view('partials/admin_order_list',array('orders'=>$orders));
    }

    /* search order id */
    public function search_order_id()
    {
        $orders = $this->adminmodel->search_order_id($this->input->post('search'));
        $this->load->view('partials/admin_order_list',array('orders'=>$orders));
        // $this->load->view('/admin/orders',array('orders'=> $orders));
    }

    /* fetch all product */
    public function products()
    {
        $products = $this->product->fetch_all_product();
        $this->load->view('admin/products',array('products'=>$products));
    }

    /* fetch all filtered category product */
    public function all_products_categorized($category='')
    {
        $products = $this->product->fetch_all_product($category);
        $this->load->view('partials/admin_product_list',array('products'=>$products));
        // $this->load->view('admin/products',array('products'=>$products));
    }

    /* search the name of the product */
    public function search_product()
    {
        $products = $this->product->search_product($this->input->post('search'));
        $this->load->view('partials/admin_product_list',array('products'=>$products));
    }

    /*add product */
    public function add_product()
    {
        $errors = $this->adminmodel->validate();
        if($errors){
            $this->session->set_flashdata('add-product-error',$errors); 
        }else{
            $upload_error = $this->adminmodel->move_images();
            if($upload_error){
                $this->session->set_flashdata('add-product-error',$upload_error); 
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
        $products = $this->product->fetch_all_product();
        $this->load->view('partials/admin_product_list',array('products'=>$products));
    }

    /* fetch specific product details */
    public function fetch_one_product($product_id)
    {
        $product = $this->product->fetch_one_product($product_id);
        $this->load->view('partials/admin_product_edit',array('product'=>$product));
    }

    /* update product details*/
    public function save_update()
    {
        $errors = $this->adminmodel->validate();
        if(!$errors AND count($this->input->post('checkbox'))>0){
            $total_images = count($this->input->post('checkbox'))+ count($_FILES['images']['name']);
            if($_FILES['images']['name']['0']!= '' AND $total_images<=4){
                $upload_error = $this->adminmodel->move_images();
                if(!$upload_error){
                    $product_details = $this->product->fetch_one_product($this->input->post('product_id'));
                    $this->adminmodel->save_product_update($product_details);                    
                }
            }else{
                $product_details = $this->product->fetch_one_product($this->input->post('product_id'));
                $this->adminmodel->save_product_update($product_details);  
            }
        }
        redirect('admin/products');
    }

    /* update order status */
    public function order_update($order_id)
    {
        $this->adminmodel->update_status($order_id);
    }
}
?>