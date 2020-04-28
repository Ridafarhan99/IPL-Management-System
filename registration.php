<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
	<link rel="stylesheet" type="text/css" href="src/css/grid.css">
</head>
<body>
<?php 
require('src/db/db.php');

if (isset($_REQUEST['username'])) {
	$username = stripcslashes($_REQUEST['username']);	#stripcslashes() removes the backslash.
	$username = mysqli_real_escape_string($connection,$username);	#mysqli_real_escape_string() escapes special characters in a string.
	$password = stripcslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($connection,$password);

	$c_password = stripcslashes($_REQUEST['c_password']);
	$c_password = mysqli_real_escape_string($connection,$c_password);

	if($password===$c_password){
		$query = "INSERT INTO users (username, password, c_password) VALUES ('$username', '$password', '$c_password')";
		$result = mysqli_query($connection, $query);
		if($result == true){
?>			
			<div class='form' style="text-align: center; margin-top: 40px;"> 
			<h3>You are registered successfully.</h3>
			<br/>
			Click here to <a href='login.php'>Login</a>
			</div>		
<?php
		}else{
			echo "string";
		}
	}else{
		echo "<div style='text-align:center;'>
		<h3 style='text-align:center; margin-top:30px;'>password not matched.</h3>";
		echo "<a href='http://localhost/IPL-Management-System/registration.php'>Retry</a>
		</div>";
	}
}else{
?>
<div class='form' style="text-align: center; margin-right: 10px;">
	<h1 style="color: #19388A">Registration</h1>
	<form name='registration' action='' method='post'>
	Name: <input type='text' name='username' placeholder='Username' required /><br>
	Password: <input type='password' name='password' placeholder='Password' required /><br>
	Confirm Password: <input type='password' name='c_password' placeholder='Type Password again' required /><br><br>
	<input type='submit' name='submit' value='Register' />
	</form>
</div>
<?php } ?>
</body>
</html>