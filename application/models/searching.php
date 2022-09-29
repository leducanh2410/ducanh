<?php

class Searching extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Searching";
        $this->_table1 = "book.book";
	}

    function searchBookIDByTitle($title) {
        $book_ids = array();

        $query = 'select book_id from `' . $this->_table1 . '` where title like "%' . $title . '%";';

        $objects = $this->query($query);

        foreach ($objects as $object) {
			$book_id = $object["Book.book"]["book_id"];
			array_push($book_ids, $book_id);
		}

        return $book_ids;
    }

    function selectTitleByBookID($book_id) {
        $query = 'select title from `' . $this->_table1 . '` where book_id = ' . $book_id . ';';

        $object = $this->query($query);

        $title = $object[0]["Book.book"]["title"];

        return $title;
    }
}
