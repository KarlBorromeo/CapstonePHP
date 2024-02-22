<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Organic Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../stylesheets/admin/orders.css">
        <link rel="stylesheet" href="../../stylesheets/admin/products.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#create-product').submit(function(){
                    $.post($(this).attr('action'),$(this).serialize(),function(res){
                        // console.log('submitted');
                        // console.log(res);
                    })
                    // return false;
                })
                $('#img_create_upload').change(function(){
                    images = $(this)[0].files;
                    console.log(images);
                    let imgTags = "";
                    if(Object.keys(images).length<= 4){
                        for(let i = 0; i< Object.keys(images).length; i++){
                            let reader = new FileReader();
                            console.log(images[i]);
                            reader.onload = function(event){
                                imgTags += `<section><input type="radio" value="${i}" id="radio${i}" name="marked_main" checked>
                                            <label for="radio${i}"><img src="${event.target.result}">Mark</label></section>`
                                $('.preview-images').html(imgTags);
                            };
                            reader.readAsDataURL(images[i]);
                        }
                    }else{
                        alert('Max 4 images!');
                    }
                })
                $(document).on('click','.x-btn',function(){
                    $(this).parent().hide();
                })
            })
        </script>
    </head>
    <body class="d-flex">
        <?php $this->load->view('admin/widgets/aside.php') ?>
        <div>
            <?php $this->load->view('admin/widgets/header.php') ?>
            <h2>Products</h2>
            <main>
                <form action="#" method="POST" class="mb-3">
                    <div>
                        <input type="text" name="search" placeholder="Search Products">
                        <button type="submit"><img src="../../../assets/images/search.svg"></button>                        
                    </div>
                    <a data-bs-toggle="modal" data-bs-target="#create-product" class="btn btn-primary p-2"><img src="../../assets/images/plus.svg"> Add Product</a>
                </form>
                <div class="d-flex gap-4">
                    <ul id="categories">
                        <h5>Categories</h5>
                        <li>
                            <img src="../../../assets/images/all_orders_icon.svg">
                            <p>All Order</p>
                        </li>
                        <li id="pending">
                            <img src="../../../assets/images/pending_icon.svg">
                            <p>Pending</p>
                        </li>
                        <li>
                            <img src="../../../assets/images/on_process_icon.svg">
                            <p>On-Process</p>
                        </li>
                        <li >
                            <img src="../../../assets/images/shipped_icon.svg">
                            <p>Shipped</p>
                        </li>
                        <li id="delivered">
                            <img src="../../../assets/images/delivered_icon.svg">
                            <p>Delivered</p>
                        </li>
                    </ul>
                    <section id="products">
                        <table>                     
                            <thead> 
                                <tr>
                                    <th>Product</th>
                                    <th>ID #</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Inventory</th>
                                    <th>Sold</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php
        foreach($products as $product){
        $main_index = $product['images']['main_img'];
?>
                                <tr>
                                    <td class="image d-flex align-items-center gap-3 highlight"><img src="../../../assets/uploads/<?= $product['images']['img'][$main_index] ?>"><?= $product['name'] ?></td>
                                    <td><?= $product['id'] ?></td>
                                    <td class="highlight"><?= $product['price'] ?></td>
                                    <td><?= $product['category'] ?></td>
                                    <td><?= $product['stocks'] ?></td>
                                    <td>0</td>
                                    <td>
                                        <a class="edit btn btn-outline-primary" href="/admin/fetch_one_product/<?= $product['id'] ?>">Edit</a>
                                        <!-- <button type="button" class="edit" > -->
                                            <!-- Edit
                                        </button> -->
                                        <a href="/admin/delete_product/<?= $product['id'] ?>" class="delete"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cad"/></svg></a>
                                    </td>
                                </tr>
<?php
        }
