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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){

                /* update the order status realtime */
                $(document).on('change','.select-status',function(){
                    form = $(this).closest('form');
                    $.post(form.attr('action'),form.serialize(),function(res){
                        return false;
                    })
                })

                /* get the orders by categories */
                $('#categories li a').on('click',function(event){
                    console.log($(this).attr('href'));
                    $.get($(this).attr('href'),function(res){
                        $('tbody').html(res);
                    })
                    event.preventDefault();
                })

                /* search result */
                $('#search-input').on('input',function(){
                    console.log('res');
                    var form = $(this).parent();
                    $.post(form.attr('action'),form.serialize(),function(res){
                        $('tbody').html(res);
                    })                        
                })
                
            })
        </script>
    </head>
    <body class="d-flex">
        <?php $this->load->view('admin/widgets/aside.php') ?>
        <div>
            <?php $this->load->view('admin/widgets/header.php') ?>
            <h2>Order</h2>
            <main>
                <form action="/admin/search_order_id" method="POST" class="mb-3">
                    <input id="search-input" type="text" name="search" placeholder="Search Order ID">
                    <button type="submit"><img src="../../../assets/images/search.svg"></button>
                </form>
                <div class="d-flex gap-4">
                    <ul id="categories">
                        <h5>Categories</h5>
                        <li>
                            <a href="/admin/all_orders_categorized/">
                                <img src="../../../assets/images/all_orders_icon.svg">
                                <p>All Order</p>                                
                            </a>
                        </li>
                        <li id="pending">
                            <a href="/admin/all_orders_categorized/pending">
                                <img src="../../../assets/images/pending_icon.svg">
                                <p>Pending</p>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/all_orders_categorized/on_process">
                                <img src="../../../assets/images/on_process_icon.svg">
                                <p>On-Process</p>
                            </a>
                        </li>
                        <li >
                            <a href="/admin/all_orders_categorized/shipped">
                                <img src="../../../assets/images/shipped_icon.svg">
                                <p>Shipped</p>
                            </a>
                        </li>
                        <li id="delivered">
                            <a href="/admin/all_orders_categorized/delivered">
                                <img src="../../../assets/images/delivered_icon.svg">
                                <p>Delivered</p>
                            </a>
                        </li>
                    </ul>
                    <section id="all-orders">
                        <h5>All Orders (36)</h5>
                        <table>                     
                            <thead> 
                                <tr>
                                    <th>Order ID #</th>
                                    <th>Order Date</th>
                                    <th class="receiver">Receiver</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
    foreach($orders as $order){
?>
                                <tr>
                                    <td class="order-id" ><?=  $order['id'] ?></td>
                                    <td><?=  $order['order_date'] ?></td>
                                    <td class="receiver">
                                        <p class="highlight"><?=  $order['receiver_name'] ?></p>
                                        <p><?=  $order['full_address'] ?></p>
                                    </td>
                                    <td class="highlight"><?=  $order['total_amount'] ?></td>
                                    <td>
                                        <form action="/admin/order_update/<?=  $order['id'] ?>" method="POST">
                                            <select class="select-status" class="highlight" name="status">
                                                <option <?= ($order['status'] == 'pending')?'selected':'' ?> value="pending" >Pending</option>
                                                <option <?= ($order['status'] == 'on_process')?'selected':'' ?> value="on_process" >On-Process</option>
                                                <option <?= ($order['status'] == 'shipped')?'selected':'' ?> value="shipped" >Shipped</option>
                                                <option <?= ($order['status'] == 'delivered')?'selected':'' ?> value="delivered" >Delivered</option>
                                            </select>                                            
                                        </form>
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
    </body>
</html>