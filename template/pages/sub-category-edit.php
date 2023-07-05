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
                                if (isset($_GET['id'])) {
                                    $category_id = $_GET['id'];
                                    $category_edit = "SELECT * FROM subcategory WHERE id='$category_id' LIMIT 1 ";
                                    $category_run = mysqli_query($con, $category_edit);

                                    if (mysqli_num_rows($category_run) > 0) {
                                        $row = mysqli_fetch_array($category_run);
                                    


                                ?>
                                        <form method="POST" action="../process/sub-category-add.php" class="forms-sample">
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <select class="form-select form-select-lg" name="category_id">
                                                    <option value="#">Select Category</option>

                                                    <?php
                                                    $sql2 = "SELECT * FROM category";
                                                    $result2 = mysqli_query($con, $sql2);
                                                    while ($fatch2 = mysqli_fetch_assoc($result2)) {
                                                    ?>
                                                        <option value="<?php echo $fatch2['id'] ?>"
                                                         <?php if($row['category_id'] == $fatch2['id']) echo 'selected'; ?>>
                                                         <?php echo $fatch2['category_name'] ?></option>
                                                    

                                                    <?php
                                                    }


                                                    ?>


                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputUsername1" class="form-label">SUB-CATEGORY EDIT</label>
                                                <input type="text" class="form-control" placeholder="Category edit" value="<?= $row['sub_cat_name'] ?>" name="sub-category">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary me-2" name="SUB-EDIT">EDIT</button>
                                        </form>

                                    <?php

                                    } else {
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