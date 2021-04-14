<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>

    <script src="https://kit.fontawesome.com/0e43f3f9a9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/cart.css">
<style>
    @media screen and (max-width: 1079px){
        body > header > div > div > div > h1{
            font-size: 10vw;
        }
        .masthead1{
            height: 50vh;
            width: 100%;
        }
        h1.font-weight-light.headertext{
            font-size: 8vw;
        }
        p.lead.headertext{
            font-size: 5vw;
        }
        h5{
            font-size:5vw;
            padding-right: 20vw;
        }


        .quantity{
            display: none;
        }
        #product-quantity > span{
            display:none;
        }
        .product-container{
            padding: 0;
            margin: 0;
            font-size: 4vw;
        }
        p{
            font-size: 4vw;
        }
        #paypal-button{
            width: 80vw;
            margin-left: 12vw;
            padding-bottom: 15vh;
        }

        h5.total{
            margin-left:20vw;
        }
    }
</style>


</head>
<body>

<!-- Navigationbar -->
<?php
session_start();
if (isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    include ("templates/logged_nav.php");
} elseif (isset($_SESSION['user']) && isset($_SESSION['admin'])) {
    include ("templates/admin_nav.php");
} else {
    include ("templates/NavBar.php");
}?>

<!-- Banner image inclusive text -->
<header class="masthead1">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light headertext">Shopping Cart</h1>
                <p class="lead headertext">Got everything? <i class="far fa-smile-wink"></i></p>
            </div>
        </div>
    </div>
</header>

<div class="product-container">
    <div class="product-header">
        <h5 class="title">PRODUCT</h5>
        <h5 class="price">PRICE</h5>
        <h5 class="quantity">QUANTITY</h5>
        <h5 class="total">TOTAL</h5>
    </div>
    <div class="products" id="info"></div>
    <div id="cart-total"></div>
</div>

<script src="js/editbeats.js"></script>

<!-- PAYPAL -->
<script src="https://www.paypal.com/sdk/js?client-id=AZZF-8yg1RPaWYWeFxplU7NAKTUJv8BRrtXQZ-UtEZhJmslL79BeGbZnobZXJ5dT5A8CG9mCbIjaYoOL&currency=EUR"></script>
<div id="paypal-button"><p>Choose your payment method:</p></div>
<script>
    let totalprice = localStorage.getItem("total");
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalprice
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed. ' + details.payer.name.given_name + ' be ready to copy the download links now!');
                showDownload();
                localStorage.clear();
            });
        },
        style: {
            size: 'responsive',
            color: 'gold'
        }
    }).render('#paypal-button');
</script>

<!-- SHOW PAYMENT -->
<script>
    let cartItems = localStorage.getItem("productsInCart");
    let payButtons = document.getElementById("paypal-button");
    if (cartItems != null) {
        payButtons.setAttribute("style", "display: block");
    } else {
        payButtons.setAttribute("style", "display: none");
    }
</script>
<script src="js/cart.js"></script>

<!-- Footer -->
<?php include ("templates/footer.php")?>

</body>
</html>