?>
                            </tbody>
                        </table>                        
                    </section>
                </div>
            </main>
        </div>

        <!-- 
            CREATE PRODUCT FORM
        -->
        <div class="modal fade" id="create-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content pt-2">
                    <?= $this->session->flashdata('errors') ?>
                    <h1 class="modal-title fs-5 text-center mt-2" id="exampleModalLabel">Add a Product</h1>
                    <form class="modal-body" action="/admin/add_product" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" id="name" name="product_name">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="" id="description" name="description"></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating col-6">
                                <select class="form-select" aria-label="Default select example" id="category" name="category">
                                    <option selected>Vegetable</option>
                                    <option value="Fruits">Fruits</option>
                                    <option value="Meat">Meat</option>
                                    <option value="Dairy">Dairy</option>
                                    <option value="Grains">Grains</option>
                                </select>
                                <label for="category" class="ms-2">Category</label>
                            </div>                       
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="price" name="price" value="1">
                                <label for="price" class="ms-2">Price</label>
                            </div>
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="stocks" name="stocks" value="1" min="1">
                                <label for="stocks" class="ms-2">Stocks</label>
                            </div>
                        </div>
                        <div class="preview-images mb-3 text-center">
                            <!-- show here the uploaded images -->
                        </div>
                        <div class="mb-3">
                            <input id="img_create_upload" class="form-control" type="file" id="formFileMultiple" multiple name="images[]">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add</button>                                
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    if($this->session->flashdata('edit_product')){
        $main_index = $this->session->flashdata('edit_product')['images']['main_img'];
?>
        <!-- 
            EDIT PRODUCT FORM
        -->
        <div class="" id="edit-product" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content pt-2">
                    <?= $this->session->flashdata('errors') ?>
                    <h1 class="modal-title fs-5 text-center mt-1" id="exampleModalLabel">Edit Product <?= $this->session->flashdata('edit_product')['id'] ?></h1>      
                    <form class="modal-body" action="/admin/save_update" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" id="name" name="product_name" value="<?= $this->session->flashdata('edit_product')['name'] ?>">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="" id="description" name="description"><?= $this->session->flashdata('edit_product')['description'] ?></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating col-6">
                                <select class="form-select" aria-label="Default select example" id="category" name="category">
                                    <option <?= ($this->session->flashdata('edit_product')['category']=='Vegetables')?'selected':''?> value="Vegetables">Vegetable</option>
                                    <option <?= ($this->session->flashdata('edit_product')['category']=='Fruits')?'selected':''?> value="Fruits">Fruits</option>
                                    <option <?= ($this->session->flashdata('edit_product')['category']=='Meat')?'selected':''?> value="Meat">Meat</option>
                                    <option <?= ($this->session->flashdata('edit_product')['category']=='Dairy')?'selected':''?> value="Dairy">Dairy</option>
                                    <option <?= ($this->session->flashdata('edit_product')['category']=='Grains')?'selected':''?> value="Grains">Grains</option>
                                </select>
                                <label for="category" class="ms-2">Category</label>
                            </div>                       
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="price" name="price" value="<?= $this->session->flashdata('edit_product')['price'] ?>">
                                <label for="price" class="ms-2">Price</label>
                            </div>
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="stocks" name="stocks" value="<?= $this->session->flashdata('edit_product')['stocks'] ?>" min="1">
                                <label for="stocks" class="ms-2">Stocks</label>
                            </div>
                        </div>
                        <div class="preview-images mb-3 text-center">
<?php
    foreach($this->session->flashdata('edit_product')['images']['img'] as $key => $image){
?>
                            <section>
                                <input type="radio" value="<?= $key ?>" id="edit<?= $key ?>" name="marked_main" <?= ($key==$main_index)?'checked':'' ?>>
                                <input type="checkbox" value="<?= $key ?>" name="checkbox[]" checked id="checkbox<?= $key ?>">
                                <label class="x-btn" for="checkbox<?= $key ?>"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cad"></svg></label>
                                <label for="edit<?= $key ?>">
                                    <img src="../../../assets/uploads/<?= $image?>">Main
                                </label>
                            </section>    
<?php
    }
?>                  
                        </div>
                        <div class="mb-3">
                            <input id="img_create_upload" class="form-control" type="file" id="formFileMultiple" multiple name="images[]">
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="<?= $this->session->flashdata('edit_product')['id'] ?>" name="product_id">
                            <a href="/admin/products" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php        
    }
?>
    </body>
</html>