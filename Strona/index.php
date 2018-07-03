<!DOCTYPE HTML>
<?php

session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
  header('Location: home.php');
  exit();
}

?>
<html lang="pl">
  <head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Plikownia</title>
	<link rel="icon" href="/img/ico/favicon.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css" type=text/css>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
  </head>

  <body role="login">

    <div class="container" style="margin-top:70px">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
          <div class="panel panel-default">

            <div class="panel-body">
              <form role="form" action="login.php" method="POST">
                <fieldset>
                  <div class="row">
                    <hr>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-10  offset-md-1 ">
                      <div class="form-group">
                        <h3>Login:</h3>
                        <div class="input-group"> <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i> </span>
                          <input class="form-control" placeholder="Username" name="login" autofocus="" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <h3>Password:</h3>
                        <div class="input-group"> <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i> </span>
                          <input class="form-control" placeholder="Password" name="haslo" value="" type="password">
                        </div>
                        <?php
                        if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
                        ?>
                      </div>

                      <div class="form-group">
                        <h4>
                          <input type="checkbox">
                          Keep me Logged in <h4> <input class="btn btn-success" value="Log In" type="submit">
                          </div>

                          </div>
                      </div>

                      </fieldset>
                    </form>

                  </div>
                </div>
            </div>
          </div>
        </div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        </body>
      </html>