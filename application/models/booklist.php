<?php

class Booklist extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Booklist";
		$this->_table1 = "booklist.booklist";
        $this->_table2 = "booklist.booklist_book";
        $this->_table3 = "book.book";
	}

    function selectBooklistID($user_id = null) {
        if ($user_id == null) $user_id = $_SESSION["user_id"];

        /** Intialize return variable **/
        $booklist_ids = array();

        /** Main query **/
        $query = 'select booklist_id from `' . $this->_table1 . '` where user_id = ' . $user_id . ';';

        /** Object return by query **/
        $objects = $this->query($query);

        /** Edit data to return **/
        foreach ($objects as $object) {
            $booklist_id = $object["Booklist.booklist"]["booklist_id"];
            array_push($booklist_ids, $booklist_id);
        }

        return $booklist_ids;
    }

    function selectBooklistNameByBooklistID($booklist_id) {
        $query = 'select name from `' . $this->_table1 . '` where booklist_id = ' . $booklist_id . ';';
        
        $object = $this->query($query);

		$booklist_name = $object[0]["Booklist.booklist"]["name"];

        return $booklist_name;
    }

    function selectBookIDByBooklistID($booklist_id) {
        $book_ids = array();

        $query = 'select book_id from `' . $this->_table2 . '` where booklist_id = ' . $booklist_id . ';';

        $objects = $this->query($query);

        foreach ($objects as $object) {
			$book_id = $object["Booklist.booklist_book"]["book_id"];
			array_push($book_ids, $book_id);
		}

        return $book_ids;
    }

    function selectTitleByBookID($book_id) {
        $query = 'select title from `' . $this->_table3 . '` where book_id = ' . $book_id . ';';

        $object = $this->query($query);

        $title = $object[0]["Book.book"]["title"];

        return $title;
    }

    /** Check if a booklist_id exists **/
    function checkBooklistID($booklist_id) {
        $query = 'select * from `'. $this->_table1 . '` where booklist_id = ' . $booklist_id . ';';

        if ($this->query($query)) return true;
        else return false;
    }

    function addBookToBooklist($booklist_id, $book_id) {
        
        $query = 'insert into `' . $this->_table2 . '` values (' . strval($booklist_id) . ', ' . strval($book_id) . ');';

        $this->query($query);

        return null;
    }

    function addBooklist($name) {
        $user_id = $_SESSION["user_id"];

        $booklist_id = 1;
        while ($this->checkBooklistID($booklist_id)) {
            $booklist_id++;
        }
        $date = date("Y-m-d");

        $query = 'insert into `' . $this->_table1 . '` values (' . strval($booklist_id) . ', "' . $name . '", ' . strval($user_id) . ', "' . $date .'");';

        $this->query($query);

        return null;
    }

    function deleteBooklist($booklist_id) {
        $query1 = 'delete from `' . $this->_table2 . '` where booklist_id = ' . $booklist_id . ';'; 
        $query2 = 'delete from `' . $this->_table1 . '` where booklist_id = ' . $booklist_id . ';';

        $this->query($query1);
        $this->query($query2);

        return null;
    }

}
