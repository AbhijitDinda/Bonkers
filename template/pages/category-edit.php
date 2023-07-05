<?php include './include/head.php'; ?>
<?php include './include/sidebar.php'; ?>
<?php include './include/header.php'; ?> 
<?php include './include/connection.php'; ?> 



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

                                <?php
                                 if (isset($_GET['id']))
                                 {
                                    $category_id =$_GET['id'];
                                    $category_edit ="SELECT * FROM category WHERE id='$category_id' LIMIT 1 ";
                                    $category_run=mysqli_query($con,$category_edit);

                                    if(mysqli_num_rows($category_run)>0)
                                    {
                                        $row= mysqli_fetch_array($category_run);
                                        

                                        ?>
                                        <form method="POST" action="../process/category-submit.php" class="forms-sample">
                                            <div class="mb-3">
                                                <label for="exampleInputUsername1" class="form-label">CATEGORY EDIT</label>
                                                <input type="text" class="form-control" placeholder="Category edit" value="<?= $row['category_name']?>" name="Category">
                                                <input type="hidden" name="id" value="<?= $row['id']?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary me-2" name="EDIT">EDIT</button>
                                        </form>

                                        <?php

                                    }
                                    else
                                    {
                                        ?>
                                        <h4> NO RECORDS FOUND</h4>
                                        <?php

                                    }

                                 }
                                ?> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>