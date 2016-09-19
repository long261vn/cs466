<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : recovery2.php
 -->

<?php
  require_once 'header.php';
  echo "<h1>Password Recovery</h1>"	;
  $error = $user = $ori_answer = $in_answer = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['in_answer']))
  {
	$user = sanitizeString($_POST['user']);
    $in_answer = sanitizeString($_POST['in_answer']);
	$ori_answer = sanitizeString($_POST['ori_answer']);
	
    if ($in_answer != $ori_answer)
	{
		echo " <p class='text-danger'>Wrong answer! Click <a href='recovery.php'>here</a> to try again.</p>";
		footer();
		die();
	}
	else
	{
		echo "<p class='text-info'>Your answer is correct! Please enter new password.</p>";		
	}
  }

?>

	
	<form class='form-signin' action='pw_changed.php' method='POST'>
	<input type='hidden' name='user' value= '<?php echo"$user"; ?>'>

		<div class="row">
			<div class='col-sm-4'><p>New Password:</p></div>
			<div class='col-sm-8'>
				<input type="password" class="form-control" name="newpass" id="inputPassword" placeholder="New Password" required />
			</div>
		</div>

		<div class='row'>
			<div class='col-sm-4'></div>
			<div class='col-sm-8'><button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button></div>
		</div>	
	</form>

<?php	
  footer();
?>
