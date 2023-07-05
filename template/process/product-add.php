<?php
include '../pages/include/connection.php';
include 'slug_function.php';


if (isset($_POST['product_submit'])) {
    // 
    // print '<pre>';
    // print_r($_POST);
    // die;

    $slug = slug($_POST['product_name']);
    $p_name = $_POST['product_name'];
    $category_id = $_POST['id'];
    $sub_id = $_POST['sub-id'];
    $p_des = $_POST['product_des'];
    $p_weight = $_POST['product_weight'];
    $ori_price = $_POST['ori_price'];
    $cur_price = $_POST['cur_price'];
    $p_sku = $_POST['product_sku'];

    $checkbox = $_POST['myCheckbox'];
    //print_r($checkbox);die;
    $checkbox_name = implode(",", $checkbox);

    //print_r($checkbox_name);die;


    // if (isset($_POST['fobby'])) {
    //     $p_variant = $_POST['fooby'];
    // } else {
    //     $p_variant = '';
    // }

    $p_img = $_FILES["image"];
    $file_name = $_FILES["image"]["name"];
    $location = "./img/";
    $image_list = implode(",", $file_name);


    if (!empty($file_name)) {
        foreach ($file_name as $key => $val) {
            $targetPath = $location . $val;

            move_uploaded_file($_FILES["image"]['tmp_name'][$key], $targetPath);
        }


        // foreach($p_variant as $item){
        // if(isset($_POST['fobby'])) {
        //     $s1=implode(",",$p_variant);
        // } else {
        //     $s1 = '';
        // }

        $product_query = "INSERT INTO product 
        (product_name,category_id,sub_category_id,image,product_des,product_weight,ori_price,cur_price,sku,slug,varriant) VALUES 
        ('$p_name','$category_id','$sub_id','$image_list','$p_des','$p_weight','$ori_price','$cur_price','$p_sku','$slug','$checkbox_name')";
        //print $product_query; die;
        $product_query_run = mysqli_query($con, $product_query);


        // print($s1); die;




        if ($product_query_run) {
            header("location:../pages/Product.php");
            $_SESSION['status'] = "successful insert";
        } else {
            $_SESSION['status'] = "Failed";
        }
    }
}

if(isset($_POST["productsku"]))

{
    $p_sku = $_POST['productsku'];

    $query="SELECT * FROM product WHERE sku='$p_sku'";
    $result=mysqli_query($con,$query);
   // echo mysqli_num_rows($result);
   if(mysqli_num_rows($result)>0)
   {
    echo "<span style='color:red'>Product SKU exists</span>";
   }else{
    echo "<span style='color:green'>Product SKU Available</span>";

   }
    

}

if (isset($_POST['PRODUCT-UPDATE'])) {

    // print '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // die;

    $product_id = $_POST['id'];

    $slug = slug($_POST['product_name']);
    $p_name = $_POST['product_name'];
    $category_id = $_POST['IID'];
    $sub_id = $_POST['sub-id'];
    $p_des = $_POST['product_des'];
    $p_weight = $_POST['product_weight'];
    $ori_price = $_POST['ori_price'];
    $cur_price = $_POST['cur_price'];
    $p_sku = $_POST['product_sku'];
    if(isset($_POST['myCheckbox'])) {
        $checkbox = $_POST['myCheckbox'];
        $checkbox_name = implode(",", $checkbox);

    } else {
        $checkbox_name = '';
    }
    //print_r($checkbox);die;

    //print_r($checkbox_name);die;


    // if (isset($_POST['fobby'])) {
    //     $p_variant = $_POST['fooby'];
    // } else {
    //     $p_variant = '';
    // }

    

    $p_img = $_FILES["image"];
    $file_name = $_FILES["image"]["name"];

    // $count = count($file_name);

    $files = [];
    $i = 0;
    $location = "./img/";
    foreach($file_name as $file) {
        if($file == '') {
            array_push($files, $_POST['image_file'][$i]);
        } else {
            array_push($files, $file);
            $targetPath = $location . $file;

            move_uploaded_file($_FILES["image"]['tmp_name'][$i], $targetPath);
        }
        $i++;
    }

    // print '<pre>'; print_r($files); die;

    $image_list = implode(",", $files);
//print $image_list; die;






    $query = "UPDATE product SET product_name='$p_name',category_id='$category_id',sub_category_id='$sub_id',image='$image_list',product_des='$p_des',product_weight='$p_weight',ori_price='$ori_price',cur_price='$cur_price',sku='$p_sku',slug='$slug',varriant='$checkbox_name' WHERE id='$product_id'";
    //print_r($query);die;
    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        header("location:../pages/Product.php");
    } else {
        echo "failed";
    }
}

if(isset($_POST['PRODUCT-DELETE']))
{	
	$Product_id=$_POST['id'];
	$query="DELETE FROM product WHERE id='$Product_id'";
	$query_run=mysqli_query($con,$query);

	
	
	if($query_run)
	{
		
		header("location:../pages/Product.php");
	}
	else
	{
		echo"failed";
		

	}
	
	
}
