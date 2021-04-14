<?php session_start();?>
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

        @media screen and (min-width: 1080px){
            form {
                background-color: white;
                width: 80%;
                min-height: 90vh;
                margin-left: 10%;
                margin-top: 6%;
            }

            .registrationinputs {
                width: 90%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            .containerreg {
                padding: 10%;
                padding-top: 5%;
                background-color: white;
            }
        }

        @media screen and (max-width: 1079px){
            form {
                background-color: white;
                padding-top: 10vh;
                min-height: 97vh;
                padding-left: 4vw;
            }

            body > form > div > h1{
                font-size: 7vw;
            }

            .registrationinputs {
                padding: 2%;
                margin-top: 0;
                background-color: white;
                min-height: 5vh;
                font-size: 5vw;
            }
            .containerreg {
                border: none;
                height: 6vh;
                color: black;
                font-size: 5vw;
            }
            body > form > div > input{
                height:1vh;
                width: 80vw;

            }

        }

        .registrationinputs:focus {
            background-color: #ddd;
            outline: none;
        }

        .changebutton {
            background-color: #4167d0;
            color: white;
        }
        #your-orders {

        }
    </style>
</head>


<body>

<!-- Navigationbar -->
<?php
if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: /musicr");
} else {
    if (isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
        include ("templates/logged_nav.php");
    } elseif (isset($_SESSION['user']) && isset($_SESSION['admin'])) {
        include ("templates/admin_nav.php");
    }
}?>

<form action="backend/api/users/user_db.php" method="post">
    <div class="containerreg">
        <h1>Profile</h1>
        <p></p>
        <hr>

        <label><b>Username</b></label>
        <br>
        <?php echo $_SESSION['username'];?>
        <br>
        <br>

        <label><b>Email Address</b></label>
        <br>
        <?php echo $_SESSION['email'];?>
        <br>
        <br>


        <label><b>Change Password</b></label>
        <br>
        <input class="registrationinputs" type="password" name="newpassword" placeholder="Enter Password" minlength="6" required>
        <br>

        <label><b>Repeat Password</b></label>
        <br>
        <input class="registrationinputs" type="password" name="newpasswordrep" placeholder="Repeat new Password" minlength="6" required>
        <hr>
        <button class="changebutton" type="submit" name="pwchange" value="pwchange" >Change Password</button>
    </div>
</form>
<script src="js/cart.js"></script>
<!-- Footer -->
<?php include ("templates/footer.php")?>
</body>
</html>