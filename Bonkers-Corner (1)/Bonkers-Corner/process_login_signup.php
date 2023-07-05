<?php
include './connection.php';

// print_r($_POST); die;


if (isset($_POST['register']))
{
	$user_name=$_POST['username_reg'];
    $user_psw=$_POST['psw_reg'];
    $hashed_password = md5($user_psw);
	
	
	$category_query="INSERT INTO user (username,password) VALUES ('$user_name','$hashed_password')";
	
	$cate_query_run=mysqli_query($con,$category_query);
	if($cate_query_run)
	{
        $last_id = mysqli_insert_id($con);
        // print($last_id);die;
        
    session_start();
		$_SESSION['id']=$last_id;

    
		header("location:./home.php");
	}
	else
	{
		$_SESSION['id']="Failed";

    echo "<script>alert('incoorect password and UserName')</script>";
		header("location:./login.php");

	}
}






if (isset($_POST['login']))
{
  $password =$_POST['pws_log'];
  $decrypt_psw =md5($password);
  $query="SELECT id AS traffic_id FROM `user` WHERE `username`='$_POST[username_log]' AND `password`='$decrypt_psw'";
  
  
  $result=mysqli_query($con,$query);
  
//   print_r($result); die;
  if(mysqli_num_rows($result)==1)
  {
    $data =  mysqli_fetch_assoc($result);
    $id = $data['traffic_id'];

    session_start();
    $_SESSION['id']=$id;
   
    header("Location: ./home.php");
  }
  else
  {
    echo "<script>alert('incoorect password')</script>";
    header('Location: ./login.php');
  }
}


?>
