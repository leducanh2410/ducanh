<?php

class HomeController extends Controller {
	
	function view() {
		$this->set('title', 'E-library');
		$this->set('description', 'A place where you find some of your favorite books');

		$popular_ids = array();
		$popular_titles = array();
		$recent_ids = array();
		$recent_titles = array();
		
		$popular_ids = $this->Home->selectPopularBook(5);
		foreach ($popular_ids as $popular_id) {
			$title = $this->Home->selectTitleByBookID($popular_id);
			array_push($popular_titles, $title);
		} 

		$recent_ids = $this->Home->selectRecentBook(5);
		foreach ($recent_ids as $recent_id) {
			$title = $this->Home->selectTitleByBookID($recent_id);
			array_push($recent_titles, $title);
		}

		/** Pass value to views **/
		$this->set('popular_ids', $popular_ids);
		$this->set('popular_titles', $popular_titles);
		$this->set('recent_ids', $recent_ids);
		$this->set('recent_titles', $recent_titles);
	}

}
