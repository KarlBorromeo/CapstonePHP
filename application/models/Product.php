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

    /* fetch the images of the product */
    // private function fetch_product_images($product_id)
    // {
    //     return $this->db->query('SELECT * FROM images WHERE products_id = ?',array($product_id))->result_array();
    // }

    /* fetch one product details */
    public function fetch_one_product($product_id)
    {
        $response = $this->db->query('SELECT * FROM products WHERE id = ?',array($product_id))->row_array();
        $response['images'] = json_decode($response['images'],true);
        return $response;
    }

}
?>