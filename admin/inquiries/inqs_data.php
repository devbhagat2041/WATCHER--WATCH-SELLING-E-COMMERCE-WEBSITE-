<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$columns = array( 
// datatable column index  => database column name
    0 => 'inq_id',
    1 => 'name',
    2 => 'email',
    3 => 'contact',
    4 => 'message',
);

$sql_catdata = $link->get('inquiries');

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