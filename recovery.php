<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : recovery.php
 -->

<?php
  require_once 'header.php';
  echo "<h1>Password Recovery</h1>"	;
  $error = $user = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
	
    if ($user == "" )
      $error = "Please enter username<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");
      if ($result->num_rows>0)
	  {
        // output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$question = $row["question"];
			$answer = $row["answer"];		
		}
		echo
			"<form class='form-signin' action='recovery2.php' method='POST'>" .
			"<input type='hidden' name='ori_answer' value= '$answer'>" .	//pass values to next page
			"<input type='hidden' name='user' value= '$user'>" .
			
			"<div class='row'>" .
				"<div class='col-sm-4'><p class='text-info'>Secret question:</p></div>" .
				"<div class='col-sm-8'><input type='text' class='form-control' name='question' value='$question' disabled></div>" .
			"</div>" .
			"<div class='row'>" .
				"<div class='col-sm-4'><p>Secret Answer:</p></div>" .
				"<div class='col-sm-8'><input type='text' class='form-control' name='in_answer' placeholder='Secret Answer ???' required></div>" .
			"</div>" .

			"<div class='row'>" .
				"<div class='col-sm-4'></div>" .
				"<div class='col-sm-8'><button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button></div>" .
			"</div>" .
			"</form>" ;	
		
		footer();
		die();
	  } 
	  else 
	  {
		$error = "Username does not exist. Please try again!<br><br>";
	  }	
    }
  }
?>

		<p class="text-danger"><?php echo "$error"; ?></p>
		<form class="form-signin" action="recovery.php" method="POST">
		<div class="row">
			<div class="col-sm-4"><p>Username:</p></div>
			<div class="col-sm-8"><input type="text" class="form-control" name="user" placeholder="Username" required></div>
		</div>

		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-8"><button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button></div>
		</div>
        </form>
		
<?php	
  footer();
?>
