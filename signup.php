<!-- 
CPSC466 - CSUFSC Project
Team    : Superman
Members : Francis Arocha; Jeremy Mann; Duy Do; Alec Nghiem; Long Nguyen
File    : signup.php
 -->

<?php
  require_once 'header.php';
	
  echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
_END;

  $error = $user = $pass = $email = $question = $answer ="";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $email = sanitizeString($_POST['email']);
    $question = sanitizeString($_POST['question']);
    $answer = sanitizeString($_POST['answer']);
	
    if ($user == "" || $pass == "" || $email == "" ||  $question == "" ||  $answer == "" )
      $error = "Not all fields were entered<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else
      {
        queryMysql("INSERT INTO members VALUES('$user', '$pass', '$email', '$question', '$answer')");
        echo"Account created. Please <a href='login.php'>" .
            "click here</a> to login.<br><br>";
		footer();
		die();
      }
    }
  }
?>

		<h1>Signup</h1>
		<p class="text-danger"><?php echo "$error"; ?></p>
		<form class="form-signin" action="signup.php" method="POST">
        <h3 class="form-signin-heading">Please fill out</h3>
		<div class="row">
			<div class="col-sm-4"><p>Username:</p></div>
			<div class="col-sm-8"><input type="text" class="form-control" name="user" placeholder="Username" required></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><p>Password:</p></div>
			<div class="col-sm-8"><input type="password" name="pass" class="form-control" placeholder="Password" required></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><p>Email:</p></div>
			<div class="col-sm-8"><input type="email" class="form-control" name="email" placeholder="Email: name@domain.com" required></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><p>Secret Question:</p></div>
			<div class="col-sm-8"><input type="question" class="form-control" name="question" placeholder="Enter your own question here" required></div>
		</div>
		<div class="row">
			<div class="col-sm-4"><p>Secret Answer:</p></div>
			<div class="col-sm-8"><input type="answer" class="form-control" name="answer" placeholder="Your answer" required></div>
		</div>	
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-8"><button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button></div>
		</div>
        </form>
		
<?php	
  footer();
?>
