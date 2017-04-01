<?php
	session_start();
	var_dump($_SESSION['detail']);

	// $_SESSION['detail'] = [];
	// $_SESSION['detail']['type'] = 'breakfast';
	// $_SESSION['detail']['num'] = '12';
	// $_SESSION['detail']['item'] = [];


	// $_SESSION['item'] = [];
	// $_SESSION['item']['food_name'] = 'adobo';
	// $_SESSION['item']['serving'] = '5pcs';
	// $_SESSION['item']['description'] = 'love';

	// $_SESSION['item2'] = [];
	// $_SESSION['item2']['food_name'] = 'barbeque';
	// $_SESSION['item2']['serving'] = '15pcs';
	// $_SESSION['item2']['description'] = 'hatred';

	// array_push($_SESSION['detail']['item'], $_SESSION['item']);
	// array_push($_SESSION['detail']['item'], $_SESSION['item2']);
	// var_dump($_SESSION['detail']);

	// $detail = [];
	// $detail['type'] = 'breakfast';
	// $detail['item'] = [];
	// $value = ['first'=>2,'two' => 1];
	// $value2 = ['first'=>12,'two' => 23];
	// array_push($detail['item'],$value);
	// array_push($detail['item'],$value2);

	// foreach($detail['item'] as $item){
	// 	echo $item['first'].'<br/>';
	// }

?>