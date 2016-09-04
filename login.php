
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CPSC466 Project">
    <meta name="author" content="Superman Team">
    <link rel="shortcut icon" href="style/superman.ico">

    <title>CSUF Student Communications</title>

    <!-- Bootstrap core CSS -->
    <link href="style/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
		  <li><a href="register.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
        <h3 class="text-muted">CSUF Student Communications</h3>
      </div>

      <div class="jumbotron">
        <h1>Login</h1>
        <form class="form-signin" action="main.php" method="POST">
          <h3 class="form-signin-heading">Please enter your username and password</h3>
          <div class="form-group">
            <label for="user">Username:</label>
            <input type="text" class="form-control" name="user" required>
          </div>
		  <div class="form-group">
            <label for="pass">Password:</label>
            <input type="password" name="pass" class="form-control" placeholder="" required>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Go</button>
        </form>
				
		<li><a href="password.php">Forgot Password?</a></li>
      </div>	

	  
      <div class="footer">
        <p>&copy; Superman Team - CPSC466 - CSUF</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>