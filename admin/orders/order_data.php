<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
    header("location:../index.php");
}

include '../include/connection.php';

$sql_order_data = $link->get('orders');

if($sql_order_data)
{

foreach ($sql_order_data as $record) {
    $user_data = $link->rawQueryOne("select * from users where user_id=?", array($record['user_id']));

    if ($user_data) {
        $user_name = $user_data['fname']." ".$user_data['lname'];
    } else {
        $user_name = "N/A";
    }

    $product_data = $link->rawQueryOne("select * from product where product_id=?", array($record['product_id']));

    if ($product_data) {
        $product_name = $product_data['product_name'];
    } else {
        $product_name = "N/A";
    }

    $data[] = array(
        "order_id" => $record['order_id'],
        "order_date" => $record['order_date'],
        "user_name" => $user_name,
        "product_name" => $product_data['product_name'],
        "product_price" => $product_data['product_price'],
        "qty" => $record['qty'],
        "total" => $record['total'],
        "payment_method" => $record['payment_method'],
        "contact" => $user_data['contact'],
        "email" => $user_data['email'],
        "address" => $user_data['address'],
        "status" => $record['status']
    );
}
}
else
{
    $data[] = array(
        "order_id" => 'N/A',
        "order_date" => 'N/A',
        "user_name" =>'N/A',
        "product_name" => 'N/A',
        "product_price" => 'N/A',
        "qty" => 'N/A',
        "total" => 'N/A',
        "payment_method" => 'N/A',
        "contact" => 'N/A',
        "email" => 'N/A',
        "address" => 'N/A',
        "status" => 'N/A'
    );
}


$results = array(
    "sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data
);

echo json_encode($results);
?>
