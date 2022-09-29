<?php

class SearchingController extends Controller {
	
	function view($query = null) {
		if ($query == null) $query = "";

		$query = str_replace('+', ' ', $query);

		$this->set('title', 'E-library');
		$this->set('description', 'Searching: ' . $query);

		/** Initialize value to pass to views **/
		$book_ids = array();
		$book_titles = array();

		$book_ids = $this->Searching->searchBookIDByTitle($query);
		foreach ($book_ids as $book_id) {
			$book_title = $this->Searching->selectTitleByBookID($book_id);
			array_push($book_titles, $book_title);
		}

		/** Pass value to views **/
		$this->set("book_ids", $book_ids);
		$this->set("book_titles", $book_titles);
	}

}
