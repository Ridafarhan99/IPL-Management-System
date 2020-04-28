<!DOCTYPE html>
<html>
<head>
	<title>Tickets</title>
	<link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/grid.css">
    <link rel="stylesheet" type="text/css" href="ionicons-2.0.1/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet" type="text/css">
</head>
<body style="text-align: center; margin-top: 30px;">
Number of tickets:&nbsp
<form method="post">
	<input type="number" id="quantity" name="quantity" min="1" max="5" required>
	<input type="submit" value="Submit">
</form>
</body>
</html>
<?php
if (isset($_POST["quantity"])) {
	$amt=9000*($_POST["quantity"]);
	echo "Total Amount:&nbsp $amt <br><br>";
	echo "<a href='details.php'><input type='submit' name='next' value='Proceed to Pay'/></a>";
}
?>