<?php
include "db_config.php";

class User
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB_con();
        $this->db = $this->db->ret_obj();
    }

    public function reg_user($name, $username, $password, $email)
    {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE uname='$username' OR uemail='$email'";

        $result = $this->db->query($query) or die($this->db->error);

        $count_row = $result->num_rows;

        if ($count_row == 0) {
            $query = "INSERT INTO users SET uname='$username', upass='$password', fullname='$name', uemail='$email'";

            $result = $this->db->query($query) or die($this->db->error);

            $token = file_get_contents('http://patterns.local/second_web/tokenClient.php?get_token=1&login=admin1&password=1111');

            $data = array("uname" => $username, "upass" => $password, "fullname" => $name, "uemail" => $email);
            $string = http_build_query($data);

            $ch = curl_init("http://patterns.local/second_web/apiClient.php?access_token=".$token."&method=insert_new_user");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);

            return true;
        } else {
            return false;
        }
    }

    public function check_login($uemail, $password)
    {
        $password = md5($password);

        $query = "SELECT uid from users WHERE uemail='$uemail' AND upass='$password'";

        $result = $this->db->query($query) or die($this->db->error);

        $user_data = $result->fetch_array(MYSQLI_ASSOC);

        $count_row = $result->num_rows;

        if ($count_row == 1) {
            $_SESSION['login'] = true;
            $_SESSION['uid'] = $user_data['uid'];
            return true;
        } else {
            return false;
        }
    }

    public function get_fullname($uid)
    {
        $query = "SELECT fullname FROM users WHERE uid = $uid";

        $result = $this->db->query($query) or die($this->db->error);

        $user_data = $result->fetch_array(MYSQLI_ASSOC);
        echo $user_data['fullname'];
    }

    public function get_session()
    {
        return $_SESSION['login'];
    }

    public function user_logout()
    {
        $_SESSION['login'] = FALSE;
        unset($_SESSION);
        session_destroy();
    }

}