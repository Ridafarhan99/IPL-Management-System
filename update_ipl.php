<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>

</body>
</html>

<?php 
require('src/db/db.php');

$query="SELECT team1, team2 FROM fixture WHERE che=0 LIMIT 1";
$result=mysqli_query($connection,$query);
if(isset($_REQUEST['run1'])){
	$run1=stripcslashes($_REQUEST['run1']);
	$run1=mysqli_real_escape_string($connection,$run1);

	$run2=stripcslashes($_REQUEST['run2']);
	$run2=mysqli_real_escape_string($connection,$run2);

	$che = 1;

	$row=mysqli_fetch_assoc($result);

	$query2 = "UPDATE fixture SET team1s='$run1', team2s='$run2', che=1 WHERE che=0 LIMIT 1";

	if($run1>$run2){
		$que="SELECT team1, team2 FROM fixture WHERE che=0 LIMIT 1";
		$res=mysqli_query($connection,$que);
		$row=mysqli_fetch_assoc($res);
		$team1=trim($row['team1']);
		$team2=trim($row['team2']);
		$q="SELECT pts, pld, won FROM points WHERE team='$team1'";
		$p=mysqli_query($connection,$q);
		$pts=mysqli_fetch_assoc($p);
		$pt=(int)$pts['pts']+2;
		$pld=(int)$pts['pld']+1;
		$won=(int)$pts['won']+1;
		$query3="UPDATE points SET pld='$pld', pts='$pt', won='$won' WHERE team='$team1'";

		$pts="SELECT pts, pld, lost FROM points WHERE team='$team2'";
		$pts=mysqli_query($connection,$pts);
		$pts=mysqli_fetch_assoc($pts);
		$pt=(int)$pts['pts']+0;
		$pld=(int)$pts['pld']+1;
		$lost=(int)$pts['lost']+1;
		$query4="UPDATE points SET lost='$lost', pld='$pld', pts='$pt' WHERE team='$team2'";
	}elseif ($run1==$run2) {
		$que="SELECT team1, team2 FROM fixture WHERE che=0 LIMIT 1";
		$res=mysqli_query($connection,$que);
		$row=mysqli_fetch_assoc($res);
		$team1=trim($row['team1']);
		$team2=trim($row['team2']);
		$q="SELECT pts, pld, tied FROM points WHERE team='$team1'";
		$p=mysqli_query($connection,$q);
		$pts=mysqli_fetch_assoc($p);
		$pt=(int)$pts['pts']+1;
		$pld=(int)$pts['pld']+1;
		$tied=(int)$pts['tied']+1;
		$query3="UPDATE points SET tied='$tied', pld='$pld', pts='$pt' WHERE team='$team1'";

		$pts="SELECT pts, pld, tied FROM points WHERE team='$team2'";
		$pts=mysqli_query($connection,$pts);
		$pts=mysqli_fetch_assoc($pts);
		$pt=(int)$pts['pts']+1;
		$pld=(int)$pts['pld']+1;
		$tied=(int)$pts['tied']+1;
		$query4="UPDATE points SET tied='$tied', pld='$pld', pts='$pt' WHERE team='$team2'";
	}else{
		$que="SELECT team1, team2 FROM fixture WHERE che=0 LIMIT 1";
		$res=mysqli_query($connection,$que);
		$row=mysqli_fetch_assoc($res);
		$team1=trim($row['team1']);
		$team2=trim($row['team2']);
		$q="SELECT pts, pld, lost FROM points WHERE team='$team1'";
		$p=mysqli_query($connection,$q);
		$pts=mysqli_fetch_assoc($p);
		$pt=(int)$pts['pts']+0;
		$pld=(int)$pts['pld']+1;
		$lost=(int)$pts['lost']+1;
		$query4="UPDATE points SET lost='$lost', pld='$pld', pts='$pt' WHERE team='$team1'";

		$q="SELECT pts, pld, won FROM points WHERE team='$team1'";
		$p=mysqli_query($connection,$q);
		$pts=mysqli_fetch_assoc($p);
		$pt=(int)$pts['pts']+2;
		$pld=(int)$pts['pld']+1;
		$won=(int)$pts['won']+1;
		$query3="UPDATE points SET won='$won', pld='$pld', pts='$pt' WHERE team='$team2'";
	}
	$r1=mysqli_query($connection,$query3);
	$r2=mysqli_query($connection,$query4);
	if ($r1!==true || $r2!==true) {
		echo "not done";
	}
	$result2=mysqli_query($connection,$query2);

	if($result2 == true){
?>
	<div class='form' style="text-align: center; margin-top: 30px;">
		<h1 style="color: #19388A">Record submitted</h1>
		<h5>Click <a href='index.html'>here</a> to go the Home page</h5>
	</div>

<?php
	}else{
		echo "runs not submitted.";
	}

}else{
	if (mysqli_num_rows($result)>0) {
		$row=mysqli_fetch_assoc($result);
		echo "<div class='form' style='text-align: center; margin-top: 50px;'><form action='' method='post'>{$row['team1']} runs: <input type='number' name='run1' required/><br/><br>{$row['team2']} runs: <input type='number' name='run2' required><br><br>
		<input type='submit' name='submit'>
		</div>";
	}else{
		echo "All matches completed.";
	}
}
?>