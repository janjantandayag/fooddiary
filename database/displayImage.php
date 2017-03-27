<?php
	include ('connection.php');
	$id = $_GET['entryId'];
	$queryImage = mysqli_query($conn, "SELECT * from entries WHERE entry_id=$id");
	while($result = mysqli_fetch_assoc($queryImage)){
		header('Content-Type: image/jpeg');
		echo $result['entry_photo'];	
	}
?>