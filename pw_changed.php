<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : pw_changed.php
 -->

<?php
  require_once 'header.php';

  $error = $user = $pass = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['newpass']); 

    if ($user == "" || $pass == "" )
      $error = "Not all fields were entered<br><br>";	

    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows)
	  {
		queryMysql("UPDATE members SET pass = '$pass' WHERE user = '$user'");
		echo "<h2>Your password has been changed successfully! <br>Please <a href='login.php'>Log-in</a> to continue<br><br>";
		footer();
		die();
	  }
        
      else
      {
		$error = "Username problem!<br><br>";
      }
    }
  } 
  
  echo"<p class='text-danger'>$error</p>";
  footer();
?>
