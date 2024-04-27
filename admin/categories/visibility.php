<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$category_id = $_REQUEST['c_id'];

$sql_cat_data = $link->rawQueryOne("select * from categories where cat_id=?", array($category_id));

if($sql_cat_data['is_active'] == 1)
{
    $link->where("cat_id", $category_id);
    $sql_status_update = $link->update("categories", array("is_active"=>0));

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
    $link->where("cat_id", $category_id);
    $sql_status_update = $link->update("categories", array("is_active"=>1));

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