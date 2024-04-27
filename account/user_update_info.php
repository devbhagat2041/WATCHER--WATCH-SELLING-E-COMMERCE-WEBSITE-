<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['email'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$user_id = $_REQUEST['user_id'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$phone = $_REQUEST['phone'];
$dob = $_REQUEST['dob'];
$address = $_REQUEST['address'];
$state = $_REQUEST['state'];
$city = $_REQUEST['city'];
$pincode = $_REQUEST['pincode'];


$link->where("user_id",$user_id);
$sql_update_info = $link->update("users",array("fname"=>$fname, "lname"=>$lname, "contact"=>$phone, "dob"=>$dob,
                                 "address"=>$address, "state"=>$state, "city"=>$city, "pincode"=>$pincode));

if($sql_update_info)
{
	echo "success";
}
else
{
    echo "fail";
}


?>