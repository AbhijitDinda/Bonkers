<?php
// print_r($_POST); die;


include '../pages/include/connection.php';

if (isset($_POST['signin']))
{
  $query="SELECT user_id FROM `admin details` WHERE `username`='$_POST[userName]' AND `password`='$_POST[passWord]'";

  //print $query; die;
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)==1)
  {
    $data =  mysqli_fetch_assoc($result);
    // print_r($data); die;
    session_start();
    $_SESSION['userId']=$data['user_id'];
    header("Location: ../pages/basic-elements.php");
  }
  else
  {
    echo "<script>alert('incoorect password')</script>";
    header('Location: ../pages/login.php');
  }
}
?>