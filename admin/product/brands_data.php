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
        $brand_data = $link->rawQuery("select * from brands");
     
        $brand_arr = array();
    // Display city dropdown based on country name
    if($brand_data)
    {
        foreach($brand_data as $data){

            if($product_data['brand_id'] == $data['brand_id'])
            {
                echo '<option value="'. $data['brand_id'].'" selected>'.$data['brand_name'].'</option>';
            }
            else
            {
                echo '<option value="'. $data['brand_id'].'">'.$data['brand_name'].'</option>';
            }
            
        } 
    }
    else
    {
        echo "<option value='' disabled>Brands not available</option>";
    }
?>