<?php
 require '../pages/include/connection.php';
 $output = '';
 $sql="SELECT * FROM subcategory WHERE category_id='".$_POST['categoryID']."' ORDER BY sub_cat_name ";
 $result=mysqli_query($con,$sql);
 $output .= '<option value="" disabled selected > Select Sub-category </option>';
 while($row=mysqli_fetch_array($result)){
    $output .= '<option value="'.$row["id"].'">'.$row["sub_cat_name"].'</option>';
 }

 echo $output;


?>