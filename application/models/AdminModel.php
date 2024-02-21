<?php defined('BASEPATH') OR exit('direct acess not allowed');

class AdminModel extends CI_Model{
    private $uploaded_image_paths = array();
    public function __construct()
    {
        parent::__construct();
        $this->uploaded_image_paths  = [];
    }
    /* return the path of uplaoded images */
    public function move_images()
    {
        $image_path = array();
        $config['upload_path']          = 'C:/wamp64/www/Capstone/assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = TRUE;
        $this->load->library('upload',$config);
        if(count($_FILES['images']['name']) <= 4){
            for( $i = 0; $i < count($_FILES['images']['name']) ;$i++){
                $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['image']['error'] = $_FILES['images']['error'][$i];
                $_FILES['image']['size'] = $_FILES['images']['size'][$i];
                if(!$this->upload->do_upload('image'))
                {
                    return $this->upload->display_errors('<p class="error">','</p>');
                }
                else
                {
                    $image_path[] = $this->upload->data('file_name');
                }
            }      
            $this->uploaded_image_paths = $image_path;    
        }else{
            return '<p class="error">Max 4 images!</p>';
        }
    }

    /* validate upload form fields */
    public function validate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name','Product Name', 'required');
        $this->form_validation->set_rules('description','Description', 'required');
        $this->form_validation->set_rules('category','Category', 'required');
        $this->form_validation->set_rules('price','Price', 'required|numeric');
        $this->form_validation->set_rules('stocks','Stocks', 'required|numeric');
        if($this->form_validation->run()){
            return null;
        }else{
            return validation_errors('<p class="error">','</p>');
        }
    }

    /* return the uploaded image paths */
    public function image_path_getter()
    {
        return $this->uploaded_image_paths;
    }

    /* insert data into table products */
    public function add_product($images)
    {
        $payload = array($this->input->post('product_name'),
                        $this->input->post('description'),
                        $this->input->post('category'),
                        $this->input->post('price'),
                        $this->input->post('stocks'));
        $this->db->query('INSERT INTO products(name,description,category,price,stocks) VALUES(?,?,?,?,?)',$payload);
        $product_id = $this->db->insert_id();
        $this->add_images($product_id,$images);
    }

    /* insert data into table images */
    public function add_images($product_id,$images)
    {
        foreach($images as $image){
            $this->db->query('INSERT INTO images(products_id,file_name) VALUES(?,?)',array($product_id,$image));
        }
    }

    /* delete product */
    public function delete_product($product_id)
    {
        $this->db->query('DELETE FROM images where products_id = ?', array($product_id));
        $this->db->query('DELETE FROM products where id = ?', array($product_id)); 
    }

    /* save product updates */
    public function save_product_update()
    {
        $this->db->query('UPDATE products 
        SET name = ?, description = ?, category = ?, price = ?, stocks = ?
        WHERE id = ?',
        array($this->input->post('product_name'),
            $this->input->post('description'),
            $this->input->post('category'),
            $this->input->post('price'),
            $this->input->post('stocks'),
            $this->input->post('product_id'),
        ));
    }

}
?>