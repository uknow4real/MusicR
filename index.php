<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MusicR</title>
    <script src="https://kit.fontawesome.com/0e43f3f9a9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <style>
        @media screen and (max-width: 1079px){
            #fronttext{
                font-size: 10vw;
            }
            #text2{
                font-size: 5vw;
            }
            .masthead1{
                height: 80vh;
            }

            #mainsectionid > div > table > tbody > tr:nth-child(2) > td > b{
                font-size: 4vw;
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
                <h1 id= "fronttext" class="font-weight-light headertext">You found the best Webshop for professional beats!</h1>
                <p id = "text2" class="lead headertext">Try it yourself!</p>
            </div>
        </div>
    </div>
</header>
<script src="js/cart.js"></script>

<!-- Main section -->
<div id="mainsectionid" class="py-5">
    <div class="container" style="overflow-x:auto">
        <table class="icontable">
            <tr>
                <th scope="col"><a href="about.php"><i class="fas fa-address-card fa-10x" style="color:black"></i></a></th>
                <th scope="col"><a href="explore.php"><i class="fas fa-compact-disc fa-10x" style="color:black"></i></a></th>
                <th scope="col"><a href="contact.php"><i class="fas fa-file-signature fa-10x" style="color:black"></i></a></th>
            </tr>
            <tr>
                <td><b>About Us</b></td>
                <td><b>Explore the Beats</b></td>
                <td><b>Contact Us</b></td>
            </tr>
        </table>
    </div>
    <br>
</div>

<!-- Footer -->
<?php include ("templates/footer.php")?>

</body>
</html>