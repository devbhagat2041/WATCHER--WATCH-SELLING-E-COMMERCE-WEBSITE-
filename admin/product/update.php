<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$product_id = $_REQUEST['product_id'];
$product_name = $_REQUEST['product_name'];
$product_img = $_FILES['product_image']['name'];
$product_description = $_REQUEST['product_description'];
$product_price = $_REQUEST['product_price'];
$category_id = $_REQUEST['category'];
$brand_id = $_REQUEST['brand'];

		
		if($product_img != NULL)
		{
			$sql = $link->rawQueryOne("select * from product where product_id=?",array($product_id));

			$img_unlink = $sql['product_img'];

			unlink($img_unlink);
			
			
			//Image Upload code start
			
			$ext = pathinfo($product_img,PATHINFO_EXTENSION);
			$uimage = "images/".time() .$product_id.'.'.$ext;		
	
		
			if(move_uploaded_file($_FILES['product_image']['tmp_name'], $uimage))
			{
				
				$link->where('product_id',$product_id);
				$sql_update=$link->update("product",array("product_name"=>$product_name,"product_description"=>$product_description,"product_img"=>$uimage,"product_price"=>$product_price,"category_id"=>$category_id,"brand_id"=>$brand_id));

				
				if($sql_update)
				{
					echo "success";
				}	
			}
			//Image Upload code End
		}
		else
		{
			$link->where("product_id",$product_id);
			$sql_update_name = $link->update("product",array("product_name"=>$product_name,"product_description"=>$product_description,"product_price"=>$product_price,"category_id"=>$category_id,"brand_id"=>$brand_id));

				if($sql_update_name)
				{
					echo "success";
				}
		}



?>