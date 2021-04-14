<?php
$root = $_SERVER['HTTP_HOST'];
session_start();
$_SESSION['user'] = null;
$_SESSION['role'] = null;
$_SESSION['username'] = null;
$_SESSION['email'] = null;
$_SESSION['admin'] = null;
header("refresh:2; http://$root/musicr/");