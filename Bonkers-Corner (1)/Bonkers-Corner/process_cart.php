<?php
include './connection.php';




if (isset($_POST['register']))
{
	$user_name=$_POST['username_reg'];
    $user_psw=$_POST['psw_reg'];
	
	
	$category_query="INSERT INTO user (username,password) VALUES ('$user_name','$user_psw')";
	
	

	$cate_query_run=mysqli_query($con,$category_query);
	if($cate_query_run)
	{
        $last_id = mysqli_insert_id($con);
        

		$_SESSION['status']="successful insert";
		header("location:./home.php");
	}
	else
	{
		$_SESSION['status']="Failed";
		header("location:./login.php");

	}
}
?>