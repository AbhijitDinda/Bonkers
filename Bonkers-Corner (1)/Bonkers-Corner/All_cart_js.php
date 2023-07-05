<script>
  function CartUpdate() {
      $.ajax({
        url: "user_cart_list.php?u_id=<?= $_SESSION['id'] ?>",
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


















    // function CartUpdate() {
    //   $.ajax({
    //     url: "user_cart_list.php?u_id=<?= $_SESSION['id'] ?>",
    //     method: "GET",
    //     success: function(result) {
    //       document.querySelector('.second-cart').innerHTML = result;
    //       navLinks.classList.add('active');
    //       deleteCart();
    //       minicartQty();
    //       quantityChange();
    //     }
    //   });
    // }



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