<?php
include_once "include/api.php";
include_once "error.php";
include_once "include/db_config.php";

$con = mysqli_connect("localhost", DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (isset($_GET['access_token']) && !empty($_GET['access_token'])) {
    $access_token = $_GET['access_token'];
    $method = $_GET['method'];
    $date_today = date('Y-m-d H:i:s');
    $param = [];
    $sql = "SELECT * FROM tokens WHERE token='$access_token' AND DATE(date_to) >= '$date_today'";
    if ($result = mysqli_query($con, $sql)) {
        $rowcount = mysqli_num_rows($result);
        //$row = $result->fetch_array(MYSQLI_NUM);
    }
    if (isset($_GET['param']) && !empty($_GET['param'])) {
        $param = explode('.', $_GET['param']);
    }
    if ($rowcount == 1) {
        $API = new Api();
        count($param) == 0 ? $API->{$method}() : $API->{$method}($param);
    } else {
        Error(6, "Incorect API Method !!");
    }
} else {
    Error(5, 'Access token is empty or incorrect');
}