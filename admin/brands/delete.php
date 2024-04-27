<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$brand_id = $_REQUEST['brand_id'];

$sql = $link->rawQueryOne("select * from brands where brand_id=?",array($brand_id));

	$img_unlink = $sql['brand_img'];

	unlink($img_unlink);

	$link->where("brand_id",$brand_id);
	$sql_remove = $link->delete("brands");

	if($sql_remove)
	{
		echo "success";
	}
	else
	{
		echo "Error";
	}


?>