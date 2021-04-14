<?php
session_start();

// Allow every Webpage to use the service
header("Access-Control-Allow-Origin: *");
// Defines the responding Content-Type
header("Content-Type: application/json; charset=UTF-8");
// Defines the supported Methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$root = $_SERVER['DOCUMENT_ROOT'];

require_once "$root/Musicr/backend/api/config/database.php";
require_once "$root/Musicr/backend/api/objects/user.php";

$method = $_SERVER['REQUEST_METHOD'];

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$stmt = $user->read();
$num = $stmt->rowCount();

switch ($method) {
    case "GET":
        if ($num>0) {

            $user_arr=array();
            $user_arr["users"]=array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    extract($row);

                    $user_res = array(
                        "id" => $id,
                        "role" => $role,
                        "username" => $username,
                        "email" => $email,
                        "pass" => $pass,
                    );
                    array_push($user_arr["users"], $user_res);
            }
            http_response_code(200);
            $users = json_encode($user_arr);
            echo $users;
        }
        break;
    case "POST":
        if (isset ($_POST['register'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordrep = $_POST['passwordrep'];

            $user_ver = $user->search("username", $username);
            $user_exists = $user_ver->rowCount();

            $email_ver = $user->search("email", $email);
            $email_exists = $user_ver->rowCount();

            if (empty($username) && empty($email) && empty($password) && empty($passwordrep)) {
                echo "Invalid Parameters";
            } else {
                if ($password == $passwordrep) {
                    if ($user_exists == 0 && $email_exists == 0) {
                        $user->create($username, $email, $password, "guest");
                        http_response_code(201);
                        header("refresh:2; /musicr/inc/user_success.php");
                    } else {
                        if ($user_exists > 0) {
                            $_SESSION['nameerror'] = "Username already taken! Please choose a different.";
                        }
                        if ($email_exists > 0) {
                            $_SESSION['emailerror'] = "Account with this email already exists! Try logging in.";
                        }
                        header("refresh:2; /musicr/inc/user_failed.php");
                    }
                } else {
                    header("refresh:2; /musicr/inc/user_failed.php");
                }
            }
        }
        else if (isset ($_POST['pwchange'])) {
            $password = $_POST['newpassword'];
            $passwordrep = $_POST['newpasswordrep'];
            $username =$_SESSION['username'];
            if (empty($password) || empty ($passwordrep)){
                echo "Invalid Parameters";
            }
            else{
                if ($password == $passwordrep){
                    $user->update($password, $username);
                    http_response_code(200);
                    header("refresh:2; /musicr/inc/pw_change.php");
                }
                else {
                    header("refresh:2; /musicr/inc/pw_failed.php");
                }
            }
        }

        else if (isset ($_POST['submit'])){
            // Time to get the variables from the user’s request. Once we execute these four commands, we’ll have the user’s data in our variables.
            if (!empty ($_POST['name']) && !empty ($_POST['email']) && !empty ($_POST['header']) && !empty ($_POST['message'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $header = $_POST['header'];
                $message = $_POST['message'];
                // Creating the email message that we’ll send.
                $mes = "Name: $name \nE-mail: $email \nSubject: $header \nMessage: $message";
                // Trying to send the message using the PHP mailer module.
                $send = mail("MusicRweb@outlook.com", $header, $mes, "From:$email");
                // If send successful:
                if ($send == 'true') {
                    header("refresh:2; /musicr/inc/contact.php");
                } else {
                    echo "Something went wrong";
                    header("refresh:2; /musicr/index.php");
                }
            }
            else {
                echo "Invalid Parameters";
            }
        }
        break;
}