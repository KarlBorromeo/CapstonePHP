<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
    }
    public function index(){
        $this->load->view('/admin/orders');
    }
    public function products(){
        $this->load->view('admin/products');
    }
    public function add_product(){
        // $uploads_dir = 'C:/wamp64/www/CapstoneUploads/';
        // $images_path = array();
        // if($_FILES){
        //     for( $i = 0; $i < count($_FILES['images']['name']) ;$i++){
        //         $newPath = $uploads_dir.$_FILES['images']['name'][$i];
        //         $images_path[] = $newPath;
        //         move_uploaded_file($_FILES['images']['tmp_name'][$i], $newPath );
        //     }            
        // }
        $config['upload_path']          = 'C:/wamp64/www/CapstoneUploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload');
        var_dump($this->upload->data());
        if ( ! $this->upload->do_upload('images'))
        {
                $error = array('error' => $this->upload->display_errors());

                var_dump($error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                var_dump($data);
        }
    }
}
?>