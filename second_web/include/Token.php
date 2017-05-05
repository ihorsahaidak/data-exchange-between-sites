<?php
include_once "db_config.php";

class Token
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB_con();
        $this->db = $this->db->ret_obj();
    }

    public function getToken($login, $user_id)
    {
        $date_today = date('Y-m-d H:i:s');
        $query = "SELECT * FROM tokens WHERE login='$login' AND DATE(date_to) >= '$date_today'";
        $result = $this->db->query($query) or die($this->db->error);
        $count_row = $result->num_rows;
        if ($count_row == 1) {
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            echo $user_data['token'];
        } else {
            $token = md5(uniqid(rand(), true));
            $date_to = date('Y-m-d H:i:s', strtotime('+1 month'));
            $query = "INSERT INTO tokens SET date_to='$date_to', token='$token', login='$login', user_id='$user_id'";
            $result = $this->db->query($query) or die($this->db->error);
            echo $token;
        }
    }
}