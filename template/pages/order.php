<?php 
include './include/head.php';
 include './include/sidebar.php';
 include './include/header.php'; 
 include '../pages/include/connection.php';

$query="SELECT * FROM payment";
$result=mysqli_query($con,$query);

?>
<body>
	<div class="main-wrapper">
		<!-- partial -->

		<div class="page-wrapper">


			<!-- partial -->

			<div class="page-content">





				



				<div class="row">

					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<!-- <a href="./Add-Category.php"><button style="float: right" type="button" class="btn btn-primary">ADD CATEGORY</button></a> -->
								<h6 class="card-title">Order</h6>

								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>id</th>
												<th>User_id</th>
                                                <th>Benificery_name</th>
												<th>Ammount</th>
                                                <th>payment_status</th>
                                                <th>Time</th>
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
												<td><?php echo $rows['user_id'];?></td>
												<td><?php echo $rows['benificery_name'];?></td>
												<td><?php echo $rows['ammount'];?></td>
												<td><?php echo $rows['payment_status'];?></td>
												<td><?php echo $rows['created_on'];?></td>
												


                                        








												<td style="display:flex">
													<a href="#"><button type="button" name="EDIT" class="btn btn-secondary">Edit</button></a>
													<br>
													<form method="post" action="#">
													<input type="hidden" name="id" value="<?= $rows['id']?>">
													<button type="SUBMIT" class="btn btn-danger" name="DELETE">Delete</button>
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


