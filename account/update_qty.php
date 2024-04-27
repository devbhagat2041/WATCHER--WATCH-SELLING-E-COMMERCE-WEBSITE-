<?php

include '../include/connection.php';

$uid = $_REQUEST['uid'];
$pid = $_REQUEST['pid'];
$qty = $_REQUEST['qty'];

$product = $link->rawQueryOne("select * from product where product_id=?", array($pid));

$price = $product['product_price'];

$total = $price * $qty;

$link->where('user_id',$uid);
$link->where('product_id',$pid);
$upd = $link->update('cart',array('qty'=>$qty, 'total'=>$total));
    

    if ($upd) {
        echo "success";
    } else {
        echo "fail";
    }


?>
