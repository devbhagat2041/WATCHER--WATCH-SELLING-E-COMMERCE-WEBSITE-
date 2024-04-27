<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$brand_id = $_REQUEST['b_id'];

$sql_brand_data = $link->rawQueryOne("select * from brands where brand_id=?", array($brand_id));

if($sql_brand_data['is_active'] == 1)
{
    $link->where("brand_id", $brand_id);
    $sql_status_update = $link->update("brands", array("is_active"=>0));

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
    $link->where("brand_id", $brand_id);
    $sql_status_update = $link->update("brands", array("is_active"=>1));

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