<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$product_id = $_GET['product_id'];
$product_data = $link->rawQueryOne("select * from product where product_id=?", array($product_id));

// Define country and city array
        $cat_data = $link->rawQuery("select * from categories");
     
        $cat_arr = array();
    // Display city dropdown based on country name
    if($cat_data)
    {
        foreach($cat_data as $data){

            if($product_data['category_id'] == $data['cat_id'])
            {
                echo '<option value="'. $data['cat_id'].'" selected>'.$data['cat_name'].'</option>';
            }
            else
            {
                echo '<option value="'. $data['cat_id'].'">'.$data['cat_name'].'</option>';
            }
            
        } 
    }
    else
    {
        echo "<option value='' disabled>Categories not available</option>";
    }
?>