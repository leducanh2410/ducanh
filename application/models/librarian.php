<?php

class Librarian extends Model {
    protected $_model;

    function __construct(){
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->_model = "Librarian";
    }

    function printNameByID($librarian_id){
        $query = 'select CONCAT(first_name, \' \', last_name) from `user.librarian` where librarian_id = ' . $librarian_id . ';';
        $object = $this->query($query);

        $name = $object[0][""]["CONCAT(first_name, ' ', last_name)"];

        return $name;
    }

    function selectAllBooks(){
        $query = 'select book_id, title from `book.book`;';
        $objects = $this->query($query);

        $book_ids = array();
		$book_titles = array();

        foreach($objects as $idx => $object){
            if ($object["Book.book"]["book_id"] != 0) {
                array_push($book_ids, $object["Book.book"]["book_id"]);
                array_push($book_titles, $object["Book.book"]["title"]);
            } 
        }

        return array($book_ids, $book_titles);
    }

    function selectAllCategories(){
        $query = 'select distinct name from `book.category`;';
        $objects = $this->query($query);

        $categories = array();

        foreach($objects as $idx => $object){
            array_push($categories, $object["Book.category"]["name"]);
        }

        return $categories;
    }

    function selectAllPublishers(){
        $query = 'select name from `book.publisher`;';
        $objects = $this->query($query);

        $publishers = array();

        foreach($objects as $idx => $object){
            array_push($publishers, $object["Book.publisher"]["name"]);
        }

        return $publishers;
    }

    function selectAllAuthors(){
        $query = 'select CONCAT(first_name, \' \', last_name) from `book.author`;';
        $objects = $this->query($query);

        $authors = array();

        foreach($objects as $idx => $object){
            array_push($authors, $object[""]["CONCAT(first_name, ' ', last_name)"]);
        }

        return $authors;
    }

    function selectAllBooksName(){
        $query = 'select title from `book.book`;';
        $objects = $this->query($query);

        $titles = array();

        foreach($objects as $idx => $object){
            array_push($titles, $object["Book.book"]["title"]);
        }

        return $titles;
    }

    function checkBookExisted($isbn, $title){
        $query1 = 'select book_id from `book.book` where isbn = "' . $isbn . '";';
        $query2 = 'select book_id from `book.book` where title = "' . $title . '";';
        $object1 = $this->query($query1);
        $object2 = $this->query($query2);

        if ($object1 || $object2){
            return true;
        }
        else{
            return false;
        }
    }

    function checkPublisherExisted($publisher){
        $query1 = 'select publisher_id from `book.publisher` where name = "' . $publisher . '";';
        $object1 = $this->query($query1);

        if ($object1){
            return $object1[0]["Book.publisher"]["publisher_id"];
        }
        else{
            $query2 = 'select max(publisher_id) from `book.publisher`;';
            $object2 = $this->query($query2);
            $publisher_id = $object2[0][""]["max(publisher_id)"] + 1;

            $query3 = 'insert into `book.publisher` values (' . $publisher_id . ',"' . $publisher . '");';
            $this->query($query3);
            
            return $publisher_id; 
        }
    }

    function addCategory($category){
        $query1 = 'select category_id from `book.category` where name = "' . $category . '";';
        $object1 = $this->query($query1);

        if ($object1){
            return $object1[0]["Book.category"]["category_id"];
        }
        else{
            $query2 = 'select max(category_id) from `book.category`;';
            $object2 = $this->query($query2);
            $category_id = $object2[0][""]["max(category_id)"] + 1;

            $query3 = 'insert into `book.category` values(' . $category_id . ',"' . $category . '");';
            $this->query($query3);

            return $category_id;
        }
    }

    function addAuthor($author){
        $names = explode(' ', $author);
        
        if (count($names) != 1){
            $first_name = $names[0];
            $last_name = $names[1];
        }
        else{
            $first_name = $author;
            $last_name = "";
        }
        $query1 = 'select author_id from `book.author` where first_name = "' . $first_name . '" and last_name = "' . $last_name . '";';
        $object1 = $this->query($query1);
        
        if ($object1){
            return $object1[0]["Book.author"]["author_id"];
        }
        else{
            $query2 = 'select max(author_id) from `book.author`;';
            $object2 = $this->query($query2);
            $author_id = $object2[0][""]["max(author_id)"] + 1;

            $query3 = 'insert into `book.author` values(' . $author_id . ',"' . $first_name . '",NULL,"' . $last_name . '");';
            $this->query($query3);

            return $author_id;
        }
    }

