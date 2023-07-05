<?php include './include/head.php'; ?>
<?php include './include/sidebar.php'; ?>
<?php include './include/header.php'; ?>

<?php
include '../pages/include/connection.php';

$query = "SELECT product.product_name,product.product_des, product.id as product_id, product.image,category.category_name,subcategory.sub_cat_name,subcategory.id as sub_category_id FROM product INNER JOIN category ON category.id=product.category_id INNER JOIN subcategory ON subcategory.id = product.sub_category_id";






// print $query; die;

$result = mysqli_query($con, $query);

// print $result->num_rows; die;

?>



<body>
	<div class="main-wrapper">
		<!-- partial -->

		<div class="page-wrapper">


			<!-- partial -->

			<div class="page-content">





				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page">Category Table</li>
					</ol>
				</nav>



				<div class="row">

					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<a href="Product-add.php"><button style="float: right" type="button" class="btn btn-primary">ADD PRODUCT</button></a>
								<h6 class="card-title">Product</h6>

								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>id</th>
												<th>Categorey_Name</th>
												<th>Subcategorey_Name</th>
												<td>Product Name</>
												<th>Product Image</th>
												<th>Product Description</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>


											<?php
											$i = 1;
											// while($rows=mysqli_fetch_assoc($result)) 
											foreach ($result as $rows)

											

											{

												// print '<pre>';
												// print_r($rows); die;

												$img = explode(",", "$rows[image]");
												
											?>

												<tr>
													<th><?= $i; ?></th>
													<td><?php echo $rows['category_name']; ?></td>
													<td><?php echo $rows['sub_cat_name']; ?></td>
													<td><?php echo $rows['product_name']; ?></td>
													<td><img src="../process/img/<?php echo $img[0] ?>"></td>
													<td><?php echo $rows['product_des']; ?></td>
													





													<td>
														<a href="product-edit.php?id=<?php echo $rows['product_id'] ?>"><button type="SUBMIT" name="PRODUCT-EDIT" class="btn btn-secondary">Edit</button></a>


														<br>

														<form method="post" action="../process/product-add.php">
															<input type="hidden" name="id" value="<?= $rows['product_id'] ?>">
															<button type="SUBMIT" class="btn btn-danger" name="PRODUCT-DELETE">Delete</button>
														</form>



													</td>
												</tr>

											<?php
												$i++;
											}
											?>


										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>2
		</div>

	</div>
	<?php include './include/footer.php'; ?>
</body>