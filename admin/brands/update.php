<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$brand_id = $_REQUEST['brand_id'];
$brand_name = $_POST['brand_name'];
$brand_img = $_FILES['brand_image']['name'];
$category_id = $_REQUEST['category'];
		
		if($brand_img != NULL)
		{
			$sql = $link->rawQueryOne("select * from brands where brand_id=?",array($brand_id));

			$img_unlink = $sql['brand_img'];

			unlink($img_unlink);
			
			
			//Image Upload code start
			
			$ext = pathinfo($brand_img,PATHINFO_EXTENSION);
			$uimage = "images/".time() .$brand_id.'.'.$ext;		
	
		
			if(move_uploaded_file($_FILES['brand_image']['tmp_name'], $uimage))
			{
				
				$link->where('brand_id',$brand_id);
				$sql_update=$link->update("brands",array("brand_name"=>$brand_name, "brand_img"=>$uimage));

				
				if($sql_update)
				{
					echo "success";
				}	
			}
			//Image Upload code End
		}
		else
		{
			$link->where("brand_id",$brand_id);
			$sql_update_name = $link->update("brands",array("brand_name"=>$brand_name, "category_id"=>$category_id));

				if($sql_update_name)
				{
					echo "success";
				}
		}



?>