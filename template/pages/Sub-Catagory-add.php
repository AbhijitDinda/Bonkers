<?php include './include/head.php'; ?>
<?php include './include/sidebar.php'; ?>
<?php include './include/header.php'; ?>
<?php include '../pages/include/connection.php'; ?>



<body>
	<div class="main-wrapper">
		<!-- partial -->

		<div class="page-wrapper">


			<!-- partial -->

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page">Sub-Category</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">


								<form method="POST" action="../process/sub-category-add.php" class="forms-sample">



								<div>
									<label class="form-label">Category</label>
									<select class="form-select form-select-lg" name="id">
										<option value="#">Select Category</option>

										<?php
										$sql2="SELECT * FROM category";
										$result2=mysqli_query($con,$sql2);
										while($fatch2=mysqli_fetch_assoc($result2)){
											?>
											<option value="<?php echo $fatch2['id']?>"><?php echo $fatch2['category_name']?></option>
										
										<?php
										}
										?>

									</select>
								</div>
								
								
								<br>
									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">SUB-CATEGORY</label>
										<input type="text" class="form-control" placeholder="Sub-Category" name="Category">
									</div>
									<button type="submit" class="btn btn-primary me-2" name="ADD">ADD</button>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>