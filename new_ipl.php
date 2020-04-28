<?php 
require('src/db/db.php');

$truncatetable = "TRUNCATE TABLE fixture";
$result=mysqli_query($connection,$truncatetable);

$open = fopen('src/db/fixture.txt','r');

while (!feof($open)) {	#The feof() function checks if the "end-of-file" (EOF) has been reached for an open file
	$getTextLine = fgets($open);	#an inbuilt function which is used to return a line from an open file
	$explodeLine = explode(",",$getTextLine);	#The explode() function breaks a string into an array

	list($date,$team1,$team2,$time,$venue,$che,$team1score,$team2score) = $explodeLine;

	$qry = "INSERT INTO fixture (date, team1, team2, time, venue, che, team1s, team2s) VALUES ('$date','$team1','$team2','$time','$venue','$che','$team1score','$team2score')";
	$result = mysqli_query($connection,$qry);
}
fclose($open);

$truncatetable = "TRUNCATE TABLE points";
$result2=mysqli_query($connection,$truncatetable);

$open = fopen('src/db/points.txt','r');

while (!feof($open)) {	#The feof() function checks if the "end-of-file" (EOF) has been reached for an open file
	$getTextLine = fgets($open);	#an inbuilt function which is used to return a line from an open file
	$explodeLine = explode(",",$getTextLine);	#The explode() function breaks a string into an array

	list($team,$pld,$won,$lost,$tied,$pts) = $explodeLine;

	$qry2 = "INSERT INTO points (team, pld, won, lost, tied, pts) VALUES ('$team', '$pld', '$won', '$lost', '$tied', '$pts')";
	$result = mysqli_query($connection,$qry2);
}
fclose($open);

if($result!==FALSE || $result2!==FALSE){
	header("Location: index.html");
}else{
	echo "not able to TRUNCATE";
}
?>