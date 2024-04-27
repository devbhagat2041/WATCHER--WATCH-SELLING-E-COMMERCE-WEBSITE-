<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$product_id = $_REQUEST['product_id'];

$sql = $link->rawQueryOne("select * from product where product_id=?",array($product_id));

	$img_unlink = $sql['product_img'];

	unlink($img_unlink);

	$link->where("product_id",$product_id);
	$sql_remove = $link->delete("product");

	if($sql_remove)
	{
		echo "success";
	}
	else
	{
		echo "Error";
	}


?>