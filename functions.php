<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : functions.php
 -->

<?php 
	$dbhost  = 'mysql.hostinger.in';	// database host
	$dbname  = 'u263018183_466';		// database name
	$dbuser  = 'u263018183_466';		// database user
	$dbpass  = 'cpsc466';				// database password
	$appname = "CSUFSC"; 				// app name

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($connection->connect_error) die($connection->connect_error);

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

  function showProfile($user)
  {
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  }
  
  function footer()
  {
	echo 
				"</div> <!-- /end jumbotron -->" .
			  "<div class='footer'>" .
				"<p>&copy; Superman Team - CPSC466 - CSUF</p>" .
			  "</div>" .
			"</div> <!-- /container -->" .
			"<!-- Bootstrap core JavaScript" .
			"================================================== -->" .
			"<!-- Placed at the end of the document so the pages load faster -->" .
		  "</body>" .
		"</html>" ;
  }
?>
