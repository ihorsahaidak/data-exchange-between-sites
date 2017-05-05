<?php
session_start();
include_once 'include/class.user.php';
include_once "include/db_config.php";

$con = mysqli_connect("localhost", DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$user = new User();

if (isset($_POST['submit'])) {
    extract($_POST);
    $login = $user->check_login($uemail, $password);
    if ($login) {
        // Registration Success
        header("location:home.php");
    } else {
        // Registration Failed
        echo '<span style="color:red">Wrong username or password</span>';
    }
}
$sql = "SELECT uname FROM users";
$result = mysqli_query($con, $sql);
$users = [];
while ($user = mysqli_fetch_assoc($result)) {
    $users[] = $user;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>

<body>
<div id="container" class="container">
    <h1>Login Here <br> it is us Blue website!</h1>
    <form action="" method="post" name="login">
        <table class="table " width="400">
            <tr>
                <th>Email:</th>
                <td>
                    <input type="text" name="uemail" required>
                </td>
            </tr>
            <tr>
                <th>Password:</th>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input class="btn" type="submit" name="submit" value="Login" onclick="return(submitlogin());">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><a href="registration.php">Register new user</a></td>
            </tr>

        </table>
    </form>
    <h4>List of registered users</h4>
    <?php
    array_walk($users, function ($i) {
        echo $i['uname'] . "<br>";
    });
    ?>
</div>
<script>
    function submitlogin() {
        var form = document.login;
        if (form.uemail.value == "") {
            alert("Enter email or username.");
            return false;
        } else if (form.password.value == "") {
            alert("Enter password.");
            return false;
        }
    }
</script>


</body>