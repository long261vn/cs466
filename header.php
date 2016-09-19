<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : header.php
 -->

<?php 
  session_start();
  require_once 'functions.php';

  $userstr = ' (Guest)';
  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;
  
echo 	'<!DOCTYPE html>' .
		'<html><head>' .	   
		'<meta charset="utf-8">' .
		'<meta http-equiv="X-UA-Compatible" content="IE=edge">' .
		'<meta name="viewport" content="width=device-width, initial-scale=1.0">' .
		'<meta name="description" content="CPSC466 Project">' .
		'<meta name="author" content="Superman Team">' .
		'<link rel="shortcut icon" href="style/superman.ico">' .

		'<title>CSUF Student Communications</title>' .

		'<!-- Bootstrap core CSS -->' .
		'<link href="style/bootstrap.css" rel="stylesheet">' .

		'<!-- Custom styles for this template -->' .
		'<link href="style/jumbotron-narrow.css" rel="stylesheet">' .
		'</head>' .
		'<body>';	   

if ($loggedin)
{		
	echo
    "<div class='container'>" .
      "<div class='header'>" .
        "<ul class='nav nav-pills pull-right'>" .
          "<li class='active'><a href='members.php?view=$user'>Home</a></li>" .
		  "<li><a href='members.php'>Members</a></li>" .
          "<li><a href='friends.php'>Friends</a></li>" .
		  "<li><a href='messages.php'>Messages</a></li>" .
          "<li><a href='profile.php'>Edit Profile</a></li>" .
		  "<li><a href='logout.php'>Log-out</a></li>" .
        "</ul>" .
        "<h3 class='text-muted'>CSUF Student Communications</h3>" .
    "<div class='jumbotron'>" ;
}
else
{
	echo
    "<div class='container'>" .
      "<div class='header'>" .
        "<ul class='nav nav-pills pull-right'>" .
          "<li class='active'><a href='index.php'>Home</a></li>" .
		  "<li><a href='signup.php'>Sign-up</a></li>" .
          "<li><a href='login.php'>Log-in</a></li>" .
        "</ul>" .
        "<h3 class='text-muted'>CSUF Student Communications</h3>" .
      "</div>" .	
    "<div class='jumbotron'>" ;
}
	   
?>
