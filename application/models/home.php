<?php

class Home extends Model {

    function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Home";
		$this->_table1 = "book.popular";
        $this->_table2 = "book.book";
	}

    function selectPopularBook($limit = 0) {
        $popular_ids = array();

        $query = 'select book_id from `' . $this->_table1 . '` order by favorite_number desc limit ' . strval($limit) . ';';

        $objects = $this->query($query);

        foreach ($objects as $object) {
            $book_id = $object["Book.popular"]["book_id"];
            array_push($popular_ids, $book_id);
        }

        return $popular_ids;
    }

    function selectRecentBook($limit = 0) {
        $recent_ids = array();

        $query = 'select book_id from `' . $this->_table2 . '` order by date_added desc limit ' . strval($limit) . ';';

        $objects = $this->query($query);

        foreach ($objects as $object) {
            $book_id = $object["Book.book"]["book_id"];
            array_push($recent_ids, $book_id);
        }

        return $recent_ids;
    }


    function selectTitleByBookID($book_id) {
        $query = 'select title from `' . $this->_table2 . '` where book_id = ' . $book_id . ';';

        $object = $this->query($query);

        $title = $object[0]["Book.book"]["title"];

        return $title;
    }
}
