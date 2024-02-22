<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product');
    }
    public function index()
    {
        $products = $this->product->fetch_all_product();
        $this->load->view('home',array('products'=>$products));
    }

    /* fetch details of specific product*/
    public function item($product_id)
    {
        $product = $this->product->fetch_one_product($product_id);
        $this->load->view('item/item',array('product'=>$product,'main_index'=>$product['images']['main_img']));
    }

    /* update the total_amount pre checkout */
    public function update_total(){
        echo $this->calc_total_precart();
    }
    private function calc_total_precart()
    {
        $product = $this->product->fetch_one_product($this->input->post('product_id'));
        return $product['price'] * $this->input->post('quantity');
    }

    /* add to cart */
    public function add_cart()
    {
        $product_id = $this->input->post('product_id');
        $total = $this->calc_total_precart();
        echo $total;
    }

    public function cart(){
        $this->load->view('cart/cart');
    }
}
?>