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
    <title>Plikownia</title>
    <link rel="stylesheet" href="css/index.css" type=text/css>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
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
        </body>
      </html>