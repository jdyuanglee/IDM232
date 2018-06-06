<?php
	require "includes/db.php";
	$table = "finalProject"; #TODO
	$query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);
	if (!$result) {
			die ("Database query failed.");
	}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>IDM232</title>
</head>

<body>