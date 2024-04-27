<?php

include '../../include/connection.php';

$uid = $_REQUEST['uid'];
$pid = $_REQUEST['pid'];

$exists = $link->rawQuery("select * from cart where user_id=? and product_id=?",array($uid, $pid));


if($exists)
{
    echo "exists";
}
else
{

    $product = $link->rawQueryOne("select * from product where product_id=?",array($pid));
    $price = $product['product_price'];

    $data = array(
        "user_id" => $uid,
        "product_id" => $pid,
        "total" => $price
    );

    $sql_insert = $link->insert('cart', $data);

    if ($sql_insert) {
        echo "success";
    } else {
        echo "fail";
    }
}

?>
