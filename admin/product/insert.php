<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
    header("location:../index.php");
}

include '../include/connection.php';


$product_name = $_REQUEST['product_name'];
$product_img = $_FILES['product_image']['name'];
$product_description = $_REQUEST['product_description'];
$product_price = $_REQUEST['product_price'];
$category_id = $_REQUEST['category'];
$brand_id = $_REQUEST['brand'];

$uploaddir = 'images/';
$uploadfile = $uploaddir . time() . basename($_FILES['product_image']['name']);

if (move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadfile)) {

    $data = array(
        "product_name" => $product_name,
        "product_img" => $uploadfile, 
        "product_description" => $product_description,
        "product_price" => $product_price, 
        "category_id" => $category_id,
        "brand_id" => $brand_id
    );
    $sql_insert = $link->insert('product', $data);

    if ($sql_insert) {
        echo "success";
    } else {
        echo "fail";
    }
} else {
    echo "fail";
}
