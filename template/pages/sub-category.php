<?php include './include/head.php'; ?>
<?php include './include/sidebar.php'; ?>
<?php include './include/header.php'; ?>

<?php
include '../pages/include/connection.php';
$query="SELECT category.category_name, subcategory.sub_cat_name,subcategory.id  FROM category INNER JOIN subcategory ON category.id = subcategory.category_id;";


$result=mysqli_query($con,$query);

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
								<a href="Sub-Catagory-add.php"><button style="float: right" type="button" class="btn btn-primary">ADD SUB-CATEGORY</button></a>
								<h6 class="card-title">Category</h6>

								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>id</th>
                                                <td>category Name</>
												<th>Sub-Categories Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											

											<?php
											$i=1;
											while($rows=mysqli_fetch_assoc($result)) 
												//foreach($result as $rows)
												
											{
											?>

											<tr>												
												<th><?= $i;?></th>
                                                <td><?php echo $rows['category_name'];?></td>
                                                
												<td><?php echo $rows['sub_cat_name'];?></td>
												<td style="display:flex">
                                                	<a href="sub-category-edit.php?id=<?php echo $rows['id']?>"><button type="SUBMIT" name="SUB-EDIT" class="btn btn-secondary">Edit</button></a>
												
													
													<br>

													<form method="post" action="../process/sub-category-add.php">
													<input type="hidden" name="id" value="<?= $rows['id']?>">
													<button type="SUBMIT" class="btn btn-danger" name="SUB-DELETE">Delete</button>
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
			</div>
		</div>

	</div>
</body>
