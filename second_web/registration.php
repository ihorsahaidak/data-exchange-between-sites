<?php
include_once 'include/class.user.php';
$user = new User();
if (isset($_POST['submit'])) {
    extract($_POST);
    $register = $user->reg_user($fullname, $uname, $upass, $uemail);
    if ($register) {

        echo "<div style='text-align:center'>Registration successful <a href='login.php'>Click here</a> to login</div>";
    } else {

        echo "<div style='text-align:center; color: red;'>Registration failed. Email or Username already exits please try again.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
<div id="container" class="container">
    <h1>Registration Here <br> it is us Red website!</h1>
    <form action="" method="post" name="reg">
        <table class="table">
            <tr>
                <th>Full Name:</th>
                <td>
                    <input type="text" name="fullname" required>
                </td>
            </tr>
            <tr>
                <th>User Name:</th>
                <td>
                    <input type="text" name="uname" required>
                </td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>
                    <input type="email" name="uemail" required>
                </td>
            </tr>
            <tr>
                <th>Password:</th>
                <td>
                    <input type="password" name="upass" required pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <br>
                    <span>
                        Must contain letter Upper Case, Lower Case <br> Number or SpecialChar and min 6 Chars
                    </span>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input class="btn" type="submit" name="submit" value="Register" onclick="return(submitreg());">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><a href="login.php">Already registered?</a></td>
            </tr>
        </table>
    </form>
</div>
<script>
    function submitreg() {
        var form = document.reg;
        if (form.name.value == "") {
            alert("Enter name.");
            return false;
        } else if (form.uname.value == "") {
            alert("Enter username.");
            return false;
        } else if (form.upass.value == "") {
            alert("Enter password.");
            return false;
        } else if (form.uemail.value == "") {
            alert("Enter email.");
            return false;
        }
    }
</script>
</body>

</html>