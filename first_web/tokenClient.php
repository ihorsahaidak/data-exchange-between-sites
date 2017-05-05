<?php
include_once "include/Token.php";
include_once "error.php";
$con = mysqli_connect("localhost", DB_USERNAME, DB_PASSWORD, DB_DATABASE);


if (isset($_GET['get_token']) && $_GET['get_token'] == 1) {
    $login = $_GET['login'];
    $pass = $_GET['password'];
    $md5_pass = md5($pass);
    if (isset($login) && !empty($login)) {
        if (isset($pass) && !empty($pass)) {
            $sql = "SELECT * FROM users WHERE uname='$login' AND upass='$md5_pass'";
            if ($result = mysqli_query($con, $sql)) {
                $rowcount = mysqli_num_rows($result);
            }
            if ($rowcount == 1) {
                $row = $result->fetch_array(MYSQLI_NUM);
                $token = new Token();
                $token->getToken($_GET['login'], $row[0]);
            } else {
                Error(4, "Login or Password is empty or incorect");
            }
        } else {
            Error(2, "Password is empty or incorect");
        }
    } else {
        Error(1, "Login is empty or incorect");
    }
} else {
    Error(3, "get_token should be equal 1 !!");
}

//example link to get token http://{HOSTNAME}/tokenClient.php?get_token=1&login=admin2&password=1111