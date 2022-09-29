<link rel="stylesheet" href="./public/css/style.css" type="text/css">
<body>
	<?php
		function getAvatarPath() {
			$user_id = $_SESSION["user_id"];

			if (file_exists('./../public/img/user/' . $user_id . '.png')) {
				$path = './public/img/user/' . $user_id . '.png';
			}
			else if (file_exists('./../public/img/user/' . $user_id . '.jpg')) {
				$path = './public/img/user/' . $user_id . '.jpg';
			}
			else {
				$path = './public/img/user/default.png';
			}
			return $path;
		}
	?>
	
	<header>
		<div class="container">
			<span class="left">
				<a href="./">
			<img src="./public/img/global/logo.png" alt="Logo" height="50px">
		</a>
			</span>

		<?php
			if (isset($_SESSION["user_id"])) {
				print '
					<span class="right">
					<a href="./account/">
						<img src="' . getAvatarPath() . '" alt="User\'s Avatar" class="right avatar">
					</a>
					</span>

					<span class="right">
					<a href="./booklist/">
						<img src="./public/img/global/booklist.png" alt="Booklist" class="right avatar">
					</a>
					</span>
				';
				if ($_SESSION["user_type"] == "librarian") {
					print '
					<span class="right">
					<a href="./librarian/">
						<img src="./public/img/global/library.png" alt="Library" class="right avatar">
					</a>
					</span>
					';
				}
			}
			else {
				print '
					<span class="right">
					<a href="./login" style="color:white; font-size:25px; right:20px; float: right; position:relative"><u>Login</u></a>
					</span>
				';
			}
		?>

		<span class="center">
				<form action="./searching" method="get">
					<input class="search" type="text" placeholder="Book's name..." name="query" style="height:35px; width: 400px; border-radius: 10px"> 
					 <input type="submit" value="🔍" style="height: 41px; border-radius:10px; width:50px; background-color: aquamarine"> 

				</form>
			</span>

			<!-- <span class="search_wrap search_wrap_3" >
			<div class="search_box">
				<input type="text" class="input" placeholder="search..." name="query">
				<div class="btn btn_common">
					<i class="fas fa-search" type="submit" ></i>
					
				</div>
			</div>
		</span> -->

			
		</div>
	</header>

	<nav></nav>

	<article>
