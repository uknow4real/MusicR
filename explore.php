<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Explore</title>

    <script src="https://kit.fontawesome.com/0e43f3f9a9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Allerta' rel='stylesheet'>

</head>

<style>

    body {
        background-color: #e2e3e5;
        min-height: 90vh;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 90%;
        horiz-align: center;
        margin: 50px;
        min-height: 40vh;
    }

    td {
        padding-left: 30px;
        border-right: 1px solid;
        border-right-color: #acacac;
    }

    th {
        padding-left: 30px;
    }

    audio {
        width: 95%;
    }

    #searchfield {
        border-radius: 12px;
        width: 60%;
    }

    .titlefield {
        width: 10%;
    }

    .playfield {
        width: 30%;
    }

    .add-cart {
        padding-left: 7px;
        background-color: black;
        text-align: center;
    }

    .add-cart a {
        transition: all 0.3s ease-in-out;
        text-decoration: none;
        color: white;
        display: block;
        width: 100%;
    }

    .add-cart:hover {
        text-decoration: none;
        color: #e9ecef;
        background-color: #4167d0;
    }

    @media screen and (max-width: 1079px) {
        body > header > div > div > div > h1 {
            font-size: 8vw;
        }

        body > header > div > div > div > p:nth-child(2) {
            font-size: 6vw;
        }

        #searchfield {
            width: 90vw;
            height: 7vh;
            min-height: 80px;
        }

        body > header > div > div > div > p:nth-child(5) > input[type=submit]:nth-child(2) {
            width: 80vw;
            height: 4vh;
            min-height: 50px;
        }


        div {
            max-width: 100vw;
        }

        #beats > tbody:nth-child(1) > tr > th {
            font-size: 4vw;

        }


        #beats {
            font-size: 3vw;
        }

        #beats > tbody:nth-child(1) > tr > th:nth-child(2) {
            padding-right: 20vw;
        }


        #beats > tbody:nth-child(1) > tr > th:nth-child(4) {
            display: none;
        }

        #beats > tbody > tr > td:nth-child(5) {
            display: none;
        }

        #beats > tbody:nth-child(1) > tr > th:nth-child(5) {
            display: none;
        }

        #beats > tbody > tr > td:nth-child(4) {
            display: none;
        }


        #beats > tbody:nth-child(1) > tr > th:nth-child(3) {
            padding: 0;
            margin: 0;
        }


        #beats > tbody > tr > td:nth-child(3) {
            margin: 0;
            padding: 0 0 0 2vw;
        }

        #beats > tbody:nth-child(1) > tr > th:nth-child(1) {
            padding: 0;
            margin: 0;
        }

        #beats > tbody > tr > td:nth-child(1) {
            padding: 0;
            margin: 0;
        }

        #searchfield {
            font-size: 4vw;
        }


    }


    #beats {

    }
</style>

<body>

<!-- Navigationbar -->
<?php
session_start();
if (isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    include("templates/logged_nav.php");
} elseif (isset($_SESSION['user']) && isset($_SESSION['admin'])) {
    include("templates/admin_nav.php");
} else {
    include("templates/NavBar.php");
} ?>
<!-- Header Image -->
<header class="masthead2">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light headertext">Beats</h1>
                <p class="lead headertext">Find what you are looking for</p>
                <br><br>
                <p class="lead headertext">
                    <input id="searchfield" type="text" placeholder=" Producer, Key, BPM ...">
                    <input type="submit" name="submit" value="Search">
                </p>
            </div>
        </div>
    </div>
</header>

<!-- Beat Tabelle -->
<div style="overflow-x:auto">
    <table id="beats">
        <tr>
            <th>Title</th>
            <th>Listen</th>
            <th>Producer</th>
            <th>Key</th>
            <th>BPM</th>
            <th>Price</th>
        </tr>
    </table>
</div>

<script src="js/main.js"></script>

<!-- Footer -->
<?php include("templates/footer.php") ?>

</body>
</html>


