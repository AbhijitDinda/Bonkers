<?php
include '../pages/include/connection.php';
include 'slug_function.php';

// print_r($_POST); die;



if (isset($_POST['ADD']))
{
	$category_name=$_POST['Category'];
	$slug=slug($_POST['Category']);
    $category_id=$_POST['id'];
	$category_query="INSERT INTO subcategory (sub_cat_name,slug,category_id) VALUES ('$category_name','$slug','$category_id')";
	
	

	$subcate_query_run=mysqli_query($con,$category_query);
	if($subcate_query_run)
	{
		$_SESSION['status']="successful insert";
		header("location:../pages/sub-category.php");
	}
	else
	{
		$_SESSION['status']="Failed";
		header("location:../pages/sub-category.php");

	}
}



if(isset($_POST['SUB-EDIT']))
{	
	$subcategory_id=$_POST['id'];
	$category_id=$_POST['category_id'];
	$slug=slug($_POST['sub-category']);

	
	$subcategory_name=$_POST['sub-category'];
	$query="UPDATE subcategory SET sub_cat_name='$subcategory_name',category_id='$category_id',slug='$slug' WHERE id='$subcategory_id'";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		
		header("location:../pages/sub-category.php");
	}
	else
	{
		echo"failed";

	}
	
}

if(isset($_POST['SUB-DELETE']))
{	
	$subcategory_id=$_POST['id'];
	$query="DELETE FROM subcategory WHERE id='$subcategory_id'";
	$query_run=mysqli_query($con,$query);

	
	
	if($query_run)
	{
		
		header("location:../pages/sub-category.php");
	}
	else
	{
		echo"failed";
		

	}
	
	
}
















?>