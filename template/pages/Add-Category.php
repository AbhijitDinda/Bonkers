<?php include './include/head.php'; ?>
<?php include './include/sidebar.php'; ?>
<?php include './include/header.php'; ?>



<body>
	<div class="main-wrapper">
		<!-- partial -->

		<div class="page-wrapper">


			<!-- partial -->

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page">Category</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">


								<form method="POST" action="../process/category-submit.php" class="forms-sample">
									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">CATEGORY</label>
										<input type="text" class="form-control" placeholder="Category" name="Category">
										
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