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