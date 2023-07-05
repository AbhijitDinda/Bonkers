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
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">



                                <form class="forms-sample" method="post" action="../process/product-add.php" enctype="multipart/form-data">


                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">Category</label>
                                        <select class="form-select form-select-lg" name="id" id="id">
                                            <option value="#">Select Category</option>

                                            <?php
                                            $sql2 = "SELECT * FROM category";
                                            $result2 = mysqli_query($con, $sql2);
                                            while ($fatch2 = mysqli_fetch_assoc($result2)) {
                                            ?>

                                                <option value="<?php echo $fatch2['id'] ?>">
                                                    <?php echo $fatch2['category_name'] ?></option>

                                            <?php
                                            }
                                            ?>

                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sub-Category</label>
                                        <select class="form-select form-select-lg" name="sub-id" id="sub-id">
                                            <option value="#">Select Sub-Category</option>
                                        </select>
                                    </div>

                                    <div id="new">
                                        <div class="mb-3">

                                            <label class="form-label" for="formFile">File upload</label>
                                            <input class="form-control" name="image[]" type="file" id="formFile">
                                            <br>
                                            <div class="ss" style="text-align: right; padding-block: 5px;">
                                                <button type="submit" name="add" class="btn btn-success me-2">AddMore</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product Description</label>
                                        <textarea name="product_des" id="editor"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <div class="col-md-2">
                                            <label class="form-label">Product Weight(In gm)</label>
                                            <input class="form-control" name="product_weight" data-inputmask="'alias': 'currency'" />
                                        </div>
                                    </div>



                                    <div class="mb-3">
                                        <div class="col-md-2">
                                            <label class="form-label">Original Price</label>
                                            <input type="number" class="form-control" name="ori_price" onchange="calc(this);" />
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
                                            <input type="number" class="form-control" name="cur_price" />
                                        </div>
                                    </div>



                                    <!-- VARRIANT -->
                                    <!-- <div class="mb-3">
                                        <body>
                                            <div>
                                                <label>Variant Available</label>
                                                <input type="checkbox">
                                            </div>
                                            <div id="result"></div>
                                        </body>
                                    </div> -->

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">Variation Avaiable:</label>
                                        <input type="checkbox" id="myCheck" onclick="myFunction()">

                                        <div id="text" style="display:none">

                                            <input type="checkbox" name="myCheckbox[]" value="XXL" onclick="" />:XXL<br>
                                            <input type="checkbox" name="myCheckbox[]" value="XL" onclick="" />:XL<br>
                                            <input type="checkbox" name="myCheckbox[]" value="XL" onclick="" />:XL<br>
                                            <input type="checkbox" name="myCheckbox[]" value="XS" onclick="" />:XS<br>
                                            <input type="checkbox" name="myCheckbox[]" value="XXS" onclick=" " />:XXS<br>
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
                                    <button type="submit" name="product_submit" class="btn btn-primary">Add Product</button>

                                </form>

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



        // $(document).ready(function() {
        //     $('input[type="checkbox"]').click(function() {
        //         if ($(this).prop("checked") == true) {
        //             $("#result").html(`<div>
        //                                 <label>
        //                                     <input type="checkbox" class="radio" value="XL"  name="fooby[]" />XL</label><br>
        //                                   <label>
        //                                     <input type="checkbox" class="radio" value="L"  name="fooby[]" />L</label><br>
        //                                   <label>
        //                                     <input type="checkbox" class="radio" value="M"  name="fooby[]" />M</label><br>
        //                                   <label>
        //                                     <input type="checkbox" class="radio" value="S" name="fooby[]" />S</label>
        //                                 </div>`);
        //         } else if ($(this).prop("checked") == false) {
        //             $("#result").html("");
        //         }
        //     });
        // });
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