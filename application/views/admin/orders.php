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
    </head>
    <body class="d-flex">
        <?php $this->load->view('admin/widgets/aside.php') ?>
        <div>
            <?php $this->load->view('admin/widgets/header.php') ?>
            <h2>Order</h2>
            <main>
                <form action="#" method="POST" class="mb-3">
                    <input type="text" name="search" placeholder="Search Orders">
                    <button type="submit"><img src="../../../assets/images/search.svg"></button>
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
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id" >123</td>
                                    <td>09-06-2022</td>
                                    <td class="receiver">
                                        <p class="highlight">Charlene Flora</p>
                                        <p>123 Dojo, Bieleve Samle Place</p>
                                    </td>
                                    <td class="highlight">$10</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <select class="highlight">
                                                <option>Pending</option>
                                                <option>On-Process</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>                        
                    </section>
                </div>
            </main>
        </div>
    </body>
</html>