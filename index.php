<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : index.php
 -->

<?php // Example 26-4: index.php
  require_once 'header.php';

  if ($loggedin) echo " <h2>Hello $user, you are logged in.</h2>";
  else           echo " <h2>Welcome to $appname! <br>Please <a href='login.php'>Log-in</a> or <a href='signup.php'>Sign-up</a> to continue</h2>";

  footer();
?>

