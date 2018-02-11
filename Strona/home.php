<?php

session_start();

if (!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}

?>
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="utf-8" />
		<title>Plikownia</title>
		<link rel="icon" href="/img/ico/favicon.ico">
		<link rel="stylesheet" href="css/home.css" type=text/css media="all">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
		<?php

		echo "<p>Witaj <b>".$_SESSION['user'].'</b>! [ <a href="logout.php">Wyloguj się!</a> ]</p>';

		?>
		<div class="container" role="main">

			<div class="c1">c1</div>
			<div class="c2"><?php 
				require_once "connect.php";

				$conn = @new mysqli($host, $db_user, $db_password, $db_name);
				include_once("functions.php");
				?>
				<link rel="stylesheet" href="css/home.css" type="text/css" media="all">
				<?php
				$sql = "SELECT id, label, link, parent FROM menus WHERE user = '".$_SESSION['user']."' ORDER BY parent, sort, label ";
				$result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
				// Create an array to conatin a list of items and parents
				$menus = array(
					'items' => array(),
					'parents' => array()
				);
				// Builds the array lists with data from the SQL result
				while ($items = mysqli_fetch_assoc($result)) {
					// Create current menus item id into array
					$menus['items'][$items['id']] = $items;
					// Creates list of all items with children
					$menus['parents'][$items['parent']][] = $items['id'];
				}
				// Print all tree view menus 
				echo createTreeView(0, $menus);
				?></div>
			<div class="c3">c3 </div>
		</div>



		<footer id="STOPKA">Plikownia</footer>
	</body>
</html>