<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * WHERE email = '$email'";
	$result = mysql_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysql_fetch_assoc($result);
		$_SESSION['firstname'] = $row['firstname'];
		header("Location: frontPage.php");
	}else {
		echo "<script>alert('Email or Password is wrong.')</script>";
	}
}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<?xml version="1.0" encoding="UTF-8"?>
<html>
<head>
	<title>LoginPage</title>
	<link rel="stylesheet" type="text/css" href="BrayoITproject.css">
	<link id="icon" rel="icon" type="Image/JPG" href="">
</head >
<body id="body">
	<div class="Centre">
		<div id="mobile">
		<h1 id="loginpage">Login Page...</h1>

		<form action="" class="" method="POST">
		<p class="Email">Email   <input id="input" type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>" required></p><br>
		
		<p id="password">Password  <input id="input" type="password" placeholder="Enter your password" name="password" value="<?php echo $_POST['password']; ?>" required></p>

				
		<p id="checkbox"><input type="checkbox" name="check" id="checkbox">Remember Me?</p>
		
		
		<div class="Login">
		<button onclick="" name="login" class="Login">Log in</button>
		</div>

		</form>

		<p class="ForgotPass">Forgot your password ?<br><br><a id="Links" href="">Click here</a> to reset your password.</p>

		<p class="AreYouAnExistingStudent">Don't have an account ? <a id="Links" href="SignUp.php">Create an Account</a></p>
		</div>
	</div>

</html>