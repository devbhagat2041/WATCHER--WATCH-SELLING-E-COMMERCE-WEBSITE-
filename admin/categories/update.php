<?php

session_start();

if(!isset($_SESSION['email']) && $_SESSION['password'] == null)
{
    header("location:../index.php");
}

include '../include/connection.php';

$category_id = $_REQUEST['cat_id'];
$category_name = $_POST['category_name'];
$cat_img = $_FILES['category_image']['name'];
		
		if($cat_img != NULL)
		{
			$sql = $link->rawQueryOne("select * from categories where cat_id=?",array($category_id));

			$img_unlink = $sql['cat_img'];

			unlink($img_unlink);
			
			
			//Image Upload code start
			
			$ext = pathinfo($cat_img,PATHINFO_EXTENSION);
			$uimage = "images/".time() .$category_id.'.'.$ext;		
	
		
			if(move_uploaded_file($_FILES['category_image']['tmp_name'], $uimage))
			{
				
				$link->where('cat_id',$category_id);
				$sql_update=$link->update("categories",array("cat_name"=>$category_name, "cat_img"=>$uimage));

				
				if($sql_update)
				{
					echo "success";
				}	
			}
			//Image Upload code End
		}
		else
		{
			$link->where("cat_id",$category_id);
			$sql_update_name = $link->update("categories",array("cat_name"=>$category_name));

				if($sql_update_name)
				{
					echo "success";
				}
		}



?>