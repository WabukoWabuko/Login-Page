<?php 

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$secondname = $_POST['secondname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users";
		$result = mysqli_query($conn, $sql);
		if ($mysqli_num_rows($result > 0)) {
			echo "<script>alert('Wooops!! Email already exists.')</script>";
		}else {
			$sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$secondname', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow!! User Login Successfull.')</script>";
				$firstname = "";
				$secondname = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			}else {
				echo "<script>alert('Wooops!! Something went Wrong.')";
			}
		}
		
	}else {
		echo "<script>alert('Password Not Matched.')</script>";
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
</head>
<body id="body">
	<div class="Centre">
		<div id="mobile">
			
		<h1 id="loginpage">Sign Up...</h1>
		
		<form method="POST" action="" class="signup" >
		<p id="FirstName">FirstName<input id="input" type="text" placeholder="abcd..." name="firstname" value="<?php echo $firstname; ?>"></p>
		<br>
		
		<p id="SecondName">SecondName<input id="input" type="text" placeholder="efgh..." name="secondname" value="<?php echo $secondname; ?>"></p>
		<br>
					
		<p class="Email">Email<input id="input" type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>"></p><br>

		<p id="password">Password  <input id="input" type="password" placeholder="Enter your password" name="password" value="<?php echo $_POST['password']; ?>"></p>

		<p id="password">Confirm  <input id="input" type="password" placeholder="Confirm your password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>"></p>

		
		<p id="checkbox"><input onclick="rememberMe" type="checkbox" name="check" id="checkbox">Remember Me?</p>
		

		<div class="Login">
		<button onclick="" name="submit" class="Login">Sign Up</button>
		</div>

		</form>
		
		<p class="AreYouAnExistingStudent">Do you have an Account ? <a id="Links" href="BrayoITproject.php">Log in</a></p>
		</div>
	</div>

</body>
</html>