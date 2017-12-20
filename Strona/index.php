<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: home.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Plikownia</title>
	<link rel="stylesheet" href="css/index.css" type=text/css>
</head>

<body>

<form action="login.php" method="post">
	<div class="container">
		<form id="login">
			<div class="header">
				<h3>Zaloguj się</h3>
				<p>Wypełnij poniższe pola aby zalogować się do panelu</p>
			</div>
			<div class="sep"></div>
			<div class="input">			
					<input type="text" placeholder="Login" name="login" autofocus/>
					<input type="password" placeholder="Hasło" name="haslo" /><br>
					<input type="submit" value="Zaloguj się" /><br>
                    <?php
	                   if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
                    ?>
			</div>
		</form>
	</div>
</form>

</body>
</html>