<?php
// session_start();
include './connection.php';

include './Authentication.php'

// print($_SESSION['id']);die;


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include 'common-style.php'; ?>
  <link rel="stylesheet" type="text/css" href="./slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css" />
  <link rel="stylesheet" href="./assets/css/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <?php include './header.php';
    include './connection.php'; ?>
  </header>
  <section>
    <div class="ab-banner-container">
      <img src="https://assets.bonkerscorner.com/uploads/2022/08/31164602/main_banner_desk.jpg">
    </div>
  </section>

  <section>
    <div class="ab-gender-container">

      <div class="woman">
        <div class="ab-w-img-1"><img src="https://assets.bonkerscorner.com/uploads/2022/08/31164609/womens_banner_desk.jpg"></div>
        <div class="ab-w-img-2"><img src="https://assets.bonkerscorner.com/uploads/2022/08/31164905/split_1-768x828.jpg"></div>
      </div>
      <div class="man">
        <img class="ab-m-img-1" src="https://assets.bonkerscorner.com/uploads/2022/08/31164606/mens_banner_desk.jpg">
        <img class="ab-m-img-2" src="https://assets.bonkerscorner.com/uploads/2022/08/31164908/split_2-768x828.jpg">
      </div>

    </div>
  </section>

  <section>
    <div class="block-on-desk">
      <img src="https://assets.bonkerscorner.com/uploads/2022/08/31164631/womens_banner_mob-768x1075.jpg">
    </div>
  </section>

  <section>
    <div class="slideshow-container">

      <div>
        <img src="https://assets.bonkerscorner.com/uploads/2022/08/31172935/landcape_banner_mob.jpg" style="width:100%">
      </div>

      <div>
        <img src="https://assets.bonkerscorner.com/uploads/2022/08/05145254/landcape_banner_desk_11.jpg" style="width:100%">
      </div>

    </div>
  </section>


  <section>
    <div class="block-on-desk">
      <img src="https://assets.bonkerscorner.com/uploads/2022/08/31174107/mens_banner_mob-768x1075.jpg">
    </div>
  </section>


  <section>
    <div class="ab-discount-container">
      <img src="https://assets.bonkerscorner.com/uploads/2022/08/31173623/offergif-1.gif">
    </div>
  </section>

  <section>
    <div>
      <h1 class="ab-highlight">CATEGORIES</h1>
    </div>
    <div class="carousel">


      <div>
        <img style="width:100%" src="https://assets.bonkerscorner.com/uploads/2022/08/19220831/womensOST.jpg">
      </div>
      <div>
        <img style="width:100%" src="https://assets.bonkerscorner.com/uploads/2022/08/19220827/womensbottom.jpg">
      </div>
      <div>
        <img style="width:100%" src="https://assets.bonkerscorner.com/uploads/2022/08/19220819/mensOST.jpg">
      </div>
      <div>
        <img style="width:100%" src="https://assets.bonkerscorner.com/uploads/2022/08/19220834/womenssweat.jpg">
      </div>
      <div>
        <img style="width:100%" src="https://assets.bonkerscorner.com/uploads/2022/08/19220808/mensbasic.jpg">
      </div>
      <div>
        <img style="width:100%" src="https://assets.bonkerscorner.com/uploads/2022/08/19220824/womensbasic.jpg">
      </div>
      <div>
        <img style="width:100%" src="https://assets.bonkerscorner.com/uploads/2022/08/19220816/mensbottom.jpg">
      </div>
    </div>
  </section>

  <section>
    <div>
      <h1 class="ab-highlight">NEW IN</h1>
    </div>

    <div class="ab-container">
      <?php
      $query21="SELECT * FROM product";
      $result21 = mysqli_query($con, $query21);
      while ($row21 = mysqli_fetch_assoc($result21)) {
        $img = explode(",", "$row21[image]");
        

        
      ?>



      <div class="ab-card">
        <div>
        <a href="./Product.php?P_id=<?= $row21["id"] ?>">
          <img class="primary-img" src="/template/process/img/<?php echo $img[0] ?>">
          <img class="secoundary-img" src="/template/process/img/<?php echo $img[0] ?>">
          
        
          </a>
        </div>

        <div class="ab-details">
          <div class="ab-ptype"><?=$row21['product_name']?></div>
          <div class="ab-pname"><?=$row21['product_name']?></div>
          <div class="ab-pvalue"><del>₹<?=$row21['ori_price']?></del></div>
          <div class="ab-pvalue">₹<?=$row21['cur_price']?> </div>
          <div class="ab-discount">
            <p> -25%</p>
          </div>
        </div>
        <div class="ab-cart">
          <p>SELECT OPTION</p>
          <i style="font-size:22px" class="fa-regular fa-heart"></i>

        </div>
      </div>

      <?php
      }
      ?>
      <!-- <div class="ab-card">
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
      </div> -->



    </div>

  </section>

  <section>
    <div>
      <h1 class="ab-highlight">BEST SELLERS</h1>
    </div>
    <div class="ab-container">
      <div class="ab-card">
        <div>
          <img class="primary-img" src="./assets/images/home/21.jpg">
          <img class="secoundary-img" src="./assets/images/home/21a.jpg">
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
    </div>

  </section>

  <section>
    <div class="ab-follow">
      <h4>Follow Us On - </h4>
      <i class="fa-brands fa-square-instagram fa-xl"></i>
      <i class="fa-brands fa-facebook fa-xl"></i>
      <i class="fa-brands fa-twitter fa-xl"></i>
      <i class="fa-brands fa-pinterest fa-xl"></i>
    </div>
  </section>

  <section>
    <div class="features">
      <div class="48hr">
        <img src="./assets/images/home/shipping_under_48.jpg">
        <h4>SHIPPING WITHIN 48 HOURS </h4>
        <p>Your order will be shipped within 48 hours from the<br>
          time since order is placed </p>
      </div>
      <div class="delivary">
        <img src="./assets/images/home/free_delivery.jpg">
        <h4>5% OFF || FREE DELIVERY</h4>
        <p>5% OFF on Pre-paid orders. Free delivery on<br>
          COD orders above ₹1499.

        </p>
      </div>
      <div class="made-in-india">
        <img src="./assets/images/home/made-india.jpg">
        <h4>MADE IN INDIA</h4>
        <p>Our products are 100% made in India. From raw fabric <br>
          to the final product!</p>
      </div>

    </div>
  </section>
  <footer>
    <?php include './footer.php';
    include './footer_script.php';
    ?>
  </footer>







  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>



  <script type="text/javascript">
    $('.slideshow-container').slick({
      dots: true,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 1700,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  </script>



  <script type="text/javascript">
    $('.carousel').slick({
      dots: true,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 1500,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
    });
  </script>


  <script type="text/javascript">
    $('.ab-container').slick({
      dots: true,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 1500,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
    });
  </script>



  <!-- <script>
    function CartUpdate() {
      $.ajax({
        url: "user_cart_list.php?u_id=<?= $_SESSION['id'] ?>",
        method: "GET",
        success: function(result) {
          document.querySelector('.second-cart').innerHTML = result;
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
  </script> -->

  <?php
  include './All_cart_js.php';
  ?>









</body>

</html>