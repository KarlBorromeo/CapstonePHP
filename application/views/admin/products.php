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
                                <tr>
                                    <td class="image d-flex align-items-center gap-3 highlight"><img src="../../../assets/images/food.png">Vegetables</td>
                                    <td>123</td>
                                    <td class="highlight">$10</td>
                                    <td>Vegetable</td>
                                    <td>123</td>
                                    <td>1000</td>
                                    <td>
                                        <!-- <a class="edit" href="#">Edit</a> -->
                                        <button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#edit-product">
                                            Edit
                                        </button>
                                        <a href="#" class="delete"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cad"/></svg></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="image d-flex align-items-center gap-3 highlight"><img src="../../../assets/images/food.png">Vegetables</td>
                                    <td>123</td>
                                    <td class="highlight">$10</td>
                                    <td>Vegetable</td>
                                    <td>123</td>
                                    <td>1000</td>
                                    <td>
                                        <!-- <a class="edit" href="#">Edit</a> -->
                                        <button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#edit-product">
                                            Edit
                                        </button>
                                        <a href="#" class="delete"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cad"/></svg></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="image d-flex align-items-center gap-3 highlight"><img src="../../../assets/images/food.png">Vegetables</td>
                                    <td>123</td>
                                    <td class="highlight">$10</td>
                                    <td>Vegetable</td>
                                    <td>123</td>
                                    <td>1000</td>
                                    <td>
                                        <!-- <a class="edit" href="#">Edit</a> -->
                                        <button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#edit-product">
                                            Edit
                                        </button>
                                        <a href="#" class="delete"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cad"/></svg></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>                        
                    </section>
                </div>
            </main>
        </div>

        <!-- Create Product Modal -->
        <div class="modal fade" id="create-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <h1 class="modal-title fs-5 text-center mt-3" id="exampleModalLabel">Add a Product</h1>
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
                                    <option value="1">Fruits</option>
                                    <option value="2">Meat</option>
                                    <option value="3">Dairy</option>
                                    <option value="3">Grains</option>
                                </select>
                                <label for="category" class="ms-2">Category</label>
                            </div>                       
                            <div class="form-floating col-3">
                                <input type="text" class="form-control" placeholder="" id="price" name="price" value="1">
                                <label for="price" class="ms-2">Price</label>
                            </div>
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="stocks" name="stocks" value="1" min="1">
                                <label for="stocks" class="ms-2">Stocks</label>
                            </div>
                        </div>
                        <div class="mb-3">
                        <?php echo form_open_multipart('upload/do_upload');?>
                            <input class="form-control" type="file" id="formFileMultiple" name="images">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>