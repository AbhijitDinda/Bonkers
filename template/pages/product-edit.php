<?php include './include/head.php'; ?>
<?php include './include/sidebar.php'; ?>
<?php include './include/header.php'; ?>
<?php include './include/connection.php'; ?>





<body onload="myFunction()">
    <div class="main-wrapper">
        <!-- partial -->

        <div class="page-wrapper">


            <!-- partial -->

            <div class="page-content">

                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    // print_r($id);die;
                                    $fatch_data = "SELECT * FROM product WHERE Id='$id'";
                                    $fatch_data_query = mysqli_query($con, $fatch_data);
                                    //print_r($fatch_data);die;                                 
                                    if (mysqli_num_rows($fatch_data_query) > 0) {
                                        foreach ($fatch_data_query as $row) {

                                            $image = explode(",", $row['image']);
                                            $length = count($image);

                                            $size = $row['varriant'];
                                            $size_p = explode(",", $size);



                                ?>






                                            <form class="forms-sample" method="post" action="../process/product-add.php" enctype="multipart/form-data">


                                                <div class="mb-3">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" placeholder="product edit" value="<?= $row['product_name'] ?>" name="product_name">
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                </div>

                                                <div class="mb-3">

                                                    <label class="form-label">Category</label>
                                                    <select class="form-select form-select-lg" name="IID" id="id">
                                                        <option value="#">Select Category</option>

                                                        <?php
                                                        $sql3 = "SELECT * FROM category";
                                                        $result3 = mysqli_query($con, $sql3);
                                                        while ($fatch3 = mysqli_fetch_assoc($result3)) {
                                                        ?>

                                                            <option value="<?php echo $fatch3['id'] ?>" <?php if ($row['category_id'] == $fatch3['id']) echo 'selected'; ?>>
                                                                <?php echo $fatch3['category_name'] ?></option>

                                                        <?php
                                                        }
                                                        ?>



                                                    </select>

                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Sub-Category</label>
                                                    <select class="form-select form-select-lg" name="sub-id" id="sub-id">
                                                        <option value="#">Select Sub-Category</option>

                                                        <?php
                                                        $sql4 = "SELECT * FROM subcategory WHERE category_id = '{$row['category_id']}'";
                                                        $result4 = mysqli_query($con, $sql4);
                                                        while ($fatch4 = mysqli_fetch_assoc($result4)) {
                                                        ?>

                                                            <option value="<?php echo $fatch4['id'] ?>" <?php echo  'selected'; ?>>
                                                                <?php echo $fatch4['sub_cat_name'] ?>
                                                            </option>



                                                        <?php

                                                        }


                                                        ?>




                                                    </select>
                                                </div>


                                                <div id="new">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formFile">File upload</label>
                                                        <?php
                                                        for ($i = 0; $i < $length; $i++) {


                                                        ?>
                                                            <div>
                                                                <input class="form-control" value="<?php echo $image[$i] ?>" name="image[]" type="file" accept="image/*" id="formFile">
                                                                <img src="../process/img/<?php echo $image[$i] ?>" height="50px" width="50px">
                                                                <input type="hidden" name="image_file[]" value="<?php echo $image[$i] ?>"></h1>
                                                                <h1><?php echo $image[$i] ?></h1>

                                                                <?php
                                                                if ($i != 0) :
                                                                ?>

                                                                    <div class="ss" style=" text-align: right; padding-block: 5px;">
                                                                        <button type="submit" name="<?= $i ?>" class="btn btn-danger me-3">remove</button>
                                                                    </div>

                                                                <?php else : ?>
                                                                    <div class="ss" style=" text-align: right; padding-block: 5px;">
                                                                        <button type="submit" name="add" class="btn btn-primary me-2">Add</button>
                                                                    </div>

                                                                <?php

                                                                endif; ?>
                                                            </div>

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Product Description</label>
                                                    <input type="text" name="product_des" id="editor" value="<?= $row['product_des'] ?>"></input>
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">






                                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">Product Weight(In gm)</label>
                                    <input class="form-control" name="product_weight" value="<?= $row['product_weight'] ?>" data-inputmask="'alias': 'currency'" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">Original Price</label>
                                    <input type="number" class="form-control" name="ori_price" value="<?= $row['ori_price'] ?>" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">Discount percentage</label>
                                    <input type="number" class="form-control" name="dis_per" onchange="calc(this);" />
                                </div>
                            </div>



                            <div class="mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">Current Price</label>
                                    <input type="number" class="form-control" value="<?= $row['cur_price'] ?>" name="cur_price" />
                                </div>
                            </div>



                            <!-- VARRIANT -->
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label">Variation Avaiable:</label>
                                <input type="checkbox" id="myCheck" <?php echo "checked"; ?>>


                                <div id="text" onclick="myFunction()" style="display:none">

                                    <input type="checkbox" name="myCheckbox[]" value="XXL" <?php if (in_array('XXL', $size_p)) {
                                                                                                echo "checked";
                                                                                            } ?> />:XXL<br>
                                    <input type="checkbox" name="myCheckbox[]" value="XLM" <?php if (in_array('XLM', $size_p)) {
                                                                                                echo "checked";
                                                                                            } ?> />:XLM<br>
                                    <input type="checkbox" name="myCheckbox[]" value="XL" <?php if (in_array('XL', $size_p)) {
                                                                                                echo "checked";
                                                                                            } ?> />:XL<br>
                                    <input type="checkbox" name="myCheckbox[]" value="XS" <?php if (in_array('XS', $size_p)) {
                                                                                                echo "checked";
                                                                                            } ?> />:XS<br>
                                    <input type="checkbox" name="myCheckbox[]" value="XXS" <?php if (in_array('XXS', $size_p)) {
                                                                                                echo "checked";
                                                                                            } ?> />:XXS<br>
                                    <br>

                                </div>

                            </div>
                            <!-- SKU -->
                            <div class="mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">SKU</label>
                                    <input name="product_sku" id="product_sku" class="form-control" value="<?= $row['sku'] ?>" type="number" />
                                    <span id="avability"></span>
                                </div>

                            </div>
                            <!-- submit -->
                            <button type="submit" name="PRODUCT-UPDATE" id="PRODUCT-UPDATE" class="btn btn-primary">UPDATE Product</button>

                            </form>
                <?php
                                        }
                                    } else {
                                        echo "no record found";
                                    }
                                } else {
                                    echo "something went wrong";
                                }
                ?>

                        </div>
                    </div>
                </div>
            </div>


        </div>



    </div>
    </div>
    <?php include './include/footer.php'; ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src=".././assets/vendors/inputmask/jquery.inputmask.min.js"></script>
    <script src=".././assets/js/inputmask.js"></script>

    <script>
        $(document).ready(function() {
            $('#product_sku').keyup(function() {

                var product_sku = $(this).val();
                $.ajax({
                    url: '../process/product-add.php',
                    method: 'POST',
                    data: {
                        productsku: product_sku
                    },
                    success: function(data) {
                        $('#avability').html(data);
                    }

                })
            });

        });
    </script>




    <script type="text/javascript">
        function calc() {

            var ori_price = document.getElementsByName("ori_price")[0].value;

            var dis_per = document.getElementsByName("dis_per")[0].value;

            var cur_price = ori_price;

            var cur_price = (ori_price - (ori_price * dis_per) / 100);

            document.getElementsByName("cur_price")[0].value = cur_price;
            console.log(dis_per);

        }
        calc();
    </script>

    <script>
        var editor = new Jodit('#editor', {
            textIcons: false,
            iframe: false,
            iframeStyle: '*,.jodit_wysiwyg {color:red;}',
            height: 300,
            defaultMode: Jodit.MODE_WYSIWYG,
            required: "Please add description",
            observer: {
                timeout: 100
            },
            uploader: {
                url: 'connector/index.php?action=fileUpload',
            },
            commandToHotkeys: {
                'openreplacedialog': 'ctrl+p'
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            // console.log('script loaded');
            $("#id").change(function() {
                // console.log('category change');
                var category_id = $(this).val();
                // console.log(category_id);
                $.ajax({
                    url: "actionn.php",
                    method: "POST",
                    data: {
                        categoryID: category_id
                    },
                    success: function(data) {
                        // console.log(data);
                        $("#sub-id").html(data);
                    }
                });
            });
        });
    </script>



    <script>
        $(document).ready(function() {

            function divcount() {
                var Count = $('#new > div').length;
                //console.log(Count);
                if (Count == 5) {
                    $(".me-2").css({
                        'display': 'none'
                    })
                } else {
                    $(".me-2").css({
                        'display': 'block'
                    })
                }
            }

            divcount();



            $(".me-2").click(function(e) {
                e.preventDefault();




                $("#new").append(` <div class="mb-3" >
										<label class="form-label" for="formFile">File upload</label>
										<input class="form-control" type="file" name="image[]" id="formFile">
                                        <div class="ss" style="text-align: right; padding-block: 5px;">
                                        <button type="submit" name="add" class="btn btn-danger me-3">Remove</button>
                                        </div>
									</div>`);


                divcount();

            });


            $(document).on('click', '.me-3', function(e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();

                $(row_item).remove();

                divcount();

            });














        });
    </script>
    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>
    <script type="text/javascript">
        $("input:checkbox").on('click', function() {
            var $box = $(this);
            if ($box.is(":checked")) {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
    </script>



</body>

</html>