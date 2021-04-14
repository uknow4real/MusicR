<?php
session_start();


$username = $_POST['username'];
$password = $_POST['password'];
$root = $_SERVER['HTTP_HOST'];

$users = file_get_contents("http://$root/musicr/backend/api/users/user_db.php");

$arr = json_decode($users, true);

$result = [];
if (!empty($username) && !empty($password)) {
    for($i=0; $i < sizeof($arr['users']); $i++) {
        if ($username == $arr['users'][$i]['username'] || $username == $arr['users'][$i]['email']) {
            if ($password == $arr['users'][$i]['pass']) {
                array_push($result, $arr['users'][$i]);
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $arr['users'][$i]['email'];
            }
        }
    }
}

if (!empty($result)) {
    if ($result[0]['role'] == "admin") {
        $_SESSION['admin'] = "admin";
    }
    $_SESSION['user'] = json_encode($result);
    header("refresh:2; http://$root/musicr/inc/processing.php");
} else {
    echo "Entry not correct. Try again!";
    header("refresh:2; http://$root/musicr/inc/processing.php");
}
