<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Beats</title>

    <script src="https://kit.fontawesome.com/0e43f3f9a9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Allerta' rel='stylesheet'>
    <style>

        body {
            padding: 10%;
            text-align: center;
            background-color: white;
        }
        .signinbutton {
            margin-left: 5%;
            background-color: #4167d0;
            border: none;
            margin-top: 7%;
            color: white;
        }

    </style>
</head>

<body>

<!-- Navigationbar -->
<?php
if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: /musicr");
} else if (isset($_SESSION['user']) && isset($_SESSION['admin'])) {
    include ("templates/admin_nav.php");
}
$id = $_POST['id'];
?>

<script src="js/editbeats.js"></script>
<!-- Edit -->
<div style="overflow-x:auto">
    <input type="text" placeholder="New Title" id="newtitle">

    <button class="signinbutton" type="submit" onclick="updateBeat(<?php echo $id?>)">Change</button>
</div>

</body>
</html>