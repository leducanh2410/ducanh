<link rel="stylesheet" href="./../../../public/css/home.css" type="text/css">
		<?php
				$book_id = $book_ids; 
				$book_title = $book_titles;
				$img_folder = './public/img/book/fullsize/';
				$img_extension = '.jpg';
				print "<div class='list-item'>";
				print "<div class='data image'><a href='./book/?book_id=" . strval($book_id) . "'><img class='data_image' src='" . $img_folder . strval($book_id) . $img_extension . "' alt='" . $book_title . " Cover'></a></div>";
				print "<div class='data_title'><a class='data_title' href='./book/?book_id=" . strval($book_id) . "' class='link-title'>" . $book_title . "</a></div>";
				print "</div>";

		?>
	</div>
<div class="center_div">
<a href="<?php print './booklist/addBook?book_id=' . $book_id ?>"><input type="submit" value="Add" class ="btn"></a>
</div>
    </div>
	<style>
		.btn {
			width: 80px;
			height: 40px;
			border-radius: #0080FF solid 5px !important;
			background-color: #0080FF;
			color: white;
		}
		.center_div {
			display: flex;
			justify-content: center;
		}
		.data_image {
			width: 20vw;
		}
		.data_title {
			font-size: 40px; 
			color:white;
		}
	</style>
<?php

