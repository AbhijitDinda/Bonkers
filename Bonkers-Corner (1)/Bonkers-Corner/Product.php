<?php
include './connection.php';
// session_start();
include './Authentication.php';




$P_id = $_GET['P_id'];



$query6 = "SELECT product.id AS p_id, product.product_name,product.image,product.ori_price,product.cur_price,product.varriant FROM product
                            WHERE product.id='$P_id'";



$result6 = mysqli_query($con, $query6);
while ($row6 = mysqli_fetch_assoc($result6)) {
  $p_name = $row6['product_name'];

  $img = explode(",", "$row6[image]");
  $length = count($img);
  $ori_prc = $row6['ori_price'];
  $cur_prc = $row6['cur_price'];
  $varriant = $row6['varriant'];

  $vari = explode(",", "$row6[varriant]");
  $lengthj = count($vari);

  //print($varriant);die;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include 'common-style.php'; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/Product.css">
  <link rel="stylesheet" href="./assets/css/Product2.css">

  <style>
    .active1,
    .size_btn:hover {
      background-color: #666;
      color: white;
    }
  </style>
</head>

<body>
  <?php include './header.php'; ?>

  <section>
    <div class="ab-Product-main">

      <div class="ab-img-product">

        <div class="ab-thumb">
          <div class="ab-thumb-minor">
            <?php
            for ($i = 0; $i < $length; $i++) {
            ?>

              <img class="nav_images" alt="avb" src="/template/process/img/<?php echo $img[$i] ?>">

            <?php
            }
            ?>

          </div>

          <div class="ab-main-thumb">
            <img id="imgbox" class="img-scale" src="/template/process/img/<?php echo $img[0] ?>">
          </div>




        </div>


        <div class="ab-product-details">
          <div class="ab-product-name">
            <h1><?= $p_name ?></h1>
          </div>

          <div class="ab-product-price">
            <del>₹<?= $ori_prc ?>.00</del>
            <span>₹<?= $cur_prc ?>.00</span>
            <strong>-<?= (int)((($ori_prc - $cur_prc) * 100) / $ori_prc) ?>% OFF</strong>
          </div>

          <div class="ab-product-size">
            <div>
              <h3>SIZE</h3>
            </div>
            <div class="ab-size">
              <?php
              for ($j = 0; $j < $lengthj; $j++) {
              ?>

                <button class="size_btn" data-size="<?= $vari[$j] ?>">
                  <?= $vari[$j] ?>
                </button>
              <?php
              }
              ?>



            </div>
          </div>

          <div class="ab-cart">
            <button class="cart-btn" type="submit">Size Cart</button>
          </div>

          <div class="ab-addcart">
            <div class="ab-cart-main">
              <div class="cart-counts">
                <form>
                  <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                  <input type="number" id="number" value="1" />
                  <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                </form>

              </div>

              <div class="add-tocart-wrapper">
                <form method="POST" action="./process_cart.php">
                  <a id="product_add_cart" name="product_add_cart" style="color: white;">
                    Add to cart
                  </a>
                </form>
              </div>


            </div>
            <div class="ab-wishlist">

              <i class="fa-solid fa-cart-plus fa-2xl"></i>
              <h2 id="product_add_wishlist" style="cursor:pointer;">ADD TO WISHLIST</h2>
            </div>

          </div>

          <div class="ab-sku">
            <p>SKU: U-8904413422805</p>
          </div>

          <div class="ab-share-social">
            <h4>SHARE</h4>
            <i class="fa-brands fa-twitter fa-lg" style="color: #b1b4b9;"></i>
            <i class="fa-brands fa-facebook-f fa-lg" style="color: #b1b4b9;"></i>
            <i class="fa-brands fa-linkedin fa-lg" style="color: #b1b4b9;"></i>
            <i class="fa-brands fa-pinterest fa-lg" style="color: #b1b4b9;"></i>
          </div>


        </div>

      </div>
  </section>

  <section>
    <div class="ab-product-info">

      <div>
        <h1>Description</h1>
        <p>PRODUCT DETAILS</p>
        <p>
          <span>Composition:</span> 60% Cotton 40% Polyester<br>
          <span>GSM:</span> 320<br>
          <span>Colour:</span> Lilac Blue<br>
          <span>Country of production:</span> India<br>
          <span>Wash care:</span> Machine wash cold with similar colours.<br>
          Only non-chlorine.<br>
          Tumble Dry Low.<br>
          Warm Iron if Needed.<br>
          <span>Sizing:</span> Body measurement in inches.<br>
          <span>Estimated order processing time:</span> 48hours.<br>
          <br>
          <span>Product Description:</span><br>
          <br>
          <span>Size and Fit:</span>The model (Height 6’0″) is Wearing Size L<br>
          <span>Fit:</span> Regular Fit<br>
          2 pockets<br>
          <span>Please Note:</span><br>
        <ul>
          <li>Colours may slightly vary depending on your screen brightness.</li>
          <li>Actual product specifications may vary +/-5%</li>
          <li>All the products have different sizes and size chart.</li>
        </ul>
        </p>
      </div>

      <div>
        <h1>Informations</h1>

        <p>
          <span>Shipping<br></span>
          We currently offer 5% discount on all pre-paid orders and free shipping on COD orders over ₹1499.<br>
        </p>
        <br>

        <p>
          <span>Sizing<br></span>
          Fits true to size. Do you need size advice? Please refer to our size chart.<br>
        </p>
        <br>
        <p>
          <span>Return & exchange<br></span>
          For any returns and exchange please read our FAQs Page.<br>
          No Returns/Exchange on Tank tops and Baby tees.<br>
        </p>
        <br>
        <p>
          <span>Assistance<br></span>
          Contact us at <span>info@bonkerscorner.com</span>.<br>
        </p>
      </div>

      <div>
        <h1>Specifications</h1>
        <div class="ab-specific">
          <p> WEIGHT</p>
          <p>600g</p>
        </div>

        <div class="ab-specific">
          <p> SIZE</p>
          <p> S, L, XL, XXS, XXL</p>
        </div>

      </div>

    </div>


  </section>

  <section>
    <div class="ab-review">


      <button class="ab-review-btn-main" id="page1">
        REVIEWS()
      </button>

      <div class="ab-review-page" id="page2">

        <h2>Reviews</h2>
        <p>There are no reviews yet.</p>
        <h4>BE THE FIRST TO REVIEW “MICKEY PERIWINKLE JOGGERS(FLEECE)”</h4>
        <p>Your email address will not be published. Required fields are marked *</p>
        <label>Your review *</label><br>
        <input class="textarea1" type="textarea"><br>
        <label>Name *</label><br>
        <input class="textarea2" type="textarea"><br>
        <label>Email*</label><br>
        <input class="textarea2" type="textarea"><br><br>
        <input type="checkbox" id="PHP" name="PHP" value="PHP" />
        <label>Save my name, email, and website in this browser for the next time I comment.</label><br><br>

        <button class="btn-sunmit" type="submit">Submit</button>


      </div>
    </div>
  </section>

  <section>
    <div class="ab-sug-title">
      <h1>YOU MAY ALSO LIKE…</h1>
    </div>

    <div class="ab-product-suggetion">

      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/21.jpg">
          <img class="secoundary-img" src="./assets/images/home/  21a.jpg">
        </div>

        <div class="ab-details">
          <div class="ab-ptype">LATEST COLLECTION , TOPS</div>
          <div class="ab-pname">Lime Green Ribbed Square Neck Top</div>
          <div class="ab-pvalue"><del>₹999</del></div>
          <div class="ab-pvalue">₹699 </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
        <div class="ab-cart">
          <p>SELECT OPTION</p>
          <i style="font-size:22px" class="fa-regular fa-heart"></i>

        </div>
      </div>
      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/22.jpg">
          <img class="secoundary-img" src="./assets/images/home/22a.jpg">
        </div>

        <div class="ab-details">
          <div class="ab-ptype">LATEST COLLECTION , TOPS</div>
          <div class="ab-pname">Lime Green Ribbed Square Neck Top</div>
          <div class="ab-pvalue"><del>₹999</del></div>
          <div class="ab-pvalue">₹699 </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
        <div class="ab-cart">
          <p>SELECT OPTION</p>
          <i style="font-size:22px" class="fa-regular fa-heart"></i>

        </div>

      </div>
      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/23.jpg">
          <img class="secoundary-img" src="./assets/images/home/23a.jpg">
        </div>

        <div class="ab-details">
          <div class="ab-ptype">LATEST COLLECTION , TOPS</div>
          <div class="ab-pname">Lime Green Ribbed Square Neck Top</div>
          <div class="ab-pvalue"><del>₹999</del></div>
          <div class="ab-pvalue">₹699 </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
        <div class="ab-cart">
          <p>SELECT OPTION</p>
          <i style="font-size:22px" class="fa-regular fa-heart"></i>

        </div>

      </div>

      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/24.jpg">
          <img class="secoundary-img" src="./assets/images/home/24a.jpg">
        </div>

        <div class="ab-details">
          <div class="ab-ptype">LATEST COLLECTION , TOPS</div>
          <div class="ab-pname">Lime Green Ribbed Square Neck Top</div>
          <div class="ab-pvalue"><del>₹999</del></div>
          <div class="ab-pvalue">₹699 </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
        <div class="ab-cart">
          <p>SELECT OPTION</p>
          <i style="font-size:22px" class="fa-regular fa-heart"></i>

        </div>
      </div>

    </div>
  </section>

  <section>

    <div class="ab-sug-title">
      <h1>RELATED PRODUCTS</h1>
    </div>
    <div class="ab-product-suggetion">
      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/25.jpg">
          <img class="secoundary-img" src="./assets/images/home/25a.jpg">
        </div>

        <div class="ab-details">
          <div class="ab-ptype">LATEST COLLECTION , TOPS</div>
          <div class="ab-pname">Lime Green Ribbed Square Neck Top</div>
          <div class="ab-pvalue"><del>₹999</del></div>
          <div class="ab-pvalue">₹699 </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
        <div class="ab-cart">
          <p>SELECT OPTION</p>
          <i style="font-size:22px" class="fa-regular fa-heart"></i>

        </div>

      </div>

      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/26.jpg">
          <img class="secoundary-img" src="./assets/images/home/26a.jpg">
        </div>

        <div class="ab-details">
          <div class="ab-ptype">LATEST COLLECTION , TOPS</div>
          <div class="ab-pname">Lime Green Ribbed Square Neck Top</div>
          <div class="ab-pvalue"><del>₹999</del></div>
          <div class="ab-pvalue">₹699 </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
        <div class="ab-cart">
          <p>SELECT OPTION</p>
          <i style="font-size:22px" class="fa-regular fa-heart"></i>

        </div>

      </div>
      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/27.jpg">
          <img class="secoundary-img" src="./assets/images/home/27a.jpg">
        </div>

        <div class="ab-details">
          <div class="ab-ptype">LATEST COLLECTION , TOPS</div>
          <div class="ab-pname">Lime Green Ribbed Square Neck Top</div>
          <div class="ab-pvalue"><del>₹999</del></div>
          <div class="ab-pvalue">₹699 </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
        <div class="ab-cart">
          <p>SELECT OPTION</p>
          <i style="font-size:22px" class="fa-regular fa-heart"></i>

        </div>

      </div>

      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/28.jpg">
          <img class="secoundary-img" src="./assets/images/home/28a.jpg">
        </div>

        <div class="ab-details">
          <div class="ab-ptype">LATEST COLLECTION , TOPS</div>
          <div class="ab-pname">Lime Green Ribbed Square Neck Top</div>
          <div class="ab-pvalue"><del>₹999</del></div>
          <div class="ab-pvalue">₹699 </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
      </div>
  </section>
  <footer>
    <?php include './footer.php'; ?>
    <?php include './footer_script.php' ?>
  </footer>

  <script>
    console.log('ff');
    let buttons = document.querySelectorAll('.size_btn');

    buttons.forEach(button => {

      button.addEventListener('click', function() {
        buttons.forEach(btn => btn.classList.remove('active1'));
        console.log(button);
        button.classList.add('active1');
      });
    });
  </script>

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      const nav_images = document.querySelectorAll('.nav_images');
      // console.log(nav_images);
      const imgbox = document.querySelector('#imgbox');

      nav_images.forEach(nav => {
        nav.addEventListener('click', (e) => {
          // console.log(e);
          let image_src = e.srcElement.currentSrc;
          imgbox.src = image_src;
        })
      })
    })
  </script>






  <script>
    $(document).ready(function() {
      $("#product_add_cart").click(function() {
        if (document.querySelector('.size_btn.active1') != null) {
          var size = document.querySelector('.size_btn.active1').getAttribute('data-size');
          var quantity = document.querySelector('.cart-counts #number').value;
          var product_id = <?= $P_id ?>;
         
          // alert(`${size}, ${quantity}`);
          $.ajax({
            url: "action_add_cart.php",
            method: "POST",
            data: {
              quantity: quantity,
              size: size,
              product_id: product_id,
              
            },
            success: function(result) {
              // $(".denver").html(result);
              if (result == "Success") {
                CartUpdate();
              } else {
                alert(result);
              }
            }
          });
        } else {
          alert('please select ypur size')
        }
      });
    });


    function CartUpdate() {
      $.ajax({
        url: "user_cart_list.php",
        method: "GET",
        success: function(result) {
          console.log(result);
          console.log(typeof result);
          let response = JSON.parse(result);

          console.log(typeof response);
          console.log(response);
          document.querySelector('.first-cart span:first-child').innerHTML = response.count;
          document.querySelector('.comfort strong').innerHTML = `₹${response.final_price}`;
          let html = '';
          
          response.json_array.forEach(arr => {
            console.log(arr);
            html += `
          <div class="denver">
                <div class="cart-1">
                    <a>
                        <img src="/template/process/img/${arr.image}" width="80px" height="100px">

                    </a>
                </div>

                <div class="cart-2">
                    <div STYLE="font-weight:bold">
                        <a>${arr.product_name}</a>
                    </div>

                    <div class="product-qty" style="width:25%">

                        <button style="color:white;background-color:black;font-size:20px" id="decrement-count" class="minus_plus" data-cart-id="${arr.id}">-</button>
                        <span id="total-count" name="quantity" value="${arr.quantity}" class="number">${arr.quantity}</span>
                        <button style="color:white;background-color:black;font-size:20px" id="increment-count" class="plus_minus" data-cart-id="${arr.id}">+</button>
                    </div>
                    <div>
                        <ins>
                            <span>${parseInt(arr.quantity) * parseInt(arr.cur_price) }</span>
                        </ins>
                    </div>
                </div>

                <!-- cross sign -->
                <div class="cart-3" id="cart-3" data-cross-id="${arr.id}">
                    <i class="fa-solid fa-trash fa-xl"></i>
                </div>


            </div>
          `;
            console.log(arr);
            console.log(html);
          })

          document.querySelector('.second-cart').innerHTML = html;


          navLinks.classList.add('active');
          deleteCart();
          minicartQty();
          quantityChange();
        }
      });
    }

    function deleteCart() {
      console.log('function loaded');
      $(".cart-3").click(function() {
        console.log($(this));
        var product_id = $(this).data('cross-id');
        console.log(product_id);
        // return;
        $.ajax({
          url: "delet_cart.php",
          method: "POST",
          data: {
            product_id: product_id

          },
          success: function(result) {
            // $("#div1").html(result);
            if (result == "Success") {
              CartUpdate();
            } else {
              alert(result);
            }
          }
        });
      });
    }

    deleteCart();
  </script>

<script>
  $(document).ready(function() {
      $("#product_add_wishlist").click(function() {

          var product_id = <?= $P_id ?>;
         

          $.ajax({
            url: "add_wishlist.php",
            method: "POST",
            data: {
              product_id: product_id
              
            },
            success: function(result) {
             
              if (result == "Success") {
                alert("added to wishlist")
              } else {
                alert(result);
              }
            }
          });
        
      });
    });
</script>








</body>

</html>