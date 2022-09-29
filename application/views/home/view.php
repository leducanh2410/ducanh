<link rel="stylesheet" href="./public/css/home.css" type="text/css">
<link rel="stylesheet" href="./public/css/booklist.css" type="text/css">

<div class="popular-container">
    <div class="popular-title">Popular Book</div>
    <div class="list-table">
		<?php
			$img_folder = './public/img/book/fullsize/';
			$img_extension = '.jpg';

			for ($i = 0; $i < count($popular_ids); $i++) {
				$book_id = $popular_ids[$i];
				$book_title = $popular_titles[$i];

				print "<div class='list-item'>";

				print "<div class='data image'><a href='./book/?book_id=" . strval($book_id) . "'><img src='" . $img_folder . strval($book_id) . $img_extension . "' alt='" . $book_title . " Cover'></a></div>";
				print "<div class='data title'><a href='./book/?book_id=" . strval($book_id) . "' class='link-title'>" . $book_title . "</a></div>";
				
				print "</div>";
			}
		?>
	</div>
</div>

<div class="recent-added-container">
    <div class="recent-added-title">Recent Added Book</div>
    <div class="list-table">
		<?php
			$img_folder = './public/img/book/fullsize/';
			$img_extension = '.jpg';

			for ($i = 0; $i < count($recent_ids); $i++) {
				$book_id = $recent_ids[$i];
				$book_title = $recent_titles[$i];

				print "<div class='list-item'>";

				print "<div class='data image'><a href='./book/?book_id=" . strval($book_id) . "'><img src='" . $img_folder . strval($book_id) . $img_extension . "' alt='" . $book_title . " Cover'></a></div>";
				print "<div class='data title'><a href='./book/?book_id=" . strval($book_id) . "' class='link-title'>" . $book_title . "</a></div>";
				
				print "</div>";
			}
		?>
	</div>
</div>