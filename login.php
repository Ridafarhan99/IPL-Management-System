<?php 
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="src/css/style.css">
<link rel="stylesheet" href="src/css/grid.css">
</head>
<body>
<?php 
require('src/db/db.php');
if (isset($_POST['username'])) {
	$username = stripcslashes($_REQUEST['username']);	#stripcslashes() removes the backslash.
	$username = mysqli_real_escape_string($connection,$username);	#mysqli_real_escape_string() escapes special characters in a string.
	$password = stripslashes($_REQUEST['password']);
 	$password = mysqli_real_escape_string($connection,$password);	

 	$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
 	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));	#die() equivalent to exit()
 	$rows = mysqli_num_rows($result);
 	if($rows==1){
 		$_SESSION['username'] = $username;
 		header("Location: admin_choose.php");
 	}else{
 		echo "<div class='form' style='text-align:center; margin-top:40px;'>
			<h3 style='text-align:center';>Username/password is incorrect.</h3>
			<br/><h5 style='text-align:center';>Click here to <a href='login.php'>Login</a></h5></div>";
 	}
}else{
?>
<div class="form" style="text-align: center;">
<h1 style="color: #19388A;">Log In</h1>
<form action="" method="post" name="login">
Name: <input type="text" name="username" placeholder="Username" required /><br>
Password: <input type="password" name="password" placeholder="Password" required /><br><br>
<input name="submit" type="submit" value="Login" /><br><br><br>
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
<p><a href='index.html'>Home</a></p>
</div>
<?php }?>
</body>
</html>