<?php

class Account extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Acoount";
		$this->_table1 = "user.user";
        $this->_table2 = "user.librarian";
        $this->_table3 = "user.member";
        $this->_table4 = "user.email_address";
        $this->_table5 = "user.phone_number";
        $this->_table6 = "user.password";
	}

    function selectUsernameByUserID($user_id) {
        $query = 'select account_name from `' . $this->_table1 . '` where user_id = ' . $user_id . ';';
        
        $object = $this->query($query);

		$username = $object[0]["User.user"]["account_name"];

        return $username;
    }

    function selectName() {
        $user_id = $_SESSION["user_id"];
        $name = "";

        $query1 = 'select * from `' . $this->_table2 . '` where librarian_id = ' . $user_id . ';';
        $query2 = 'select * from `' . $this->_table3 . '` where member_id = ' . $user_id . ';';

        if ($this->query($query1)) {
            $query = 'select concat(coalesce(concat(last_name, " "), ""), coalesce(concat(middle_name, " "), ""), coalesce(first_name)) as name from `' . $this->_table2 . '` where librarian_id = ' . $user_id . ';';
            
            $object = $this->query($query);
            
            $name = $object[0][""]["name"];
        }
        else if ($this->query($query2)) {
            $query = 'select concat(coalesce(concat(last_name, " "), ""), coalesce(concat(middle_name, " "), ""), coalesce(first_name)) as name from `' . $this->_table3 . '` where member_id = ' . $user_id . ';';
            
            $object = $this->query($query);
            
            $name = $object[0][""]["name"];
        }

        return $name;
    }

    function selectEmailAddress() {
        $user_id = $_SESSION["user_id"];

        $query = 'select email_address from `' . $this->_table4 . '` where user_id = ' . $user_id . ';';

        $object = $this->query($query);

        $email = $object[0]["User.email_address"]["email_address"];

        return $email;
    }

    function selectPhoneNumber() {
        $user_id = $_SESSION["user_id"];

        $query = 'select phone_number from `' . $this->_table5 . '` where user_id = ' . $user_id . ';';

        $object = $this->query($query);

        $phone_number = $object[0]["User.phone_number"]["phone_number"];

        return $phone_number;
    }

    function editInfo($name, $email, $phone_number) {
        $user_id = $_SESSION["user_id"];
        $date = date("Y-m-d");

        $query1 = 'update `' . $this->_table3 . '` set first_name = "' . $name . '" where user_id = ' . $user_id . ';';
        $query2 = 'update `' . $this->_table4 . '` set email_address = "' . $email . '", modified_date = "' . $date . '" where user_id = ' . $user_id . ';';
        $query3 = 'update `' . $this->_table5 . '` set phone_number = "' . $phone_number . '", modified_date = "' . $date . '" where user_id = ' . $user_id . ';';

        $this->query($query1);
        $this->query($query2);
        $this->query($query3);
        
        return null;
    }
}
