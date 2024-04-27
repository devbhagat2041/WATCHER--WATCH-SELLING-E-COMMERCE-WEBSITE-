<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
    header("location:../index.php");
}

include '../include/connection.php';

$sql_product_data = $link->get('product');

if($sql_product_data)
{

foreach ($sql_product_data as $record) {
    $cat_data = $link->rawQueryOne("select * from categories where cat_id=?", array($record['category_id']));

    if ($cat_data) {
        $cat_name = $cat_data['cat_name'];
    } else {
        $cat_name = "N/A";
    }

    $brand_data = $link->rawQueryOne("select * from brands where brand_id=?", array($record['brand_id']));

    if ($brand_data) {
        $brand_name = $brand_data['brand_name'];
    } else {
        $brand_name = "N/A";
    }

    $data[] = array(
        "product_id" => $record['product_id'],
        "product_name" => $record['product_name'],
        "product_description" => $record['product_description'],
        "product_img" => $record['product_img'],
        "product_price" => $record['product_price'],
        "category_id" => $record['category_id'],
        "brand_id" => $record['brand_id'],
        "is_active" => $record['is_active'],
        "cat_name" => $cat_name,
        "brand_name" => $brand_name
    );
}
}
else
{
    $data[] = array(
        "product_id" => 'N/A',
        "product_name" => 'N/A',
        "product_description" => 'N/A',
        "product_img" => 'N/A',
        "product_price" => 'N/A',
        "category_id" =>'N/A',
        "brand_id" => 'N/A',
        "is_active" => 'N/A',
        "cat_name" => 'N/A',
        "brand_name" => 'N/A'
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
