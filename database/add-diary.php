<?php
	session_start();
	include('connection.php');

	$userId = $_SESSION['userId'];
	$emotionId = $_SESSION['detail']['emotionId'];
	$mealId = $_SESSION['detail']['mealType'];
	$posX = $_SESSION['detail']['posX'];
	$posY = $_SESSION['detail']['posY'];	
	$deg = $_SESSION['detail']['deg'];
	$date = $_SESSION['detail']['date'];
	$insertIntoEntry = mysqli_query($conn, "INSERT INTO entries(user_id,emotion_id,meal_id,entry_date,entry_angle,xCoor,yCoor) VALUE($userId,$emotionId,$mealId,'$date','$deg',$posX,$posY)");
	$entryId=mysqli_insert_id($conn);
	foreach($_SESSION['detail']['entry'] as $entry){
		$foodName = mysqli_real_escape_string($conn,strtolower($entry['name']));
		$serving = mysqli_real_escape_string($conn,strtolower($entry['serving']));
		$description = mysqli_real_escape_string($conn, strtolower($entry['description']));
		$deg45 = addslashes($entry['deg45']);
		$deg90 = addslashes($entry['deg90']);
		$insertItem = mysqli_query($conn, "INSERT INTO item(entry_id,food_name,food_description,serving_size,45deg,90deg) VALUE($entryId,'$foodName','$description','$serving','$deg45','$deg90')");
	}

	echo "<script>alert('Successfully added!');window.location.href='../archive.php';</script>";






