<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body style="text-align: center;">
<?php  
require("src/db/db.php");

$query="SELECT * FROM fixture";
$result=mysqli_query($connection,$query);
?>
<nav>
    <div class="row">
        <ul class="main-nav" style="background-color: #4F91CD;">
            
            <li><a href="index.html">HOME</a></li>
    
        </ul>    
    </div>
</nav>

<table style="width:100%;">
	<tr>
		<th>Date</th>
		<th>Home Team</th>
		<th>Away Team</th>
		<th>Time</th>
		<th>Venue</th>
	</tr>
<?php
if($result){
	while($row=mysqli_fetch_assoc($result)){
		$team1=$row['team1'];
		$team2=$row['team2'];
		$date=$row['date'];
		$venue=$row['venue'];
		$time=$row['time'];

		echo "<tr>
			<td>$date</td>
			<td>$team1</td>
			<td>$team2</td>
			<td>$time PM</td>
			<td>$venue</td>
		</tr>";
	}
}else{
	echo "not accessable";
}

?>
</table>
</body>
</html>
