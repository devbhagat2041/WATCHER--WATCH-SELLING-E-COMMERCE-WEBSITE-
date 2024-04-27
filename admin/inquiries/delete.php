<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$inq_id = $_REQUEST['inq_id'];



	$link->where("inq_id",$inq_id);
	$sql_remove = $link->delete("inquiries");

	if($sql_remove)
	{
		echo "success";
	}
	else
	{
		echo "Error";
	}

?>