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
        if($this->session->userdata('user')){
            $details = array('user_id' => $this->session->userdata('user')['id'],
                            'product_id' => $this->input->post('product_id'),
                            'pieces' => $this->input->post('quantity'),
                            'total' => $this->calc_total_precart());                
            $this->product->add_cart($details); 
        }else{
            redirect('/auth/login');
        }

    }

    /* fetch the items of the cart*/
    public function cart(){
        if($this->session->userdata('user')){
            $this->load->view('cart/cart');
        }else{
            redirect('/auth/login');
        }
    }

    /* remove item in cart */
    public function remove_item($cart_id)
    {
        if($this->session->userdata('user')){
            $this->product->remove_item($cart_id);
            $this->feth_cart_details();
        }else{
            redirect('/auth/login');
        }
    }

    /* fetch the cart items and calculate total */
    public function feth_cart_details()
    {
        $user_id = $this->session->userdata('user')['id'];
        $response = $this->product->fetch_cart($user_id);
        $this->load->view('partials/cart_list',array('cart'=>$response['cart']));
    }

    /* get the updated total of cart items */
    public function get_total_amount()
    {
        $user_id = $this->session->userdata('user')['id'];
        $response = $this->product->fetch_cart($user_id);
        echo $response['total_amount'];
    }

    /* update the items of the cart */
    public function update_cart_item($cart_id)
    {
        if($this->session->userdata('user')){
            $this->product->update_item($cart_id);
            $this->feth_cart_details();
        }else{
            redirect('/auth/login');
        }
    }

    /*proceed to checkout */
    public function checkout()
    {
        var_dump($this->input->post());
    }
}
?>