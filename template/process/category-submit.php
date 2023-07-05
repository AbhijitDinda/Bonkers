<?php
include '../pages/include/connection.php';
include 'slug_function.php';

// print_r($_POST); die;


if(isset($_POST['EDIT']))
{	
	$category_id=$_POST['id'];
	$slug=slug($_POST['Category']);
	$category_name=$_POST['Category'];
	$query="UPDATE category SET category_name='$category_name',slug='$slug' WHERE id='$category_id'";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		
		header("location:../pages/Catagory.php");
	}
	else
	{
		echo"failed";

	}
	
}


if(isset($_POST['DELETE']))
{	
	$category_id=$_POST['id'];
	$query="DELETE FROM category WHERE id='$category_id'";
	$query_run=mysqli_query($con,$query);

	
	
	if($query_run)
	{
		
		header("location:../pages/Catagory.php");
	}
	else
	{
		echo"failed";
		

	}
	
	
}










if (isset($_POST['ADD']))
{
	$category_name=$_POST['Category'];
	// print($category_name); die;
	$slug=slug($_POST['Category']);
	$category_query="INSERT INTO category (category_name,slug) VALUES ('$category_name','$slug')";
	
	

	$cate_query_run=mysqli_query($con,$category_query);
	if($cate_query_run)
	{
		$_SESSION['status']="successful insert";
		header("location:../pages/Catagory.php");
	}
	else
	{
		$_SESSION['status']="Failed";
		header("location:../pages/Add-Category.php");

	}
}


?>