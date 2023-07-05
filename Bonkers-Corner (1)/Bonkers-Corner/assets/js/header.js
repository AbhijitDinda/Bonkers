const menuBarEl = document.getElementById("menuBar");
const menuMobileEl = document.querySelector(".menu_mobile");

menuBarEl.addEventListener("click", () => {
  console.log("menuBar clicked");
  menuMobileEl.classList.toggle("show_menu");
});

// cart functionality

const cartOpen = document.getElementById("nav-toogle");
const navLinks = document.getElementById("nav-links");
const cartClose = document.querySelector(".cart-close");

cartOpen.addEventListener("click", () => {
  console.log("cart open");
  navLinks.classList.toggle("active");
});

cartClose.addEventListener("click", () => {
  navLinks.classList.toggle("active");
});
// end

function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}

// za css

const sunmenutitle = document.getElementById("sub-menu-title");
const submenutitledetails = document.getElementById("sub-menu-title-details");

sunmenutitle.addEventListener("click", () => {
  submenutitledetails.classList.toggle("show");
});

function minicartQty() {
  console.log("minicast function");
  //new add
  const plusBtns = document.querySelectorAll(".plus_minus"),
    minusBtns = document.querySelectorAll(".minus_plus");
  let number_els = document.querySelectorAll(".number");

  let i;
  plusBtns.forEach((plus, i = 0) => {
    console.log(i);
    plus.addEventListener("click", () => {
      console.log(i);
      // console.log(number_els[i - 1]);
      let val = parseInt(number_els[i - 1].innerText);
      number_els[i - 1].innerText = ++val;
    });
    i++;
  });

  minusBtns.forEach((minus, i = 0) => {
    minus.addEventListener("click", () => {
      let val = parseInt(number_els[i - 1].innerText);
      //console.log(val);
      if (val > 1) {
        number_els[i - 1].innerText = --val;
      }
    });
    i++;
  });
}

minicartQty();

function quantityChange() {
  $(".minus_plus").click(function () {
    console.log("minus click");
    var quantitys = $(this).parent().find("#total-count");

    for (var i = 0; i < quantitys.length; i++) {
      var quantity = quantitys[i].innerHTML;

      console.log(quantity);
      var product_id = $(this).data("cart-id");
      console.log(product_id);

      $.ajax({
        url: "./change_quantity.php",
        method: "POST",
        data: {
          quantity: quantity,
          product_id: product_id,
        },
        success: function (result) {
          let response = JSON.parse(result);
          if (response.status == "success") {
            document.querySelector(".comfort strong").innerHTML =
              response.price;



              const totalAllCartElements = document.querySelectorAll(".cart-2 div:nth-child(3) ins span");
                                console.log(totalAllCartElements);
                                totalAllCartElements.forEach((ele, i = 0) => {
                                    console.log(i);
                                    ele.innerHTML = response.single_price[i];
                                });



              
              // document.querySelector(".cart-2 div:nth-child(3) ins span").innerHTML =
              // response.single_price;





            //alert(result);
          } else {
            alert(result);
          }
        },
      });
    }
  });

  $(".plus_minus").click(function () {
    console.log("minus click");
    var quantitys = $(this).parent().find("#total-count");

    for (var i = 0; i < quantitys.length; i++) {
      var quantity = quantitys[i].innerHTML;

      console.log(quantity);
      var product_id = $(this).data("cart-id");
      console.log(product_id);

      $.ajax({
        url: "./change_quantity.php",
        method: "POST",
        data: {
          quantity: quantity,
          product_id: product_id,
        },
        success: function (result) {
          let response = JSON.parse(result);
          if (response.status == "success") {
            document.querySelector(".comfort strong").innerHTML =
              response.price;


              const totalAllCartElements = document.querySelectorAll(".cart-2 div:nth-child(3) ins span");
                                console.log(totalAllCartElements);
                                totalAllCartElements.forEach((ele, i = 0) => {
                                    console.log(i);
                                    ele.innerHTML = response.single_price[i];
                                });


            // document.querySelector(".cart-2 div:nth-child(3) ins span").innerHTML =
            // response.single_price;

            //alert(result);
          } else {
            alert(result);
          }
        },
      });
    }
  });
}
quantityChange();
