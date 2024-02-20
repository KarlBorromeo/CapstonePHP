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
        <link rel="stylesheet" href="../../stylesheets/home.css">
    </head>
    <body class="d-flex">
        <?php $this->load->view('widgets/aside'); ?>
        <div class="border">
            <?php $this->load->view('widgets/header'); ?>
            <main>
                <form action="" method="POST" id="search-form" class="mb-5">
                    <div class="border border-top-0 border-start-0 border-bottom-0">
                        <input type="text" name="search" placeholder="Search Products" class="border">
                        <button type="submit"><img src="../../assets/images/search.svg"></button>                        
                    </div>
                    <a href="/products/cart" class="btn btn-primary p-3"><img src="../../assets/images/cart.svg"> Cart(0)</a>
                </form>
                <div class="d-flex">           
                    <ol id="categories">
                        <h4>Categories</h4>
                        <li class="text-center"><a href="#"><img src="../../assets/images/all_products.png">All Products</a></li>
                        <li class="text-center"><a href="#"><img src="../../assets/images/Vegetables.png">Vegetables</a></li>
                        <li class="text-center"><a href="#"><img src="../../assets/images/Fruits.png">Fruits</a></li>
                        <li class="text-center"><a href="#"><img src="../../assets/images/Meat.png">Meat</a></li>
                        <li class="text-center"><a href="#"><img src="../../assets/images/Dairy.png">Dairy</a></li>
                        <li class="text-center"><a href="#"><img src="../../assets/images/Grains.png">Grains</a></li>
                    </ol>
                    <ul id="products">
                        <h4>All Products(36)</h4>
                        <li>
                            <a href="/products/item">
                                <img src="../../assets/images/food.png">
                                <div>
                                    <p>Vegetable<p>
                                    <section>
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_empty.png">
                                        <p>36 Rating</p>
                                    </section>
                                    <span class="text-primary fw-semibold">
                                        $10
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/products/item">
                                <img src="../../assets/images/food.png">
                                <div>
                                    <p>Vegetable<p>
                                    <section>
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_empty.png">
                                        <p>36 Rating</p>
                                    </section>
                                    <span class="text-primary fw-semibold">
                                        $10
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/products/item">
                                <img src="../../assets/images/food.png">
                                <div>
                                    <p>Vegetable<p>
                                    <section>
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_empty.png">
                                        <p>36 Rating</p>
                                    </section>
                                    <span class="text-primary fw-semibold">
                                        $10
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/products/item">
                                <img src="../../assets/images/food.png">
                                <div>
                                    <p>Vegetable<p>
                                    <section>
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_empty.png">
                                        <p>36 Rating</p>
                                    </section>
                                    <span class="text-primary fw-semibold">
                                        $10
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>    
            </main>
        </div>
    </body>
</html>