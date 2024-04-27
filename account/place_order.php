<?php

include '../include/connection.php';

$uid = $_REQUEST['uid'];
$payment = $_REQUEST['payment'];
$today = date('Y-m-d');

$cart_data = $link->rawQuery("select * from cart where user_id=?", array($uid));

if($cart_data != null)
{

    foreach ($cart_data as $data) {
        $product_id = $data['product_id'];
        $qty = $data['qty'];
        $total = $data['total'];

        $odata = array(
            "user_id" => $uid,
            "product_id" => $product_id,
            "qty" => $qty,
            "payment_method" => $payment,
            "total" => $total,
            "order_date" => $today
        );

        $sql_insert = $link->insert('orders', $odata);

        $link->where('cart_id', $data['cart_id']);
        $del = $link->delete('cart');
    }

    echo "success";

}
else 
{
    echo "fail";
}

?>
