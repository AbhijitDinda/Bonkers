<?php
include './connection.php';

include './Authentication.php';
$query30="SELECT * FROM user WHERE id='{$_SESSION['id']}'";
$result30 = mysqli_query($con, $query30);

while ($row30 = mysqli_fetch_assoc($result30)) {
    $Name = $row30['username'];
    //print($Name);die;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <?php include 'common-style.php'; ?>
    <link rel="stylesheet" href="./assets/css/checkout.css">
    <link rel="stylesheet" href="./assets/css/checkoutresponsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <?php include './header.php'; ?>
    </header>
    <div class="container">
        <div class="heading-div">
            <h2><a href="#">Bonkers Corner</a></h2>
            <h3>Checkout</h3>
        </div>
        <div class="cart-container">
            <div class="pogress-container active">
                <a href="./viewcart.php">
                    <span class="step title">
                        <i class="fa-regular fa-circle-check"></i>SHOPPING BAG</span>
                    <p>
                        VIEW YOUR ITEMS</p>
                </a>
            </div>
            <div class="pogress-container active">



                <a href="./checkout.php">
                    <span class="step title">
                        <i class="fa-regular fa-circle-check"></i>SHIPPING AND CHECKOUT</span>
                    <p>
                        ENTER YOUR DETAILS
                    </p>
                </a>
            </div>
            <div class="pogress-container">
                <a href="#">
                    <span class="step title" style="color: grey;">
                        <i class="fa-regular fa-circle-check"></i>CONFIRMATION</span>
                    <p style="    color: #9d9595;">
                        REVIEW YOUR ORDER!</p>
                </a>
            </div>
        </div>

        <div class="rtn-customer">
            Returning customer?
            <a href="#">Click here to login</a>
        </div>
        <form id="form1">
            <p class="cl">If you have shopped with us before, please enter your details below. If you are a new
                customer, please proceed to the Billing section.</p>
            <p class="form-row-first">
                <label for="username">Username or email&nbsp;
                    <span class="required">*</span></label>
                <input type="text" class="input-text" name="username" id="username" autocomplete="username">
            </p>
            <p class="form-row-first">
                <label for="password">Password&nbsp;<span class="required">*</span></label>
                <input class="input-text" type="password" name="password" id="password" autocomplete="current-password">
            </p>
            <label class="remenber">
                <input class="me" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember
                    me</span>
            </label>
            <button type="submit" class="btn" name="login" value="Login">Login</button>

            <p class="password"><a href="#">Lost your password?</a></p>

            <div class="fa-twi">
                <a href="#">
                    <div class="facebook">
                        <div class="ibrand">
                            <i class="fa-brands fa-facebook"></i>
                        </div>
                        <div class="width-go">
                            Login with <b>Facebook</b>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="facebook">
                        <div class="ibrand">
                            <i class="fa-brands fa-google"></i>
                        </div>
                        <div class="width-go">
                            Login with <b>Google</b>
                        </div>
                    </div>
                </a>
            </div>
            <h2>Or</h2>
            <a href="#">
                <div class="nsl">
                    <div class="label-container">Continue as <b>Guest</b>
                    </div>
                </div>
            </a>
        </form>
        <div class="coupon">
            Have a coupon?

            <a href="#">Click here to enter your code</a>
        </div>

        <form id="form2">
            <div class="bill-ship">
                <div>
                    <h3>BILLING & SHIPPING</h3>
                    <p>
                        <label for="username">FIRST NAME
                            <abbr class="required">*</abbr></label>
                        <input type="text" class="input-text" name="firstname" id="firstname" autocomplete="firstname">
                    </p>
                    <p>
                        <label for="username">LAST NAME
                            <abbr class="required">*</abbr></label>
                        <input type="text" class="input-text" name="lastname" id="lastname" autocomplete="lastname">
                    </p>
                    <div class="country-rgn">
                        <label for="country">COUNTRY/REGION <abbr>*</abbr></label>
                    </div>
                    <!-- <div class="country-rgn">COUNTRY / REGION <span class="required">*</span</div> -->
                    <h3>India</h3>
                    <div class="all-input" data-priority="50"><label for="billing_address_1">Street
                            address&nbsp; <abbr class="required">*</abbr></label><span><input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House Number, Apartment and Street Name" value="" autocomplete="address-line1" data-placeholder="House Number, Apartment and Street Name"><br><br>
                            <input type="text" class="input-text " name="billing_address_1" placeholder="Landmark,Locality,Road name/Area name" value="" autocomplete="address-line1" data-placeholder="Landmark,Locality,Road name/AreaName"></span></div>

                    <div class="all-input" data-priority="50"><label for="billing_address_1">TOWN /
                            CITY&nbsp;<abbr class="required">*</abbr></label><span><input type="text" class="input-text ">
                        </span></div>

                    <div class="all-input" data-priority="80">
                        <label for="billing_state" class="">State / County&nbsp;<abbr class="required">*</abbr></label><span><select name="billing_state" id="billing_state" class="state_select select2-hidden-accessible" autocomplete="address-level1" data-placeholder="Select an option…" data-input-classes="" tabindex="-1" aria-hidden="true">
                                <option value="">Select an option…</option>
                                <option value="AP">Andhra Pradesh</option>
                                <option value="AR">Arunachal Pradesh</option>
                                <option value="AS">Assam</option>
                                <option value="BR">Bihar</option>
                                <option value="CT">Chhattisgarh</option>
                                <option value="GA">Goa</option>
                                <option value="GJ">Gujarat</option>
                                <option value="HR">Haryana</option>
                                <option value="HP">Himachal Pradesh</option>
                                <option value="JK">Jammu and Kashmir</option>
                                <option value="JH">Jharkhand</option>
                                <option value="KA">Karnataka</option>
                                <option value="KL">Kerala</option>
                                <option value="MP">Madhya Pradesh</option>
                                <option value="MH">Maharashtra</option>
                                <option value="MN">Manipur</option>
                                <option value="ML">Meghalaya</option>
                                <option value="MZ">Mizoram</option>
                                <option value="NL">Nagaland</option>
                                <option value="OR">Orissa</option>
                                <option value="PB">Punjab</option>
                                <option value="RJ">Rajasthan</option>
                                <option value="SK">Sikkim</option>
                                <option value="TN">Tamil Nadu</option>
                                <option value="TS">Telangana</option>
                                <option value="TR">Tripura</option>
                                <option value="UK">Uttarakhand</option>
                                <option value="UP">Uttar Pradesh</option>
                                <option value="WB">West Bengal</option>
                                <option value="AN">Andaman and Nicobar Islands</option>
                                <option value="CH">Chandigarh</option>
                                <option value="DN">Dadra and Nagar Haveli</option>
                                <option value="DD">Daman and Diu</option>
                                <option value="DL">Delhi</option>
                                <option value="LD">Lakshadeep</option>
                                <option value="PY">Pondicherry (Puducherry)</option>
                            </select><span class="class" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-billing_state-container" role="combobox">

                                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></span>
                    </div>

                    <div class="all-input" data-priority="50"><label for="billing_address_1">PINCODE
                            &nbsp;<abbr class="required">*</abbr></label><span><input type="number" class="input-text " name="billing_address_1" placeholder="Enter Valid Pincode" value="" autocomplete="pincode" data-placeholder="Enter Valid Pincode">
                        </span></div>

                    <div class="all-input" data-priority="50"><label for="billing_address_1">PHONE
                            &nbsp;<abbr class="required">*</abbr></label><span><input type="text" class="input-text " name="billing_address_1" placeholder="Enter 10 digit phone No" value="" autocomplete="tel" data-placeholder="Enter 10 digit phone No">
                        </span></div>

                    <div class="all-input" data-priority="50"><label for="billing_address_1">EMAIL ADRESS
                            &nbsp;<abbr class="required">*</abbr></label><span><input type="text" class="input-text " name="billing_address_1" placeholder="" value="" autocomplete="email" data-placeholder="">
                        </span></div>


                    <div class="create-a">
                        <label>
                            <input class="woo" id="createaccount" type="checkbox" name="createaccount" value="1" onclick="myFunction()"> <span>Create an account?</span>
                        </label>
                    </div>


                    <div class="all-input" id="account_password_field">
                        <label for="account_password" class="create-pass" id="account">Create account
                            password&nbsp;<abbr class="required">*</abbr></label><span><input type="password" class="input-text " name="account_password" id="account_password" placeholder="Password" value=""><span class="show-password-input"></span></span>
                    </div>

                    <h4>Additional information</h4>

                    <div class="all-input" data-priority=""><label for="order_comments">Order notes&nbsp;<span class="optional">(optional)</span></label><span><textarea name="order_comments" class="input-text " placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea></span></div>

                </div>

                <div class="your-order">
                    <h3>YOUR ORDER</h3>
                    <table class="shop_table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include './connection.php';

                            $query20 = "SELECT * FROM cart INNER JOIN product WHERE cart.user_id='{$_SESSION['id']}' AND product.id=cart.item";
                            $result20 = mysqli_query($con, $query20);
                            $all_tp = 0;

                            while ($row20 = mysqli_fetch_assoc($result20)) {

                                $p_name = $row20['product_name'];
                                $cur_prc = $row20['cur_price'];
                                $quantity = $row20['quantity'];
                                $to_prc = $cur_prc * $quantity;
                                $all_tp += $to_prc;




                            ?>



                                <tr>
                                    <td>
                                        <div><?= $p_name ?>
                                        </div>&nbsp; <strong>×&nbsp;<?= $quantity ?></strong>
                                    </td>
                                    <td>
                                        <span><span>₹</span><?= $to_prc ?></span>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                        <tfoot>

                            <tr>
                                <th>Subtotal</th>
                                <td>
                                    <span>₹</span>
                                    <span><?= $all_tp ?></span>
                                </td>
                            </tr>




                            <tr>
                                <th>Shipping</th>
                                <td data-title="Shipping">
                                    <ul id="shipping_method" class="ship-mtd">
                                        <li>
                                            <input type="hidden" class="shipping_method"><label for="shipping_method">Delhivery</label>
                                        </li>
                                    </ul>


                                </td>
                            </tr>



                            <tr>
                                <th>Pre-Paid Shipping charges</th>
                                <td><span><span>₹</span>50.00</span></td>
                            </tr>
                            <tr>
                                <th>5% OFF - Prepaid Discount</th>
                                <td><span>-<span>₹</span>35.00</span></td>
                            </tr>

                            <tr>
                                <th>SGST</th>
                                <td><span><span>₹</span><?= $all_tp * 0.09 ?></span></td>
                            </tr>
                            <tr>
                                <th>CGST</th>
                                <td><span><span>₹</span><?= $all_tp * 0.09 ?></span></td>
                            </tr>


                            <tr>
                                <th>Total</th>
                                <td><strong><h2>₹</h2><h2 id="payment_am"><?= $all_tp * 0.18 + $all_tp + 15 ?></h2></strong>
                                </td>
                            </tr>


                        </tfoot>
                    </table>

                    <div id="payment">
                        <ul>
                            <li>
                                <input id="payment_method_cashfree" type="radio" class="input-radio" name="payment_method" value="cashfree" checked="checked">

                                <label for="payment_method_cashfree">
                                    <b>5% OFF</b> - UPI/Credit Card/Debit Card/NetBanking/GPay/PhonePe/Paytm/Mobikwik/
                                    <img src="./assets//images/checkout/paytm.webp">
                                </label>
                                <div class="payment_box">
                                    <p>Get <b>5% Discount</b> – Pay securely by Credit or Debit card, Internet Banking,
                                        Gpay, Phonepe, Amazon Pay, BHIM UPI, Paytm, Mobikwik, Freecharge, Payzapp, Ola
                                        Money, Airtel Money or Jio Money, through CashFree.<br>
                                        Get up to Rs.300 Cashback on paying via MobiKwik wallet. (Offer valid on a
                                        minimum transaction of Rs.1499) Use code “MBK300”</p>
                                </div>
                            </li>
                            <li>
                                <input id="payment_method_razorpay" type="radio" class="input-radio" name="payment_method" value="razorpay">

                                <label for="payment_method_razorpay">
                                    <b>5% OFF</b> - Paytm/ Paytm UPI/ <img src="https://cdn.razorpay.com/static/assets/logo/payment.svg"> </label>
                                <div style="display:none;">
                                    <p>Get <b>5% Discount</b> – Pay securely on Paytm and Paytm UPI.</p>
                                </div>
                            </li>
                            <li>
                                <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="code">

                                <label for="payment_method_cod">
                                    Cash on delivery </label>
                                <div style="display:none;">
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                            </li>
                        </ul>
                        <div class="place-order">

                            <button type="submit" onclick="pay_now()"><a href="#" style="color: white;"> Place Order</a></button>

                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
    <footer>
        <?php include './footer.php'; ?>
    </footer>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <script>
        
        
        
        function pay_now() {
            var banificery_name ="Name";
            var ammount =<?= $all_tp * 0.18 + $all_tp + 15 ?>;
            payment_status="paid";
            
            var options = {
                "key": "rzp_test_6LSetmMakwptVj",
                "amount": `${ammount*100}`,
                "currency": "INR",
                "name": "BONKERS CONNER",
                "description": "Test Transaction",
                "image": "//Bonkers-Corner (1)/Bonkers-Corner/assets/images/logo/images.png",

                "handler": function(response) {

                    jQuery.ajax({
                        type:'post',
                        url:'payment_process.php',
                        data:{
                        banificery_name:banificery_name,
                        ammount:ammount,
                        payment_status:payment_status,
                        }
                    })
                },

            };
            var rzp1 = new Razorpay(options);

            rzp1.open();
            e.preventDefault();
        }
    </script>






    <script>
        function myFunction() {
            var checkBox = document.getElementById("createaccount");
            var text = document.getElementById("account_password_field");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>
</body>

</html>