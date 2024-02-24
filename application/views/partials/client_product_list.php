                        <h4>All Products(<?= count($products) ?>)</h4>
<?php
    foreach($products as $product){
        $main_index = $product['images']['main_img'];
?>
                        <li>
                            <a href="/products/item/<?= $product['id'] ?>">
                                <img src="../../assets/uploads/<?= $product['images']['img'][$main_index] ?>">
                                <div>
                                    <p><?= $product['name'] ?><p>
                                    <section>
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_empty.png">
                                        <p>36 Rating</p>
                                    </section>
                                    <span class="text-primary fw-semibold">
                                    <?= $product['price'] ?>
                                    </span>
                                </div>
                            </a>
                        </li>
<?php
    }
?>