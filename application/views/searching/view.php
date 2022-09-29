<link rel="stylesheet" href="./public/css/searching.css" type="text/css">
<link rel="stylesheet" href="./public/css/booklist.css" type="text/css">

<div class="result-container">
    <div class="result">
        <?php
            print "<h1>Found <b>" . strval(count($book_ids)) . "</b> result(s).</h1>";
        ?>
    </div>
    <div class="list-table">
		<?php
			$img_folder = './public/img/book/fullsize/';
			$img_extension = '.jpg';

			for ($i = 0; $i < count($book_ids); $i++) {
				$book_id = $book_ids[$i];
				$book_title = $book_titles[$i];

				print "<div class='list-item'>";

				print "<div class='data image'><a href='./book/?book_id=" . strval($book_id) . "'><img src='" . $img_folder . strval($book_id) . $img_extension . "' alt='" . $book_title . " Cover'></a></div>";
				print "<div class='data title'><a href='./book/?book_id=" . strval($book_id) . "' class='link-title'>" . $book_title . "</a></div>";
				
				print "</div>";
			}
		?>
	</div>
</div>