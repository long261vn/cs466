<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : login.php
 -->

<?php 
require_once 'header.php';
if ($loggedin) 
{	
	echo " <h2>Hello $user, you are already logged in.</h2>";
	die();
}
else
{	  

  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = queryMySQL("SELECT user,pass FROM members
        WHERE user='$user' AND pass='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Invalid Username or Password.
                  Please try again!</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
		header("Location: members.php?view=$user");
        die("Redirecting to: members.php?view=$user");
      }
    }
  }
}
?>
		
		<h1>Login</h1>
		<p class="text-danger"><?php echo "$error"; ?></p>
		<form class="form-signin" action="login.php" method="POST"> 
		<div class="row">
			<div class="col-sm-4"><p>Username:</p></div>
			<div class="col-sm-8"><input type="text" class="form-control" name="user" placeholder="Username" required></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><p>Password:</p></div>
			<div class="col-sm-8"><input type="password" name="pass" class="form-control" placeholder="Password" required></div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-8"><button class="btn btn-lg btn-primary btn-block" type="submit">Go</button></div>
		</div>
        </form>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-8"><li><a href="recovery.php">Forgot Password?</a></li></div>
		</div>
		
		
<?php	
  footer();
?>
