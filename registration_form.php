<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>

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

        .containerreg {
            padding: 8%;
            background-color: white;
            width: 80%;
            height: 70%;
            margin-left: 10%;
        }

       .registrationinputs {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .registrationinputs:focus {
            background-color: #ddd;
            outline: none;
        }

        .regbutton {
            width: 100%;
            height: 6vh;
            background-color: #4167d0;
            color: white;
        }
        .error {
            color: red;
        }

        @media screen and (max-width: 1079px){
            .containerreg {
                background-color: white;
                width: 100%;
                height: 97vh;
                padding:5%;
                margin:0;
                font-size: 5vw;
            }
            .registrationinputs {
                width: 100%;
                height: 5vh;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }
            h1{
                padding-top:8vh;
                font-size: 6vw;
            }
        }

    </style>
</head>
<?php
session_start();?>
<body>

<!-- Navigationbar -->
<?php include ("templates/NavBar.php")?>

<form action="backend/api/users/user_db.php" method="post">
    <div class="containerreg">
        <h1>Registration</h1>
        <p>Create Your own Account here!</p>
        <hr>

        <label><b>Username</b></label>
        <?php if (isset($_SESSION['nameerror'])) {?>
            <span class="error"><?php echo $_SESSION['nameerror'];?></span>
        <?php } ?>
        <br>
        <input class="registrationinputs" type="text" name="username" placeholder="Enter Username" minlength="5" required>
        <br>

        <label><b>Email Address</b></label>
        <?php if (isset($_SESSION['emailerror'])) {?>
            <span class="error"><?php echo $_SESSION['emailerror'];?></span>
        <?php } ?>
        <br>
        <input class="registrationinputs" type="text" name="email" placeholder="Enter Email" minlength="5" required>
        <br>

        <label><b>Password</b></label>
        <br>
        <input class="registrationinputs" type="password" name="password" placeholder="Enter Password" minlength="6" required>
        <br>

        <label><b>Repeat Password</b></label>
        <br>
        <input class="registrationinputs" type="password" name="passwordrep" placeholder="Repeat Password" minlength="6" required>
        <hr>
        <span id="message"></span>
        <button class="regbutton" type="submit" name = "register" value="register">Register</button>
    </div>

</form>
<script src="js/cart.js"></script>
<!-- Footer -->
<?php include ("templates/footer.php")?>
</body>
<?php
$_SESSION['nameerror'] = null;
$_SESSION['emailerror'] = null;?>
</html>