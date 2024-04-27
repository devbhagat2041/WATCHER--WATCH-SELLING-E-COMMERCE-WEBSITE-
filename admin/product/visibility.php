<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$product_id = $_REQUEST['p_id'];

$sql_product_data = $link->rawQueryOne("select * from product where product_id=?", array($product_id));

if($sql_product_data['is_active'] == 1)
{
    $link->where("product_id", $product_id);
    $sql_status_update = $link->update("product", array("is_active"=>0));

    if($sql_status_update)
    {
        echo "disabled";
    }
    else
    {                    
        echo "fail";
    }
}
else
{
    $link->where("product_id", $product_id);
    $sql_status_update = $link->update("product", array("is_active"=>1));

    if($sql_status_update)
    {
        echo "activated";
    }
    else
    {
        echo "fail";
    }
}

?>