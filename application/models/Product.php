<?php defined('BASEPATH') or exit('direct access allowed');

class Product extends CI_Model{
    /* fetch reqeust for all products */
    public function fetch_all_product()
    {
        $response =  $this->db->query('SELECT * FROM products')->result_array();
        $products = array();
        foreach($response as $res){
            $res['images'] = json_decode($res['images'],true);
            $products[] = $res;
        }
        return $products;
    }

    /* fetch one product details */
    public function fetch_one_product($product_id)
    {
        $response = $this->db->query('SELECT * FROM products WHERE id = ?',array($product_id))->row_array();
        $response['images'] = json_decode($response['images'],true);
        return $response;
    }

    /* add to cart */
    public function add_cart($details)
    { 
        $this->output->enable_profiler(TRUE); 
        $payload = array($details['product_id'],
                        $details['user_id'],    
                        $details['pieces'],
                        $details['total']);
        $same_old_item = $this->db->query("SELECT * FROM cart_items WHERE users_id = ? AND products_id = ?",array($details['user_id'],$details['product_id']))->row_array();
        if($same_old_item != null){
            $item_price = $this->db->query("SELECT price FROM products WHERE id= ?",array($details['product_id']))->row_array();
            $updated_pieces = $same_old_item['pieces'] + $details['pieces'];
            $updated_total =  $updated_pieces * $item_price['price'];
            $this->db->query('UPDATE cart_items SET pieces = ?, total = ? ,updated_at = ? WHERE id = ?',array($updated_pieces,$updated_total,date('Y-m-d H:i:s'),$same_old_item['id']));
        }else{
            $this->db->query('INSERT INTO cart_items(products_id,users_id,pieces,total) VALUES(?,?,?,?)',$payload);
        }
    }

    /* fetch user's cart */
    public function fetch_cart($user_id)
    {
        $response =  $this->db->query("SELECT cart_items.id as cart_id, name, images, price, pieces, total, products.id as product_id FROM cart_items 
                                INNER JOIN products ON products.id = cart_items.products_id
                                WHERE users_id = ?",array($user_id))->result_array();
        $cart = array();
        $total_amount_items = 0;
        foreach($response as $res){
            $res['images'] = json_decode($res['images'],true);
            $cart[] = $res;
            $total_amount_items += $res['total'];
        }
        return array('cart'=>$cart,'total_amount'=>$total_amount_items);
    }

    /* remove item on cart */
    public function remove_item($cart_id)
    {
        $this->db->query('DELETE FROM cart_items WHERE id = ?',array($cart_id));
    }

    /* updated item on cart */
    public function update_item($cart_id)
    {
        if($this->input->post('quantity')>0){
            $item_price = $this->db->query("SELECT price FROM products WHERE id= ?",array($this->input->post('product_id')))->row_array();
            $updated_total = $item_price['price'] * $this->input->post('quantity');
            $this->db->query('UPDATE cart_items SET pieces = ?, total = ?, updated_at = ? 
                            WHERE id = ? AND products_id = ? AND users_id = ?',
                            array($this->input->post('quantity'),
                                    $updated_total,
                                    date('Y-m-d H:i:s'),
                                    $cart_id,
                                    $this->input->post('product_id'),
                                    $this->session->userdata('user')['id']));
        }

    }

}
?>