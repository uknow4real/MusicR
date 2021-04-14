<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>

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


        h1 {
            color: black;
        }


        label {
            margin: 10px;

        }



        @media screen and (min-width: 1080px){
            .contact-form {
                padding: 2%;
                margin-left: 25vw;
                margin-top: 8vh;
                background-color: white;
                margin-right:21vw;
                min-height: 95vh;
            }
            .submit {
                width: 100%;
                border: none;
                background-color: #4167d0;
                height: 50px;
                color: white;
            }
        }

        @media screen and (max-width: 1079px){
            .contact-form {
                padding: 2%;
                margin-top: 8vh;
                background-color: white;
                min-height: 90vh;
                font-size: 5vw;
            }
            .submit {
                width: 100%;
                border: none;
                background-color: #4167d0;
                min-height: 6vh;
                color: white;
            }
        }

        .contactinputs, select, textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .contactinputs:focus, select:focus {
            background-color: #ddd;
            outline: none;
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
<!-- Kontakt Formular -->
<div class="contact-form">

    <form action="backend/api/users/user_db.php" method="post" onsubmit="">
    <h1>Contact Form</h1>
    <label>Name</label>
    <br>
    <input class="contactinputs" type="text" name="name" placeholder="Name..">
    <br>

    <label>Subject</label>
    <br>
    <input class="contactinputs" type="text" name="header" placeholder="Subject..">
    <br>

    <label>E-mail</label>
    <br>
    <input class="contactinputs" type="text" name="email" placeholder="E-mail..">
    <br>


    <label for="message">Message</label>
    <br>
        <textarea id="message" rows="4" cols="100" placeholder="Your message.." name ="message"></textarea>

<br><br>

    <button class= "submit" type="submit" name="submit" value="Submit">Submit</button>
</form>
</div>

<script src="js/cart.js"></script>

<!-- Footer -->
<?php include ("templates/footer.php")?>

<!-- After 10 seconds, redirect to a different page. In this case, Google. -->

<!-- The PHP logic begins. -->
<?php

?>

</body>
</html>