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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                /* get all the list of items in user's cart */
                $.get('/cart/feth_cart_details',function(res){
                    console.log(res);
                    $('#list-items').html(res);
                    get_total_amount();
                })
                
                /* update the total when quantity changed */
                $(document).on('change','.quantity',function(){
                    var form = $(this).closest('form');
                    $.post(form.attr('action'), form.serialize(), function(res) {
                        $('#list-items').html(res);
                        get_total_amount();
                        return false;
                    });
                })

                /* deletes the item on the user's cart */
                $(document).on('click','a.del',function(event){
                    console.log($(this).attr('href'));
                    $.get($(this).attr('href'),function(res){
                        $('#list-items').html(res);
                        get_total_amount();
                    })
                    event.preventDefault();
                })

                /* submit the checkout form */
                $('#checkout-form').submit(function(){
                    console.log($(this).attr('action'));
                    $.post($(this).attr('action'),$(this).serialize(),function(res){
                        if(res!= ''){
                            $('#stripe-container').html(res);
                        }else{
                            $.get('/checkout/checkout_error_getter',function(error){
                                alert(error);
                            })
                        }  
                    })
                    return false;
                })
            })
            function get_total_amount(){
                /* renders on UI the order summary details udpates */
                $.get('/cart/get_total_amount',function(res){
                    console.log(res);
                    $('#total_amount').val(res);
                    $('#p-total-amount').html('$'+res);
                    $.get('/products/shippFee_getter',function(fee){
                        $('#shipfee').html('$'+ fee);
                        $('#total_with_fee').html('$'+ (parseFloat(res) + parseFloat(fee)));
                    })
                })
            }
        </script>
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
                </form>
                <div class="d-flex gap-5">
                    <ul id="list-items">
                    </ul>
                    <form id="checkout-form" action="/checkout/checkout_now" method="POST">
                        <div class="row">
                            <div class="form-floating mb-3 col-6">
                                <input  type="text" class="form-control" id="firstname" placeholder="" name="firstname" value="<?= $firstname ?>">
                                <label for="firstname">Firstname</label>
                            </div>
                            <div class="form-floating mb-3 col-6">
                                <input  type="text" class="form-control" id="lastname" placeholder="" name="lastname" value="<?= $lastname ?>">
                                <label for="lastname">Lastname</label>
                            </div>
                        </div> 
                        <div class="form-floating mb-3 col-12">
                            <input  type="text" class="form-control" id="address" placeholder="" name="address">
                            <label for="address">Address</label>
                        </div>
                        <div class="form-floating mb-3 col-12">
                            <input type="text" class="form-control" id="address2" placeholder="" name="address2">
                            <label for="address2">Address 2</label>
                        </div>
                        <div class="row">
                            <div class="form-floating mb-3 col-4">
                                <input  type="text" class="form-control" id="city" placeholder="" name="city">
                                <label for="city">City</label>
                            </div>
                            <div class="form-floating mb-3 col-4">
                                <input  type="text" class="form-control" id="state" placeholder="" name="state">
                                <label for="state">State</label>
                            </div>
                            <div class="form-floating mb-3 col-4">
                                <input  type="number" class="form-control" id="zip-code" placeholder="" name="zip-code">
                                <label for="zip-code">Zip Code</label>
                            </div>
                        </div>
                        <p>Order Summary</p>
                        <section class="d-flex justify-content-between">
                            <p>Items</p>
                            <input id="total_amount" type="hidden" value="0">
                            <p id="p-total-amount">0</p>
                        </section>
                        <section class="d-flex justify-content-between">
                            <p>Shipping Fee</p>
                            <p id="shipfee">0</p>
                        </section>
                        <section class="d-flex justify-content-between">
                            <p>Total Amount</p>
                            <p id="total_with_fee">$35</p>
                        </section>
                        <button type="submit" class="btn btn-primary text-center col-12">Proceed to Checkout</button>
                    </form>
                </div>
            </main>
        </div>
        <div id="stripe-container"></div>
    </body>
</html>