<!DOCTYPE html>
<html>
<head>
	<title>Teams</title>
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="stylesheet" href="src/css/grid.css">
</head>
<body>

</body>
</html>
<?php 
require('src/db/db.php');

$query="SELECT team1, team2, venue FROM fixture WHERE che=0 LIMIT 1";
$result=mysqli_query($connection,$query);
if (mysqli_num_rows($result)>0) {
	$row=mysqli_fetch_assoc($result);
	echo "<h2>Next Match</h2><br>
	<div style='text-align:center;'>
	{$row['team1']} &nbsp Versus &nbsp {$row['team2']}<br><br>
	<h3>Venue: {$row['venue']} </h3><br><br>
	<button><a href='time.php'>next</a></button>
	</div>";
}else{
	echo "All matches compleated.";
}
?>

