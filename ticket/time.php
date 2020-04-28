<!DOCTYPE html>
<html>
<head>
	<title>Time</title>
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="stylesheet" href="src/css/grid.css">
</head>
<body>

</body>
</html>
<?php 
require("src/db/db.php");

$query="SELECT date, time FROM fixture WHERE che=0 LIMIT 1";
$result=mysqli_query($connection,$query);

if(mysqli_num_rows($result)>0){
	$row=mysqli_fetch_assoc($result);
	echo "<div style='text-align:center;'><h2>Time and Date</h2><br><br>
	<h4>Date: {$row['date']}</h4>
	<h4>Time: {$row['time']}PM</h4><br><br>
	<button><a href='ticket.php'>next</a></button>
	</div>";
}
?>