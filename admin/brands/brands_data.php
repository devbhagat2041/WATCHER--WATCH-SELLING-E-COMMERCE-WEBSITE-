<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$sql_brand_data = $link->get('brands');

$data = array();

foreach($sql_brand_data as $record)
{
    $cat_data = $link->rawQueryOne("select * from categories where cat_id=?",array($record['category_id']));

    if($cat_data)
    {
        $cat_name = $cat_data['cat_name'];
    }
    else
    {
        $cat_name = "N/A";
    }

    $data[] = array( 
        "brand_id"=>$record['brand_id'],
        "brand_name"=>$record['brand_name'],
        "brand_img"=>$record['brand_img'],
        "category_id"=>$record['category_id'],
        "is_active"=>$record['is_active'],
        "cat_name"=>$cat_name
     );

}


$results = array(
	"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
  "aaData"=>$data
);

echo json_encode($results);

?>