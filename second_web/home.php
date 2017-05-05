<?php
session_start();
include_once 'include/class.user.php';
include_once "include/db_config.php";

$con = mysqli_connect("localhost", DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$user = new User();

$uid = $_SESSION['uid'];

if (!$user->get_session()) {
    header("location:login.php");
}

if (isset($_GET['q'])) {
    $user->user_logout();
    header("location:login.php");
}

if(isset($_POST['new_pass'])){
    $pass = md5($_POST['new_pass']);
    $uid = $_SESSION['uid'];
    $query = "UPDATE users SET upass = '$pass' WHERE uid = $uid";
    $result = mysqli_query($con, $query);
    $token = file_get_contents('http://patterns.local/laravel_first/tokenClient.php?get_token=1&login=admin1&password=1111');
    file_get_contents("http://patterns.local/laravel_first/apiClient.php?access_token=$token&method=change_pass&param=".$_POST['new_pass'].".".$_SESSION['uid']);
    header("location: home.php");
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
<div id="container" class="container">
    <div id="header">
        <a href="home.php?q=logout">LOGOUT</a>
    </div>
    <div id="main-body">
        <br/>
        <br/>
        <br/>
        <br/>
        <h1>Hello <?php $user->get_fullname($uid); ?> <br> it is us Red website!</h1>
        <br>
        to change password type new and click submit button <br>
        <form action="home.php" method="post">
            <input type="password" placeholder="New Password" name="new_pass" autocomplete="off">
            <br>
            <input type="submit">
        </form>
    </div>
    <div id="footer"></div>
</div>
</body>

</html>