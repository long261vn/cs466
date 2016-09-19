<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : logout.php
 -->

<?php 
  require_once 'header.php';

  if (isset($_SESSION['user']))
  {
    destroySession();
	header("Location: index.php");
    die("Redirecting to: index.php");
  }
  else 
	{
	echo "<div class='main'><br>" .
            "You cannot log out because you are not logged in";
	}
  footer();
?>
