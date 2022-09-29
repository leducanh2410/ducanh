<?php
class Signup extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Signup";
		$this->_table1 = "user.user";
        $this->_table2 = "user.email_address";
        $this->_table3 = "user.member";
        $this->_table4 = "user.password";
        $this->_table5 = "user.phone_number";
        $this->_table6 = "booklist.booklist";
	}

    function checkUserID($user_id) {
        $query = 'select * from `' . $this->_table1 . '` where user_id = ' . strval($user_id) . ';';

        if ($this->query($query)) return true;
        else return false;
    }

    function checkUsername($username) {
        $query = 'select * from `' . $this->_table1 . '` where account_name = "' . $username . '";';

        if ($this->query($query)) return true;
        else return false;
    }

    function addName($user_id, $name) {
        $date = date("Y-m-d");
        $query = 'insert into `' . $this->_table3 . '` values (' . $user_id . ', "' . $name . '", "", "");';

        return $this->query($query);
    }

    function addEmail($user_id, $email) {
        $date = date("Y-m-d");
        $query = 'insert into `' . $this->_table2 . '` values (' . $user_id . ', "' . $email . '", "' . $date . '");';

        return $this->query($query);
    }

    function addPhoneNumber($user_id, $phone_number) {
        $date = date("Y-m-d");
        $query = 'insert into `' . $this->_table5 . '` values (' . $user_id . ', "' . $phone_number . '", "' . $date . '");';

        return $this->query($query);
    }

    function addPassword($user_id, $password) {
        $date = date("Y-m-d");
        $query = 'insert into `' . $this->_table4 . '` values (' . $user_id . ', "' . $password . '", "", "' . $date . '");';

        return $this->query($query);
    }

    function addUser($username) {
        $user_id = 1;
        while ($this->checkUserID($user_id)) {
            $user_id++;
        }
        $date = date("Y-m-d");

        $query = 'insert into `' . $this->_table1 . '` values (' . $user_id . ', "' . $username . '", "' . $date .'");';

        $this->query($query);

        return $user_id;
    }

    function checkBooklistID($booklist_id) {
        $query = 'select * from `' . $this->_table6 . '` where booklist_id = ' . strval($booklist_id) . ';';

        if ($this->query($query)) return true;
        else return false;
    }

    function addBooklist($user_id) {
        $date = date("Y-m-d");

        $booklist_id = 1;
        while ($this->checkBooklistID($booklist_id)) {
            $booklist_id++;
        }

        $query1 = 'insert into `' . $this->_table6 . '` values (' . $booklist_id++ . ', "Returned", ' . $user_id . ', "' . $date .'");';

        while ($this->checkBooklistID($booklist_id)) {
            $booklist_id++;
        }

        $query2 = 'insert into `' . $this->_table6 . '` values (' . $booklist_id++ . ', "Borrowing", ' . $user_id . ', "' . $date .'");';

        while ($this->checkBooklistID($booklist_id)) {
            $booklist_id++;
        }

        $query3 = 'insert into `' . $this->_table6 . '` values (' . $booklist_id++ . ', "PlanToBorrow", ' . $user_id . ', "' . $date .'");';

        $this->query($query1);
        $this->query($query2);
        $this->query($query3);

        return $user_id;
    }

}
