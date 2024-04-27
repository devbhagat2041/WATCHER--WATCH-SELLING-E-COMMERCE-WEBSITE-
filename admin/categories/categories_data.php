<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$columns = array( 
// datatable column index  => database column name
    0 => 'cat_id',
    1 => 'cat_name',
    2 => 'cat_img',
    3 => 'is_active'
);

$sql_catdata = $link->get('categories');

$data = array();

foreach($sql_catdata as $record)
{
    $data[] = $record;
}

$results = array(
	"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
  "aaData"=>$data
);

echo json_encode($results);

?>