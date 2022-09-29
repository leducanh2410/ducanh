<?php

class Login extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Login";
		$this->_table1 = "user.user";
        $this->_table2 = "user.password";
        $this->_table3 = "user.librarian";
        $this->_table4 = "user.member";
	}

    function getUserID($username) {
        $query = 'select user_id from `' . $this->_table1 . '` where account_name = "' . $username . '";';

        $object = $this->query($query);

        $user_id = null;
        if ($object) {
            $user_id = $object[0]["User.user"]["user_id"];
        }

        return $user_id;
    }

    function getTypeUser($user_id) {
        $type = "";

        $query1 = 'select * from `' . $this->_table3 . '` where librarian_id = ' . $user_id . ';';
        $query2 = 'select * from `' . $this->_table4 . '` where member_id = ' . $user_id . ';';

        if ($this->query($query1)) {
            $type = "librarian";
        }
        else if ($this->query($query2)) {
            $type = "member";
        }

        return $type;
    }

    function checkPassword($user_id, $password) {
        $query = 'select password_hash from `' . $this->_table2 . '` where user_id = ' . $user_id . ';';

        $object = $this->query($query);

        console_log($object);

        $true_password = $object[0]["User.password"]["password_hash"];

        return $password == $true_password;
    }

    function checkLogin($username, $password) {
        $status = false;

        if ($this->getUserID($username)) {
            $user_id = $this->getUserID($username);

            if ($this->checkPassword($user_id, $password)) {
                $status = true;
            }
        }

        return $status;
    }
}