<?php
include_once "db_config.php";

class Api
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB_con();
        $this->db = $this->db->ret_obj();
    }

    public function change_pass($param)
    {
        $pass = md5($param[0]);

        $query = "UPDATE users SET upass = '$pass' WHERE uid = $param[1]";

        $result = $this->db->query($query) or die($this->db->error);
    }

    public function get_users_data(): string
    {
        $users = array();
        $query = "SELECT * FROM users";
        $result = $this->db->query($query) or die($this->db->error);

        while ($user = mysqli_fetch_assoc($result)) {
            $users[] = $user;
        }
        $users = json_encode($users);
        echo '(' . $users . ')';

        //http://{HOSTNAME}/apiClient.php?access_token=32f1bece4e395075f294136f442c902e&method=get_users_data
    }

    public function insert_new_user()
    {
        if (isset($_POST['uname']) && isset($_POST['upass']) && isset($_POST['fullname']) && isset($_POST['uemail'])) {
            $uanme = $_POST['uname'];
            $uemail = $_POST['uemail'];
            $fullname = $_POST['fullname'];
            $upass = $_POST['upass'];

            $query = "INSERT INTO users SET uname='$uanme', upass='$upass', fullname='$fullname', uemail='$uemail'";
            $result = $this->db->query($query) or die($this->db->error);
        }
    }
}










