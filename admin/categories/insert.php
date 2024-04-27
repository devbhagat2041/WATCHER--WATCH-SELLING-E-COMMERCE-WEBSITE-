<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$category_name = $_POST['category_name'];
$cat_img = $_FILES['category_image']['name'];

$uploaddir = 'images/';
$uploadfile = $uploaddir . time() . basename($_FILES['category_image']['name']);

if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadfile)) {
   
    $data = Array ("cat_name" => $category_name,
               "cat_img" => $uploadfile
    );
    $sql_insert = $link->insert('categories', $data);

    if($sql_insert)
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }

} else {
    echo "fail";
}



?>