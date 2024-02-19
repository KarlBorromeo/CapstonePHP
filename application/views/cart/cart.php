<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Organice Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../stylesheets/home.css">
        <link rel="stylesheet" href="../../../stylesheets/cart/cart.css">
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
                    <a href="#" class="btn btn-primary p-3"><img src="../../assets/images/cart.svg"> Cart(0)</a>
                </form>
                <div class="d-flex gap-5">
                    <ul id="list-items">
                        <li class="d-flex gap-5 align-items-center justify-content-between">
                            <div>
                                <img src="../../../assets/images/burger.png">
                                <section class="text-center">
                                    <p>Vegetable<p>
                                    <span class="text-primary fw-semibold border">$10</span>
                                </section>                                
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <form action="" method="POST" class="d-flex gap-4">
                                    <label>
                                        <p>Quantity</p>
                                        <input type="number" name="quantity" min="1" value="1" class="border"> 
                                    </label>
                                    <label>
                                        <p>Total Amount</p>
                                        <input type="text" value="$10" disabled class="text-primary fw-semibold border">  
                                    </label> 
                                </form>
                                <a href="#" class="border border-top-0 border-bottom-0 border-end-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cadced"/></svg></a>
                            </div>
                        </li>
                        <li class="d-flex gap-5 align-items-center justify-content-between">
                            <div>
                                <img src="../../../assets/images/burger.png">
                                <section class="text-center">
                                    <p>Vegetable<p>
                                    <span class="text-primary fw-semibold border">$10</span>
                                </section>                                
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <form action="" method="POST" class="d-flex gap-4">
                                    <label>
                                        <p>Quantity</p>
                                        <input type="number" name="quantity" min="1" value="1" class="border"> 
                                    </label>
                                    <label>
                                        <p>Total Amount</p>
                                        <input type="text" value="$10" disabled class="text-primary fw-semibold border">  
                                    </label> 
                                </form>
                                <a href="#" class="border border-top-0 border-bottom-0 border-end-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cadced"/></svg></a>
                            </div>
                        </li>
                        <li class="d-flex gap-5 align-items-center justify-content-between">
                            <div>
                                <img src="../../../assets/images/burger.png">
                                <section class="text-center">
                                    <p>Vegetable<p>
                                    <span class="text-primary fw-semibold border">$10</span>
                                </section>                                
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <form action="" method="POST" class="d-flex gap-4">
                                    <label>
                                        <p>Quantity</p>
                                        <input type="number" name="quantity" min="1" value="1" class="border"> 
                                    </label>
                                    <label>
                                        <p>Total Amount</p>
                                        <input type="text" value="$10" disabled class="text-primary fw-semibold border">  
                                    </label> 
                                </form>
                                <a href="#" class="border border-top-0 border-bottom-0 border-end-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cadced"/></svg></a>
                            </div>
                        </li>
                        <li class="d-flex gap-5 align-items-center justify-content-between">
                            <div>
                                <img src="../../../assets/images/burger.png">
                                <section class="text-center">
                                    <p>Vegetable<p>
                                    <span class="text-primary fw-semibold border">$10</span>
                                </section>                                
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <form action="" method="POST" class="d-flex gap-4">
                                    <label>
                                        <p>Quantity</p>
                                        <input type="number" name="quantity" min="1" value="1" class="border"> 
                                    </label>
                                    <label>
                                        <p>Total Amount</p>
                                        <input type="text" value="$10" disabled class="text-primary fw-semibold border">  
                                    </label> 
                                </form>
                                <a href="#" class="border border-top-0 border-bottom-0 border-end-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cadced"/></svg></a>
                            </div>
                        </li>
                    </ul>
                    <form id="checkout-form" action="" method="POST">
                        <div class="row">
                            <div class="form-floating mb-3 col-6">
                                <input type="text" class="form-control" id="firstname" placeholder="" name="firstname">
                                <label for="firstname">Firstname</label>
                            </div>
                            <div class="form-floating mb-3 col-6">
                                <input type="text" class="form-control" id="lastname" placeholder="" name="lastname">
                                <label for="lastname">Lastname</label>
                            </div>
                        </div> 
                        <div class="form-floating mb-3 col-12">
                            <input type="text" class="form-control" id="address" placeholder="" name="address">
                            <label for="address">Address</label>
                        </div>
                        <div class="form-floating mb-3 col-12">
                            <input type="text" class="form-control" id="address2" placeholder="" name="address2">
                            <label for="address2">Address 2</label>
                        </div>
                        <div class="row">
                            <div class="form-floating mb-3 col-4">
                                <input type="text" class="form-control" id="city" placeholder="" name="city">
                                <label for="city">City</label>
                            </div>
                            <div class="form-floating mb-3 col-4">
                                <input type="text" class="form-control" id="state" placeholder="" name="state">
                                <label for="state">State</label>
                            </div>
                            <div class="form-floating mb-3 col-4">
                                <input type="text" class="form-control" id="zip-code" placeholder="" name="zip-code">
                                <label for="zip-code">Zip Code</label>
                            </div>
                        </div>
                        <p>Order Summary</p>
                        <section class="d-flex justify-content-between">
                            <p>Items</p>
                            <p>$30</p>
                        </section>
                        <section class="d-flex justify-content-between">
                            <p>Shipping Fee</p>
                            <p>$5</p>
                        </section>
                        <section class="d-flex justify-content-between">
                            <p>Total Amount</p>
                            <p>$35</p>
                        </section>
                        <button type="submit" class="btn btn-primary text-center col-12">Proceed to Checkout</button>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>