    function addNewBook($isbn, $title, $author, $category, $publisher, $copies){
        $query1 = 'select max(book_id) from `book.book`;';
        $object1 = $this->query($query1);
        $book_id = $object1[0][""]["max(book_id)"] + 1;
        
        $publisher_id = $this->checkPublisherExisted($publisher);
        $query2 = 'insert into `book.book` values(' . $book_id . ',' . $isbn . ',"' . $title . '",' . $publisher_id . ', curdate(), ' . $copies . ');';
        $this->query($query2);

        $query3 = 'insert into `book.popular` values(' . $book_id . ',0);';
        $this->query($query3);

        $category_id = $this->addCategory($category);
        $query4 = 'insert into `book.book_category` values(' . $book_id . ',' . $category_id . ');';
        $this->query($query4);

        $author_id = $this->addAuthor($author);
        $query5 = 'insert into `book.book_author` values(' . $book_id . ',' . $author_id . ');';
        $this->query($query5);

        return $book_id;
    }

    function checkBookExistedOnlyTitle($title){
        $query = 'select book_id from `book.book` where title = "' . $title . '";';
        $object = $this->query($query);

        if ($object){
            return true;
        }
        else{
            return false;
        }
    }

    function getBookIDByTitle($title){
        $query = 'select book_id from `book.book` where title = "' . $title . '";';
        $object = $this->query($query);

        return $object[0]["Book.book"]["book_id"];
    }

    function deleteBook($title){
        $book_id = $this->getBookIDByTitle($title);
        $query1 = 'delete from `book.popular` where book_id = ' . $book_id . ';';
        $this->query($query1);

        $query2 = 'delete from `book.book_author` where book_id = ' . $book_id . ';';
        $this->query($query2);

        $query3 = 'delete from `book.book_category` where book_id = ' . $book_id . ';';
        $this->query($query3);

        $query = 'delete from `book.book` where book_id = ' . $book_id . ';';
        $this->query($query);
    }

    function getAuthorNameByBookID($book_id){
        $query = 'select CONCAT(first_name, \' \', last_name) from `book.author` as a, `book.book_author` as b where a.author_id = b.author_id and b.book_id = ' . $book_id . ';';
        $object = $this->query($query);

        return $object[0][""]["CONCAT(first_name, ' ', last_name)"];
    }

    function getCategoryByBookID($book_id){
        $query = 'select name from `book.category` as a, `book.book_category` as b where a.category_id = b.category_id and b.book_id = ' . $book_id . ';';
        $object = $this->query($query);

        return $object[0]["A"]["name"];
    }

    function getPublisherByBookID($book_id){
        $query = 'select name from `book.publisher` as a, `book.book` as b where a.publisher_id = b.publisher_id and b.book_id = ' . $book_id . ';';
        $object = $this->query($query);

        return $object[0]["A"]["name"];
    }

    function getInfoByTitle($title){
        $book_id = $this->getBookIDByTitle($title);
        $query = 'select isbn, publisher_id, number_of_copies from `book.book`where book_id = ' . $book_id . ';';
        $object = $this->query($query);

        $isbn = $object[0]["Book.book"]["isbn"];
        $publisher_id = $object[0]["Book.book"]["publisher_id"];
        $copies = $object[0]["Book.book"]["number_of_copies"];

        $author = $this->getAuthorNameByBookID($book_id);
        $category = $this->getCategoryByBookID($book_id);
        $publisher = $this->getPublisherByBookID($book_id);

        return array($isbn, $author, $category, $publisher, $copies);
    }

    function selectName() {
        $user_id = $_SESSION["user_id"];
        $name = "";

        $query1 = 'select * from `user.librarian` where librarian_id = ' . $user_id . ';';
        $query2 = 'select * from `user.member` where member_id = ' . $user_id . ';';

        if ($this->query($query1)) {
            $query = 'select concat(coalesce(concat(last_name, " "), ""), coalesce(concat(middle_name, " "), ""), coalesce(first_name)) as name from `user.librarian` where librarian_id = ' . $user_id . ';';
            
            $object = $this->query($query);
            
            $name = $object[0][""]["name"];
        }
        else if ($this->query($query2)) {
            $query = 'select concat(coalesce(concat(last_name, " "), ""), coalesce(concat(middle_name, " "), ""), coalesce(first_name)) as name from `user.member` where member_id = ' . $user_id . ';';
            
            $object = $this->query($query);
            
            $name = $object[0][""]["name"];
        }

        return $name;
    }
}
