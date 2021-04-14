<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">

    <style>
        body {
            font-family: Arial;
            background-color: #343a40;
        }

        html {
            box-sizing: border-box;
        }

        a {
            color: #ababab;
        }

        @media screen and (max-width: 1079px){
            .thanks-section {
                margin: 0px;
                font-size: 5vw;
                text-align: center;
                background-color: white;
                color: black;
                height: auto;
                vertical-align: center;
                horiz-align: center;
                min-height: 94vh;
                padding: 30vh 260px 260px;
            }
            div h1{
                font-size: 8vw;
            }
        }

        @media screen and (min-width: 1080px){
            .thanks-section {
                padding: 260px;
                margin: 0px;
                text-align: center;
                background-color: white;
                color: black;
                height: auto;
                vertical-align: center;
                horiz-align: center;
                min-height: 94vh;
            }
        }



    </style>
</head>
<body>



<div class="thanks-section">
    <h1>Thank you for your submission!</h1>
    <p>You'll be redirected to the home screen within a few seconds</p>

</div>

<script src="js/cart.js"></script>
<?php
header("refresh:3; /musicr/index.php");
?>

</body>
</html>