<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$category_id = $_REQUEST['cat_id'];

$sql = $link->rawQueryOne("select * from categories where cat_id=?",array($category_id));

	$img_unlink = $sql['cat_img'];

	unlink($img_unlink);

	$link->where("cat_id",$category_id);
	$sql_remove = $link->delete("categories");

	if($sql_remove)
	{
		echo "success";
	}
	else
	{
		echo "Error";
	}


?>