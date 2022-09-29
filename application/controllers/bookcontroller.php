<?php

class BookController extends Controller {
	
	public function view($book_id = null){
		$this->set('title','E-library');
		$this->set('description','A place where you find some of your favourite book');

		/** Initialize value to pass to views **/
		$book_ids = array();
		$book_titles = array();
		$book_ids = $this->Book->selectAllByID($book_id);
		$book_titles = $this->Book->selectTitle($book_id);
				
		

		/** Pass value to views **/
		
		$this->set("book_ids", $book_ids);
		$this->set("book_titles", $book_titles);
	}
}
