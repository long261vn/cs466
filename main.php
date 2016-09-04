	


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
          <li><a href="index.php">Logout</a></li>
        </ul>
        <h3 class="text-muted">CSUF Student Communications</h3>
      </div>

      <div class="jumbotron">
        <h1>Welcome</h1>


<?php
   require("db.php");
    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(empty($_POST['user'])) 
        { die("user problem."); } 
        if(empty($_POST['pass'])) 
        { die("pass problem."); }  
	
        $query = " 
            SELECT 
                id 
            FROM members 
            WHERE 
                user = :user  
				AND pass = :pass

				
        "; 
        $query_params = array( ':user' => $_POST['user'] ); 
		$query_params = array( 
            ':user' => $_POST['user'], 
            ':pass' => $_POST['pass']   
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row == 0)
		{ 
			echo '<div class="col-lg-12">Invalid username or password !!!</div>'; 
			header("Location: login_again.php"); 
		} 
		else
			echo '<div class="col-lg-12">Login successul !!!</div>';
	}
	  
?>			
		
		
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