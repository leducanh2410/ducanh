<link rel="stylesheet" href="./public/css/booklist.css" type="text/css">
<link rel="stylesheet" href="./public/css/librarian.css" type="text/css">

<?php
	if ($status == 0) {
		print '
		<div class="form-container">
			<h1 class="form-header">Add Book to My Booklist</h1>
			<div class="form-notice">* Your list is public by default</div>
			<div class="form-data">
				<center>
				<form id="main-form" method="post" name="add-book" action="">
				<table class="librarian">
					<tbody>
						<tr>
							<td class="key">Book Title: </td>
							<td class="value">
								<a href="./book/?book_id=' . strval($book_id) . '">' . $book_title . '</a>
							</td>
						</tr>
						<tr>
							<td class="key">Booklist: </td>
							<td class="value">
								<select id="add-to-booklist" name="booklist_id" class="booklist">';

		for ($i = 0; $i < count($booklist_ids); $i++) {
			$label = preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $booklist_names[$i]);
			print '<option value="' . strval($booklist_ids[$i]) .  '">' . $label . '</option>';
		}
		
		print '
							</td>
						</tr>
					</tbody>
				</table>
				</form>
				</center>
			</div>
			<div class="form-submit">
				<input class="button" type="submit" form="main-form" value="Submit">
			</div>
		</div>
		';
	}
	elseif ($status == 1) {
		print '
		<div class="notice-container">
			<div class="notice">
				Successfully added book to your booklist
			</div>
			<div class="button-container">
				<a class="button" href="./">Go home</a>
			</div>
			<div class="button-container">
				<a class="button" href="./book/?book_id=' . strval($book_id) . '">Go back</a>
			</div>
			<div class="button-container">
				<a class="button" href="./booklist">Go to booklist</a>
			</div>
		</div>
		';
	}


?>