<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
    header("location:../index.php");
}

include '../include/connection.php';


$brand_name = $_REQUEST['brand_name'];
$brand_img = $_FILES['brand_image']['name'];
$category_id = $_REQUEST['category'];

$uploaddir = 'images/';
$uploadfile = $uploaddir . time() . basename($_FILES['brand_image']['name']);

if (move_uploaded_file($_FILES['brand_image']['tmp_name'], $uploadfile)) {

    $data = array(
        "brand_name" => $brand_name,
        "brand_img" => $uploadfile, 
        "category_id" => $category_id
    );
    $sql_insert = $link->insert('brands', $data);

    if ($sql_insert) {
        echo "success";
    } else {
        echo "fail";
    }
} else {
    echo "fail";
}
