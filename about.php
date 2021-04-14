<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>

    <script src="https://kit.fontawesome.com/0e43f3f9a9.js" crossorigin="anonymous"></script>
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
            .about-section {
                padding: 10vw;
                padding-top: 20vh;
                font-size: 4vw;
                text-align: center;
                background-color: white;
                color: grey;
                height: auto;
                vertical-align: center;
                min-height: 97vh;
            }
            h1{
                font-size: 5vw;
            }
        }

        @media screen and (min-width: 1080px){
            .about-section {
                padding: 260px;
                margin: 0px;
                font-size: 1.5vw;
                text-align: center;
                background-color: white;
                color: grey;
                height: auto;
                vertical-align: center;
                min-height: 97vh;
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

<div class="about-section">
    <h1>About Us</h1>
    <p>MusicR is a Webshop created to provide a platform for music artists who are searching for professional beats.</p>
    <p>Our Team consists of three Members: Alexander Bauer, Sebastian Chmel, Fabio Birnegger</p>
    <p>We hope you like our Website! If you have any feedback or recommendations feel free to use our <a href="contact.php"> Contact Formular</a>!</p>
    <br>
    <br>
    <p>Back to the Home Page? <a href="/musicr">Click Here</a></p>
</div>

<script src="js/cart.js"></script>

<!-- Footer -->
<?php include ("templates/footer.php")?>

</body>
</html>