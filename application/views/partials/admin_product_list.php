<?php
    // $maxitems = 8;
    // $start = ($start_index-1) * $maxitems ;
    // $end = $start + $maxitems ;
    // if($end > count($products)){
    //     $end = count($products);
    // }
    for($i = 0; $i < count($products); $i++){
    // foreach($products as $product){
        $main_index = $products[$i]['images']['main_img'];
?>
                                <tr>
                                    <td class="image d-flex align-items-center gap-3 highlight"><img src="../../../assets/uploads/<?= $products[$i]['images']['img'][$main_index] ?>"><?= $products[$i]['name'] ?></td>
                                    <td><?= $products[$i]['id'] ?></td>
                                    <td class="highlight"><?= $products[$i]['price'] ?></td>
                                    <td><?= $products[$i]['category'] ?></td>
                                    <td><?= $products[$i]['stocks'] ?></td>
                                    <td>0</td>
                                    <td>
                                        <a class="edit btn btn-outline-primary" href="/admin/fetch_one_product/<?= $products[$i]['id'] ?>">Edit</a>
                                        <a href="/admin/delete_product/<?= $products[$i]['id'] ?>" class="delete"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cad"/></svg></a>
                                    </td>
                                </tr>
<?php
        }
?>