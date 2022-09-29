<?php

class Book extends Model {
    function __construct() {
        $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $this->_model = "Book";
        $this->_table1 = "book.book";
        $this->_table2 = "booklist.booklist";
        
      }
      public function selectAllByID($book_id){
        $query = 'select book_id from `' . $this->_table1 . '` where book_id = ' . $book_id . ';' ;
        $object = $this->query($query);
  
          $book_id = $object[0]["Book.book"]["book_id"];
  
          return $book_id;
          
      }
      function selectTitle($book_id) {
        $query = 'select title from `' . $this->_table1 . '` where book_id = ' . $book_id . ';';
  
        $object = $this->query($query);
  
        $title = $object[0]["Book.book"]["title"];
  
        return $title;
      }
      function selectDateAdd($book_id) {
        $query = 'select date_added from `' . $this->_table1 . '` where book_id = ' . $book_id . ';';
  
        $object = $this->query($query);
  
        $date_added = $object[0]["Book.book"]["date_added"];
  
        return $date_added;
      }
      function selectBooklistName($user_id) {
        /** Intialize return variable**/
        $booklist_names = array();

        /** Main query **/
        $query = 'select name from `' . $this->_table2 . '` where user_id = ' . $user_id . ';';

        /** Object return by query **/
        $objects = $this->query($query);

        /** Edit data to return **/
        foreach ($objects as $object) {
			$booklist_name = $object["Booklist.booklist"]["name"];
			array_push($booklist_names, $booklist_name);
		}

        return $booklist_names;
    }

}
